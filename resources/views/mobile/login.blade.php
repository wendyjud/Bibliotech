<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="">

    <div class="">
        <br>
        <div style="" class=" ">
            <form method="POST" style="padding: 1rem;" action="{{route('AuthMobile')}}">
                @csrf
            <br>
           <div style="text-align: center;">
            <img src="{{asset('libro.png')}}"
            style="width: 150px;
           text-align: center;
            border-radius: 20px; margin-left: auto; margin-right: auto; border: solid 1px rgb(211, 211, 211);"
            alt="">
           </div>
            <br>
            <br>
            <h1 style="text-align: center!important; font-size: 4rem!important;">Bibliotech</h1><br>
            <br>
            <br>
            <br>
            @if(\Session::has('messages'))
            error 1
            @endif
            
            @if($errors->any())
            
            <h1 style="color: red; font-size: 3rem!important;">Datos incorrectos</h1>
            @endif
            <br>

            <label style="text-align: left;" class="form-label"><h3 style="font-size: 3rem!important; color: rgb(58, 58, 58);">Usuario</h3></label>
            <input style="font-size: 4rem!important;" type="number" name="code" class="form-control form-control-lg">
            <div class="form-text">
                <!-- texto -->
            </div>

            <br>

            <label style="text-align: left;" class="form-label"><h3 style="font-size: 3rem!important; color: rgb(58, 58, 58);">Contraseña</h3></label>
            <input style="font-size: 4rem!important;" type="password" name="password" class="form-control form-control-lg">
            <div class="form-text">
                <!-- texto -->
            </div>
            <br>
        
                <div style="text-align: center;" class="d-grid gap-2">
                    <button style="font-size: 3.3rem!important;" type="submit" class="btn btn-secondary btn-lg">Iniciar sesión</button>
                </div>
       
      
            <br>
            </form>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>