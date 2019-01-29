<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\json;
use App\carnaval;
use DB;
class JsonController extends Controller
{
    //

    public function recieve(Request $request)
    {
    	$data = new json;
    	$data->data = $request->getContent();
    	$data->save();
    	// guardo los datos originales
    	$this->process($data->data);
    	// proceso la informacion recibida

    	
    }

    public function process($data)
    {

    	$json = json_decode($data);

    	foreach ($json as $encuesta) {
    		///genero hash unico
    		$hash = $encuesta->userid.$encuesta->timestamp;	
    		///me fijo si existe el hash

    		if( carnaval::where('hash','=',$hash)->exists())
    			{

    				echo "existe";
    			}
    			else
    			{
    				echo "no existe";
    				// no existe creo
    				$this->registrar($encuesta);

    			}
    		
    		// return;

    	}
    	

    }

    public function registrar($data)
    {
    	$carnaval = new carnaval;
    	$hash = $data->userid.$data->timestamp;	
    	$carnaval->hash = $hash;

		$carnaval->procedencia = $data->procedencia;
		$carnaval->sexo = 	$data->sexo;
		$carnaval->edad = 	$data->edad;
		$carnaval->viaje = 	$data->viaje;
		$carnaval->cantidad_personas = 	$data->viaje_cantidad;
		
		if($data->informo == 'otro')
		{$carnaval->informo = $data->otros_informo;}
		else
		{$carnaval->informo = $data->informo;}

		if($data->motivo == 'otro')
		{$carnaval->motivo = $data->otro_motivo;}
		else
		{$carnaval->motivo = $data->motivo;}
	
		if($data->transporte == 'otro')
		{$carnaval->transporte = $data->otro_transporte;}
		else
		{$carnaval->transporte = $data->transporte;}						
	
		$carnaval->lugar_alojamiento = $data->alojamiento;
		$carnaval->tipoalojamiento = $data->tipoalojamiento;
		$carnaval->primeravez = $data->primeravez;
		$carnaval->recomendaria = $data->recomendaria;
		$carnaval->gastos = $data->gastos;
		$carnaval->userid = $data->userid;
		$carnaval->timestamp = $data->timestamp;
		$carnaval->save();
		echo $carnaval->id;


    }

    // api results
    public function report(){
    	
        // Consulta de transporte
        $transporte = DB::select('SELECT transporte as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals GROUP BY transporte ORDER BY y desc');
        $t = [];
        foreach ($transporte as $key => $value) 
        {
            if($value->label == 'corrientes')
            {
                $value->label = 'Aeropuerto Corrientes';
            }
             if($value->label == 'resistencia')
            {
                $value->label = 'Aeropuerto Resistencia';
            }
            $t[] = (array) $value;
        }


        // consulta de procedencia
        $p = [];
        $procedencia = DB::select('SELECT procedencia as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals GROUP BY procedencia ORDER BY y desc');
         foreach ($procedencia as $key => $value) 
        {
           
            $p[] = (array) $value;
        }
        // consulta sexo
        $s = [];
        $sexo = DB::select('SELECT sexo as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals GROUP BY sexo ORDER BY y desc');
         foreach ($sexo as $key => $value) 
        {
           if($value->label == 'F')
            {
                $value->label = 'Femenino';
            }
             if($value->label == 'M')
            {
                $value->label = 'Masculino';
            }
            $s[] = (array) $value;
        }
       









// lugar_alojamiento
        $la = [];
        $lugar_alojamiento = DB::select('SELECT lugar_alojamiento as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals GROUP BY lugar_alojamiento ORDER BY y desc');
         foreach ($lugar_alojamiento as $key => $value) 
        {
          
            $la[] = (array) $value;
        }
// tipoalojamiento
        $ta = [];
        $tipoalojamiento = DB::select('SELECT tipoalojamiento as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals GROUP BY tipoalojamiento ORDER BY y desc');
         foreach ($tipoalojamiento as $key => $value) 
        {
           
            $ta[] = (array) $value;
        }
// edad
// viaje
         $vi = [];
        $viaje = DB::select('SELECT viaje as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals GROUP BY viaje ORDER BY y desc');
         foreach ($viaje as $key => $value) 
        {
           
            $vi[] = (array) $value;
        }
// cantidad_personas
// informo
         $in = [];
        $informo = DB::select('SELECT informo as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals GROUP BY informo ORDER BY y desc');
         foreach ($informo as $key => $value) 
        {
           
            $in[] = (array) $value;
        }
// motivo
         $mo = [];
        $motivo = DB::select('SELECT motivo as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals GROUP BY motivo ORDER BY y desc');
         foreach ($motivo as $key => $value) 
        {
           
            $mo[] = (array) $value;
        }


// primeravez
// recomendaria
// gastos
        $gas = [];
        $gastos = DB::select('SELECT gastos as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals GROUP BY gastos ORDER BY y desc');
         foreach ($gastos as $key => $value) 
        {
          switch ($value->label) {
              case 'a':
                  $value->label = "Menos de $500";
                  break;
              case 'b':
                  $value->label = "de $500 a $1000";
                  break;
            case 'c':
                  $value->label = "entre $1000 y $3000";
                  break;
            case 'd':
                  $value->label = "Mas de $3000";
                  break;
                  case 'e':
                  $value->label = "NS/NC";
                  break;
              default:
                  # code...
                  break;
          }
            $gas[] = (array) $value;
        }
// userid
// timestamp

        return view('results')
        ->with('transporte',$t)
        ->with('procedencia',$p)
        ->with('sexo',$s)
         ->with('lugar_alojamiento',$la)
          ->with('tipoalojamiento',$ta)
          ->with('gastos',$gas)
          ->with('viaje',$vi)
          ->with('motivo',$mo)
          ->with('informo',$in);
			
    }



}
