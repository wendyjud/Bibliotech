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
<div style="padding: 1rem; text-align: center;">
    <br>
    <br>
    @if (Auth::user()->img == "img.png")
    <img class="shadow" style="width: 230px;" src="{{asset('img.png')}}" alt="">
        
    @else
    <img class="shadow" style="width: 230px;" src="{{ url('getfile/' .Auth::user()->img )}}" alt="">
    @endif
</div>
<br>
<h1 class="text-center">{{Auth::user()->name}} {{Auth::user()->lastname}}</h1>
<br>
<br>
<br>
<h1 class="text-center">{{Auth::user()->code}}</h1>
<h1 class="text-center">{{Auth::user()->phone}}</h1>
<h1 class="text-center">{{Auth::user()->degree}}</h1>


        @section('content')

        @show
<div class="text-center shadow card" style="position: absolute; bottom: 0; padding: 2rem; width: 100%; border-top: 1px gray solid;">
    <div class="text-center">
        <a class="btn btn-danger btn-lg" style="font-size: 4rem; color: white;" href="{{route('outMobile')}}">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>