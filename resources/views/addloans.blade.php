@extends('layout')
<title>Generar prestamo</title>
@section('content')


<div class="container">
  <div class="card container shadow">
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
            <h5> Se agrego un nuevo prestamo
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h5>
           </div>
           @endif
           <h4>Generar Prestamo: {{$id}}</h4>
    </div>
    <br>
    <form autocomplete="off" action="{{route('loan_create')}}" method="POST" enctype="multipart/form-data" class="container-fluid">
        @csrf
        <label style="text-align: left;" class="form-label"><h5>Código de usuario</h5></label>
        <input value="" autocomplete="false" type="text" name="codigo" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Dia</h5></label>
        <input value="" type="date" name="dia" class="form-control">
        <br>
        <input type="hidden" name="idbook" value="{{$id}}">
          <br>
          <div style="text-align: center;" class="d-grid gap-2">
            <button style="" type="submit" class="btn btn-info btn-lg"><h5>Generar Prestamo</h5></button>
        </div>
    </form>
  </div>
  <br>
</div>
@endsection