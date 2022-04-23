@extends('layout')
<title>Panel Administrativo | Usuarios</title>
@section('content')

{{-- <hr class="dropdown-divider"> --}}


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
          <h5> Se elimino el usuario
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </h5>
         </div>
         @endif
         <h4>Usuarios</h4>
  </div>
  <br>
    <form class="row" action="{{route('user_searchname')}}" method="POST">
      @csrf
      <div class="col-lg-10">
     <input type="text" id="text" name="text" class="form-control form-control-lg">
      </div>
  {{-- <div class="col-lg-2">
    <div style="text-align: center;" class="d-grid gap-2">
      <button style="font-size: 4rem" type="submit" class="btn btn-info btn-lg"><h5>Buscar</h5></button>
  </div>
  </div> --}}
  
  <div class="col-lg-2">
    <div style="text-align: center;" class="d-grid gap-2">
        <a href="{{route('adduser')}}" style="font-size: 4rem" type="submit" class="btn btn-success btn-lg"><h5><i class="fas fa-plus"></i></h5></a>
    </div>
  </div>
    </form>
    <br>
    <div class="table-responsive">
      <table class="table table-striped align-middle">
          <thead>
            <tr>
              <th class="text-center" scope="col"><h5>Código</h5></th>
              <th class="text-center" scope="col"><h5>Foto</h5></th>
              <th class="text-center" scope="col"><h5>Nombre</h5></th>
              <th class="text-center" scope="col"><h5>Apellidos</h5></th>
              <th class="text-center" scope="col"><h5>Tipo</h5></th>
              <th class="text-center" scope="col"><h5>Carrera</h5></th>
              <th class="text-center" scope="col"><h5>Teléfono</h5></th>
              <th class="text-center" scope="col"><h5>Modificar</h5></th>
              <th class="text-center" scope="col"><h5>Eliminar</h5></th>
            </tr>
          </thead>
          <tbody>
            <tbody id="resultados"></tbody>
                
            @include('users.pages')

      

      
          </tbody>
        </table>
      </div>
      <br>
      <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div> 
  </div>


{{-- <div class="container card shadow">
  <br>
  <form class="row" action="{{route('user_searchname')}}" method="POST">
    @csrf
    <div class="col-lg-9">
   <input type="text" name="name" class="form-control form-control-lg">
    </div>
<div class="col-lg-3">
  <div style="text-align: center;" class="d-grid gap-2">
    <button style="font-size: 4rem" type="submit" class="btn btn-info btn-lg"><h5>Buscar</h5></button>
</div>
</div>


  </form>
</div> --}}

<script>
  window.addEventListener('load', function(){
    document.getElementById("text").addEventListener("keyup", () => {
      if((document.getElementById("text").value.length)>=1)
      fetch(`/users/search?text=${document.getElementById("text").value}`,{method:'get' })
      .then(response => response.text())
      .then(html => {document.getElementById("resultados").innerHTML = html })
      else
      document.getElementById("resultados").innerHTML = ""
    })
  });
</script>
@endsection