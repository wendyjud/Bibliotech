@if (count($loans))
@foreach($loans as $loan)
@php
$oldDate = $loan->date;
$newDate = new DateTime($oldDate);
if($loan->type == 'Profesor'){
$newDate->add(new DateInterval('P14D')); // P1D means a period of 1 day
$tarifa = 20;
}
if($loan->type == 'Alumno'){
$newDate->add(new DateInterval('P7D')); // P1D means a period of 1 day
$tarifa = 10;
}
$fomattedDate = $newDate->format('Y-m-d');

$fechaActual = date('d-m-Y');

$inicio = strtotime($fomattedDate);
$hoy = strtotime($fechaActual);
$dias = $hoy-$inicio;
@endphp
<tr>
<td class="text-center"><h5>{{$loan->code_user}}</h5></td>
<td class="text-center"><h5>{{$loan->id_book}}</h5></td>
<td class="text-center"><h5>{{$loan->date}}</h5></td>
<td class="text-center"><h5>{{$fomattedDate}}</h5></td>
<td class="text-center"><h5>{{$loan->type}}</h5></td>


<td class="text-center"><h5>
  <div class="col d-grid gap-2">
@switch($loan->status)
  @case(1)
  <a href="{{route('loan_end', $loan->id)}}" style="font-size: 4rem" type="submit" class="btn btn-success btn-lg"><h5>ENTREGADO</h5></a>
      @break
  @case(2)
  <a href="{{route('multa', $loan->id)}}" style="font-size: 4rem" type="submit" class="btn btn-danger btn-lg"><h5>MULTA</h5></a>
  <br>
  <a href="{{route('loan_end', $loan->id)}}" style="font-size: 4rem" type="submit" class="btn btn-success btn-lg"><h5>ENTREGADO</h5></a>
      @break
  @case(3)
      CONCLUIDO
      @break
  @case(4)
  <h5>PAGADO</h5>
  <a href="{{route('loan_end', $loan->id)}}" style="font-size: 4rem" type="submit" class="btn btn-success btn-lg"><h5>ENTREGADO</h5></a>
  @break
  @default
      
@endswitch  
  </div>
</h5></td>

  
</tr>
@endforeach
@endif