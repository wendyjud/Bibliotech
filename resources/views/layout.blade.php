<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/font/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="{{asset('libro.png')}}" type="image/x-icon">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <style>
        .tcol {
            text-align: center !important;
        }

        .tcenter {
            text-align: center !important;
        }
a{
    font-family: 'Roboto', sans-serif;
}
p{
    font-family: 'Roboto', sans-serif;
}
div{
    font-family: 'Roboto', sans-serif;
}
h1{
    font-family: 'Roboto', sans-serif;
}
h2{
    font-family: 'Roboto', sans-serif;
}
        .file-select {
  position: relative;
  display: inline-block;
  width: 100%;
}

.file-select::before {
  background-color: #1f1f1f;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 3px;
  content: 'Foto'; /* testo por defecto */
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}
body{
    background-color: rgb(252, 252, 252);
}

.file-select input[type="file"] {
  opacity: 0;

  height: 32px;
  display: inline-block;
}

#src-file1::before {
  content: 'Foto';
}

#src-file2::before {
  content: 'Foto';
}

.hovcard:hover {
  width: 90%!important;
}
    </style>
</head>

<body class="">
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{asset('libro.png')}}" style="width: 100px;" alt=""> 
                <b>BiblioTech</b> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                       <h6><a class="nav-link" href="{{route('users')}}"><i class="fas fa-user"></i> Usuarios</a></h6>
                    </li> 

                    {{-- <li class="nav-item">
                        <h6 style="text-align: center;"><a class="nav-link" href="{{route('employees')}}"><i class="fas fa-user"></i> Empleados</a></h6>
                     </li>  --}}

                     <li class="nav-item">
                        <h6 style="text-align: center;"><a class="nav-link" href="{{route('books')}}"><i class="fas fa-book"></i> Libros</a></h6>
                     </li> 

                     <li class="nav-item">
                        <h6 style="text-align: center;"><a class="nav-link" href="{{route('loans')}}"><i class="fas fa-file"></i> Prestamos</a></h6>
                     </li> 

                     
                </ul>
                <div class="d-flex">
                    
 

 <div class="row">
<div class="col-lg-6">
    <h5>{{Auth::user()->name}} {{Auth::user()->lastname}}</h5>
</div>
<div class="col-lg-6">
    <a href="{{route('out')}}" class="btn btn-danger" type="submit">Cerrar sesión</a> 
</div>
 </div>
                </div>
            </div>
        </div>
    </nav>
<br>
<br>
{{-- in col --}}
<div class="container-fluid">
    <div class="row">
    <div class="col-lg-3">
<a class="text-decoration-none cardsleft" href="{{route('dashboards')}}">
    <div style="height: 145px; border: 0px!important; background: rgb(0,164,255);
    background: linear-gradient(90deg, rgba(0,164,255,1) 0%, rgba(0,91,255,1) 100%); text-align: center;"
    class="card shadow text-white hovcard">
    <div class="row" style="margin-top: 30px;">
        <div class="col-6">
            <i style="font-size: xxx-large;" class="fas fa-users"></i>
        </div>
        <div class="col-6">
            <h1>{{DB::table('users')->count();}}</h1>
            <p>Usuarios</p>
        </div>
  
    </div>
  </div>
</a>
    
    <br>
    
    <a class="text-decoration-none cardsleft" href="{{route('books')}}">
        <div style="height: 145px; border: 0px!important; background: rgb(255,196,0);
    background: linear-gradient(90deg, rgba(255,196,0,1) 0%, rgba(255,34,0,1) 88%); text-align: center;"
    class="card shadow text-white hovcard">
    <div class="row" style="margin-top: 30px;">
    <div class="col-6">
        <i style="font-size: xxx-large;" class="fas fa-book"></i>
    </div>
    <div class="col-6">
        <h1>{{DB::table('books')->count()}}</h1>
        <p>Libros</p>
    </div>
    </div>
    </div>
    </a>

    
    <br>
    
    <a class="text-decoration-none cardsleft" href="{{route('loans')}}">
    <div style="height: 145px; border: 0px!important; background: rgb(146,255,0);
    background: linear-gradient(90deg, rgb(101, 209, 12) 0%, rgba(0,198,255,1) 88%); text-align: center;"
    class="card shadow text-white hovcard">
    <div class="row" style="margin-top: 30px;">
    <div class="col-6">
        <i style="font-size: xxx-large;" class="fab fa-leanpub"></i>
    </div>
    <div class="col-6">
        <h1>{{DB::table('loans')->where('status', '1')->count()}}</h1>
        <p>Prestamos</p>
    </div>
    
    </div>
    </div>
    </a>

    <br>
    
    <a class="text-decoration-none cardsleft" href="{{route('loans')}}">
    <div style="height: 145px; border: 0px!important; background: rgb(89,0,255);
    background: linear-gradient(90deg, rgba(89,0,255,1) 0%, rgba(201,0,255,1) 88%); text-align: center;"
    class="card shadow text-white hovcard">
    <div class="row" style="margin-top: 30px;">
    <div class="col-6">
        <i style="font-size: xxx-large;" class="fas fa-file-invoice-dollar"></i>
    </div>
    <div class="col-6">
    <h1>{{DB::table('loans')->where('status', '2')->count()}}</h1>
        <p>Multas</p>
    </div>
    </div>
    
    </div>
    </a>
    
    </div>
    <div class="col-lg-9">
        @section('content')

        @show
    </div>
    </div>

</div>
    </div>
    {{-- <div class="card shadow" style="height: 12vh;">
        <div class="container" style="margin-bottom: auto; margin-top: auto;">
            <div class="row justify-content-md-center">
  <div style="">

  </div>
            </div>
        </div>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
