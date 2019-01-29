@extends('layouts.app')

@section('content')

<div class="container">
    
        
    <div id="chartProcedencia"  style="float:left;height: 300px; width: 50%;"></div>
    <div id="chartTransporte"  style="float:left;height: 300px; width: 50%;"></div>
        <div id="chartSexo"  style="float:left;height: 300px; width: 50%;"></div>
        <div id="chartAlojamiento"  style="float:left;height: 300px; width: 50%;"></div>
        <div id="chartTipoAlojamiento"  style="float:left;height: 300px; width: 50%;"></div>
        <div id="chartGastos"  style="float:left;height: 300px; width: 50%;"></div>
        <div id="chartMotivo"  style="float:left;height: 300px; width: 50%;"></div>
        <div id="chartInformo"  style="float:left;height: 300px; width: 50%;"></div>
        <div id="chartViaje"  style="float:left;height: 300px; width: 50%;"></div>


    
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</div>
<script>

window.onload = function () {
 
var chartTransporte = new CanvasJS.Chart("chartTransporte", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Medios de Transporte utilizado"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",   
        dataPoints: {!! json_encode($transporte) !!}
    }]
});
chartTransporte.render();

var chartProcedencia = new CanvasJS.Chart("chartProcedencia", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Procedencia"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",   
        dataPoints: {!! json_encode($procedencia) !!}
    }]
});
chartProcedencia.render();


var chartSexo = new CanvasJS.Chart("chartSexo", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Sexo"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",   
        dataPoints: {!! json_encode($sexo) !!}
    }]
});
chartSexo.render();

// 

var chartAlojamiento = new CanvasJS.Chart("chartAlojamiento", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "en que ciudad se aloja?"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",   
        dataPoints: {!! json_encode($lugar_alojamiento) !!}
    }]
});
chartAlojamiento.render();

var chartTipoAlojamiento = new CanvasJS.Chart("chartTipoAlojamiento", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Donde se Aloja durante el evento?"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",   
        dataPoints: {!! json_encode($tipoalojamiento) !!}
    }]
});
chartTipoAlojamiento.render();

// 

var chartGastos = new CanvasJS.Chart("chartGastos", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Cuanto estima que gastó durante la estadia por dia por persona?"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",   
        dataPoints: {!! json_encode($gastos) !!}
    }]
});
chartGastos.render();

// 
// 

var chartMotivo = new CanvasJS.Chart("chartMotivo", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Motivo del Viaje?"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",   
        dataPoints: {!! json_encode($motivo) !!}
    }]
});
chartMotivo.render();

// 
// 

var chartInformo = new CanvasJS.Chart("chartInformo", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Como se informo del evento?"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",   
        dataPoints: {!! json_encode($informo) !!}
    }]
});
chartInformo.render();

// 
// 

var chartViaje = new CanvasJS.Chart("chartViaje", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Con quien vino de viaje?"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",   
        dataPoints: {!! json_encode($viaje) !!}
    }]
});
chartViaje.render();

 
}
</script>
@endsection
