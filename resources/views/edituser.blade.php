@extends('layout')
<title></title>
@section('content')



    <div class="container">
        <div class="container card shadow">
            <br>
            <div class="container-fluid" style="height: 65px;">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5> Error
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </h5>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h5> Se actualizo el usuario
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </h5>
                    </div>
                @endif
            </div>
            <br>
            <form autocomplete="off" action="{{ route('user_update') }}" method="POST" enctype="multipart/form-data"
                class="container-fluid">
                @csrf
                <label style="text-align: left;" class="form-label">
                    <h5>Código</h5>
                </label>
                <input autocomplete="false" style="" type="text" name="codigo" value="{{ $user->code }}"
                    class="form-control form-control-lg">
                <br>
                <label style="text-align: left;" class="form-label">
                    <h5>Nombre</h5>
                </label>
                <input autocomplete="false" style="" type="text" name="nombre" value="{{ $user->name }}"
                    class="form-control form-control-lg">
                <br>
                <label style="text-align: left;" class="form-label">
                    <h5>Apellidos</h5>
                </label>
                <input autocomplete="false" style="" type="text" name="apellidos" value="{{ $user->lastname }}"
                    class="form-control form-control-lg">
                <br>
                {{-- /// --}}
                <label style="text-align: left;" class="form-label">
                    <h5>Tipo Actual: {{ $user->type }}</h5>
                </label>
                <select name="tipo" class="form-select form-select-lg mb-3">
                    <option @if($user->type == "Profesor") selected @endif value="Profesor">Profesor</option>
                    <option @if($user->type == "Alumno") selected @endif value="Alumno">Alumno</option>
                  </select>
                  <br>
                  {{-- /// --}}
                  <label style="text-align: left;" class="form-label">
                      <h5>Admin: 
                          @switch($user->admin)
                              @case(0)
                                  Usuario
                                  @break
                              @case(1)
                                  Admin
                                  @break
                              @default
                                  
                          @endswitch
                      </h5>
                  </label>
                  <select name="admin" class="form-select form-select-lg mb-3">
                      <option @if($user->admin == "0") selected @endif value="0">Usuario</option>
                      <option @if($user->admin == "1") selected @endif value="1">Admin</option>
                    </select>
                <br>
                <label style="text-align: left;" class="form-label">
                    <h5>Carrera</h5>
                </label>
                <input autocomplete="false" style="" type="text" name="carrera" value="{{ $user->degree }}"
                    class="form-control form-control-lg">
                <br>
                <label style="text-align: left;" class="form-label">
                    <h5>Teléfono</h5>
                </label>
                <input autocomplete="false" style="" type="text" name="telefono" value="{{ $user->phone }}"
                    class="form-control form-control-lg">
                    <br>
                {{-- /// --}}
                <input class="file-select btn btn-dark btn-lg" style="" name="img" type="file" accept="image/*">
                <br>
                <input type="hidden" name="id" value="{{ $user->id }}" id="">
                <br>
                <div style="text-align: center;" class="d-grid gap-2">
                    <button style="" type="submit" class="btn btn-info btn-lg">
                        Modificar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
