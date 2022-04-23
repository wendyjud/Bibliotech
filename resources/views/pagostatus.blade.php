<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Pagar Multa</title>
    <link rel="stylesheet" href="{{ asset('/font/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="{{ asset('libro.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
</head>

<body class="">

    <div class="">
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="" class=" container">
            <form method="POST" action="{{ route('pagos_search') }}" style="max-width: 1200px"
                class="card shadow container">
                @csrf
                <br>
                <div style="text-align: center;">
                    <img src="{{ asset('libro.png') }}" style="width: 100px;
           text-align: center;
            border-radius: 20px; margin-left: auto; margin-right: auto; border: solid 1px rgb(211, 211, 211);" alt="">
                </div>
                <br>
                <br>
                <h1 style="text-align: center!important;">
                {{$status}}
 
                
                </h1><br>
                <h4 style="text-align: center!important;">
                    Entregar libro: {{DB::table('books')->where('isbn', DB::table('loans')->where('id', $id)->first()->id_book)->first()->title}}
                </h4>
                <br>
                <br>
                <hr>
                <br>
              @if ($status == 'Gracias! El pago de su multa se concreto.')
                  <h1 style="color: rgb(8, 175, 8); text-align: center; font-size: 7rem;"><i class="far fa-check-circle"></i></h1>
                  @php
                     $loan = DB::table('loans')->where('id', $id)->update([
                        'status' => '4',
                        'pago' => date('Y-m-d')
                        ]); 
                  @endphp
              @endif

              @if ($status == 'Lo sentimos! El pago no se pudo realizar.')
                  <h1 style="color: rgb(255, 10, 10); text-align: center; font-size: 7rem;"><i class="far fa-times-circle"></i></h1>
                  @php
                  //   $loan = DB::table('loans')->where('id', $id)->update(['status' => '']); 
                  @endphp
              @endif
                
                <br>
            </form>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>