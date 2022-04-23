@extends('layout')
<title></title>
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
            <h5> Se agrego un nuevo usuario
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h5>
           </div>
           @endif
           <h4>Añadir Usuario</h4>
    </div>
    <br>
    <form autocomplete="off" action="{{route('user_create')}}" method="POST" enctype="multipart/form-data" class="container-fluid">
        @csrf
        <label style="text-align: left;" class="form-label"><h5>Código</h5></label>
        <input value="" autocomplete="false" type="text" name="codigo" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Nombre</h5></label>
        <input value="" autocomplete="false" type="text" name="nombre" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Apellidos</h5></label>
        <input value="" autocomplete="false" type="text" name="apellidos" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Tipo</h5></label>
        <select name="tipo" class="form-select form-select-lg mb-3">
          <option value="Profesor">Profesor</option>
          <option selected value="Alumno">Alumno</option>
        </select>
        <br>
        <label style="text-align: left;" class="form-label"><h5>Carrera</h5></label>
        <input value="" autocomplete="false" type="text" name="carrera" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Teléfono</h5></label>
        <input value="" autocomplete="false" type="text" name="telefono" class="form-control">
        <br>
          
          
            <input class="file-select btn btn-dark btn-lg" style="" name="img" type="file" accept="image/*">
          <br>
          <br>
          <div style="text-align: center;" class="d-grid gap-2">
            <button style="" type="submit" class="btn btn-info btn-lg"><h5>Agregar</h5></button>
        </div>
    </form>
  </div>
  <br>
</div>
@endsection