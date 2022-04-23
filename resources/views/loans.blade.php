@extends('layout')
<title>Panel Administrativo | Prestamos</title>
@section('content')

@php
$date_now = date('Y-m-d');
$date_past = strtotime('-7 day', strtotime($date_now));
$date_past = date('Y-m-d', $date_past);

 DB::table('loans')->where('status', 1)->where('type', 'Alumno')->where('date', '<', $date_past)->update(['status' => 2]);   

$date_now = date('Y-m-d');
$date_past = strtotime('-14 day', strtotime($date_now));
$date_past = date('Y-m-d', $date_past);

 DB::table('loans')->where('status', 1)->where('type', 'Profesor')->where('date', '<', $date_past)->update(['status' => 2]);   

 $loan = DB::table('loans')->where('status', 4)->where('pago', '<', date('Y-m-d'))->update([
                        'status' => '2',
                        'pago' => Null
                        ]); 
@endphp

{{-- <hr class="dropdown-divider"> --}}
<div class="container">
<div class="container card shadow">
    <br>
  <div class="container-fluid" style="height: 85px;">
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h5> Error
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </h5>
       </div>
       @endif
       @if (Session::has('success'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h5> Se entrego el prestamo
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </h5>
       </div>
       @endif
       <h4>Prestamos</h4>
</div>
<br>

<form class="row" method="POST">
    @csrf
    <div class="col-lg-12">
   <input type="text" name="text" id="text" class="form-control form-control-lg">
    </div>


  </form>
  <br>

  <div class="table-responsive">
    <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th class="text-center" scope="col"><h5>Codigo usuario</h5></th>
            <th class="text-center" scope="col"><h5>Isbn</h5></th>
            <th class="text-center" scope="col"><h5>Fecha prestamo</h5></th>
            <th class="text-center" scope="col"><h5>Fecha fin prestamo</h5></th>
            <th class="text-center" scope="col"><h5>Tipo de prestamo</h5></th>
            <th class="text-center" scope="col"><h5>Estatus</h5></th>
    </tr>
        </thead>
        <tbody>
          <tbody id="resultados"></tbody>
                
          @include('loans.pages')
    

    
        </tbody>
      </table>
  </div>

  <br>
  <div class="d-flex justify-content-center">
    {!! $loans->links() !!}
  </div> 
  <br>
</div>
<br>
</div>
<br>
<script>
  window.addEventListener('load', function(){
    document.getElementById("text").addEventListener("keyup", () => {
      if((document.getElementById("text").value.length)>=1)
      fetch(`/loans/search?text=${document.getElementById("text").value}`,{method:'get' })
      .then(response => response.text())
      .then(html => {document.getElementById("resultados").innerHTML = html })
      else
      document.getElementById("resultados").innerHTML = ""
    })
  });
</script>
@endsection 