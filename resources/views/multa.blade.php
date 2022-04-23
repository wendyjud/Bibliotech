<!DOCTYPE html>
@php
$oldDate = $loans->date;
$newDate = new DateTime($oldDate);
if($loans->type == 'Profesor'){
$newDate->add(new DateInterval('P14D')); // P1D means a period of 1 day
$tarifa = 20;
}
if($loans->type == 'Alumno'){
$newDate->add(new DateInterval('P7D')); // P1D means a period of 1 day
$tarifa = 10;
}
$fomattedDate = $newDate->format('Y-m-d');

$fechaActual = date('d-m-Y');

$inicio = strtotime($fomattedDate);
$hoy = strtotime($fechaActual);
$dias = $hoy-$inicio;
@endphp
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
<style>
    div{
        font-family: sans-serif;
        color: rgb(19, 19, 19);
    }
</style>
      </head>
<body>
    <div class="container">
        <br>
        <br>
        <h2>Multa</h2>
        <br>
        <p>Alumno ($10 x dia de atraso) | Profesor ($20 x dia de atraso)</p>
        <hr>
        <br>
        <div class="row">
<div class="col-lg-6">
    <div><h5>Codigo de Usuario: {{$loans->code_user}}</h5></div>
    <div><h5>ISBN: {{$loans->id_book}}</h5></div>
    <div><h5>Fecha inicio prestamo: {{$loans->date}}</h5></div>
    <div><h5>Fecha fin prestamo: {{$fomattedDate}}</h5></div>
    <div><h5>Tarifa: {{$loans->type}}
    </h5></div>
    <div><h5>Dias atraso: {{$dias/ 86400}}</h5></div>
    <hr>
    <div><h5>Coste: </h5> <h1> $ {{($dias/ 86400)*$tarifa}}</h1></div>
</div>
<div class="col-lg-6">
    
</div>
        </div>
    </div>
</body>
</html>