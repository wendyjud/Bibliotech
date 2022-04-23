@extends('mobile.layout')
@section('content')
@foreach ($loans as $loan)
<br>
<hr>
<br>

<div style="padding: 1rem;" class="text-center">
    <h5 style="font-size: 4rem!important;">
        <div class="col d-grid gap-2">
            <h5 style="font-size: 4rem;">LIBRO: {{$loan->id_book}}</h5>
            @switch($loan->status)
                @case(1)
                    <h5 style="font-size: 4rem;">NO TIENE MULTA, DENTRO DEL TIEMPO</h5>
                @break
                @case(2)
                <h5 style="font-size: 4rem;">TIENE MULTA POR RETRASO DE ENTREGA</h5>
                    <a href="javascript:window.open('{{url('/paypal/pay', $loan->id)}}','','toolbar=yes');void 0" style="font-size: 4rem"
                        type="submit" class="btn btn-primary btn-lg">
                        <h5 style="font-size: 4rem;">PAGAR <i class="fab fa-paypal"></i></h5>
                    </a>
                @break
                @case(3)
                    CONCLUIDO
                @break
                @case(4)
                    <h5 style="font-size: 4rem;">PAGADO</h5>
                    <h5 style="font-size: 4rem;">FALTA REGRESAR LIBRO</h5>
                @break
                @default

            @endswitch
        </div>
    </h5>
</div>
@endforeach
<br>
<hr>
@if (sizeof($loans) == 0)
<h5 class="text-center" style="font-size: 4rem;">NO TIENE PRESTAMOS</h5>
@endif
<br>
@endsection