@extends('layout')
<title>Panel Administrativo | Empleados</title>
@section('content')
    <div class="container">
        <br>
        <br>
        <div class="card">
            <div class="container">
                <br>
                <div>
                    <div style="float: left;">
                        <h4>Empleados</h4>
                    </div>
                    <div style="float: right;"><button class="btn btn-primary btn-lg" data-bs-toggle="modal"
                            data-bs-target="#exampleModala1" type="button"><i class="fas fa-user-plus"></i></button>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModala1" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('employee_create')}}" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                          
                                @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Número de seguro social</label>
                                    <input class="form-control" type="text" placeholder="Nss" name="nss">

                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Nombre</label>
                                    <input class="form-control" type="text" placeholder="Nombre" name="nombre">

                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Apellidos</label>
                                    <input class="form-control" type="text" placeholder="Apellidos" name="apellidos">

                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Número de telefono personal</label>
                                    <input class="form-control" type="text" placeholder="Teléfono" name="telefono">

                                </div>
                         
                 
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Rfc</label>
                                    <input class="form-control" type="text" placeholder="Rfc" name="rfc">

                                </div>
                         
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <table class="table table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th class="tcol" scope="col">Nss</th>
                            <th class="tcol" scope="col">Nombre</th>
                            <th class="tcol" scope="col">Apellidos</th>
                            <th class="tcol" scope="col">Teléfono</th>
                            <th class="tcol" scope="col">Rfc</th>
                            {{-- <th class="tcol" scope="col">Modificar</th> --}}
                            <th class="tcol" scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td class="tcenter">{{$employee->nss}}</td>
                            <td class="tcenter">{{$employee->name}}</td>
                            <td class="tcenter">{{$employee->lastname}}</td>
                            <td class="tcenter">{{$employee->phone}}</td>
                            <td class="tcenter">{{$employee->rfc}}</td>
                            {{-- <td class="tcenter">
                                <div class="d-grid gap-2"><button type="button" class="btn btn-info"><i
                                            class="fas fa-user-edit">
                                </div></i></button>
                            </td> --}}
                            <td class="tcenter">
                                <div class="d-grid gap-2"><a href="{{route('employee_delete', $employee->phone)}}" class="btn btn-danger"><i
                                            class="fas fa-user-minus">
                                </div></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
