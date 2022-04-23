@extends('layout')
<title>Añadir libro</title>
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
            <h5> Se agrego un nuevo libro
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h5>
           </div>
           @endif
           <h4>Añadir Libro</h4>
    </div>
    <br>
    <form autocomplete="off" action="{{route('book_create')}}" method="POST" enctype="multipart/form-data" class="container-fluid">
        @csrf
        <label style="text-align: left;" class="form-label"><h5>Isbn</h5></label>
        <input value="" autocomplete="false" type="text" name="isbn" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Titulo</h5></label>
        <input value="" autocomplete="false" type="text" name="titulo" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Autor</h5></label>
        <input value="" autocomplete="false" type="text" name="autor" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Editorial</h5></label>
        <input value="" autocomplete="false" type="text" name="editorial" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Año de publicacion</h5></label>
        <input value="" autocomplete="false" type="text" name="ano" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Número de emisión</h5></label>
        <input value="" autocomplete="false" type="text" name="numero" class="form-control">
        <br>
        <label style="text-align: left;" class="form-label"><h5>Edición</h5></label>
        <input value="" autocomplete="false" type="text" name="edicion" class="form-control">
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