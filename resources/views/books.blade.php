@extends('layout')
<title>Panel Administrativo | Libros</title>
@section('content')

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
        <h5> Se elimino el libro <!-- Corección "se eliminó el usuario"-->
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </h5>
       </div>
       @endif
       <h4>Libros</h4>
</div>
<br>
<!-- ORIGINAL-->
<form class="row" action="{{route('book_search')}}" method="post">
    @csrf
    <div class="col-lg-10">
   <input type="text" name="text" id="text" class="form-control form-control-lg">
    </div>

<div class="col-lg-2">
    <div style="text-align: center;" class="d-grid gap-2">
        <a href="{{route('addbook')}}" style="font-size: 4rem" type="submit" class="btn btn-success btn-lg"><h5><i class="fas fa-plus"></i></h5></a>
    </div>
</div>
  </form>

<!-- CAMBIO-->


  <br>

  <div class="table-responsive">
    <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th class="text-center" scope="col"><h5>Isbn</h5></th>
            <th class="text-center" scope="col"><h5>Titulo</h5></th>
            <th class="text-center" scope="col"><h5>Autor</h5></th>
            <th class="text-center" scope="col"><h5>Editorial</h5></th>
            <th class="text-center" scope="col"><h5>Año de publicacion</h5></th>
            <th class="text-center" scope="col"><h5>Número de emisión</h5></th>
            <th class="text-center" scope="col"><h5>Edición</h5></th>
            <th class="text-center" scope="col"><h5>Eliminar</h5></th>
          </tr>
        </thead>
        <tbody>
<!---->
          <tbody id="resultados">
          @include('books.pages')
          </tbody>
                
          
         
        </tbody>
      </table>
  </div>
<br>
<div class="d-flex justify-content-center">
  {!! $books->links() !!}
</div> 
  <br>
</div>
<br>
</div>
<br>

<script>
  /*window.addEventListener('load', function(){
    document.getElementById("text").addEventListener("keyup", () => {
      if((document.getElementById("text").value.length)>=1)
      fetch(`/books/search?text=${document.getElementById("text").value}`,{method:'get' })
      .then(response => response.text())
      .then(html => {document.getElementById("resultados").innerHTML = html })
      else
      document.getElementById("resultados").innerHTML = ""
    })
  });*/
</script>
@endsection 