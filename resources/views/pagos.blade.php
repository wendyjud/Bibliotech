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
                <h1 style="text-align: center!important;">BUSCAR MULTA</h1><br>
                <br>
                <p style="text-align: center!important;">Solo pagar en el día que se va entregar el libro
                <br>
                sb-grotq8794772@personal.example.com
                Ow^JZ3!I
            </p>
                <br>
                <hr>
                <br>
                @if (\Session::has('messages'))
                    error 1
                @endif

                @if ($errors->any())

                    Datos incorrectos
                @endif
                <br>

                <label style="text-align: left;" class="form-label">
                    <h3>Código usuario</h3>
                </label>
                <input type="text" name="text" class="form-control form-control-lg">
                <div class="form-text">
                    <!-- texto -->
                </div>

                <br>

                <div style="text-align: center;" class="d-grid gap-2">
                    <button type="submit" class="btn btn-secondary btn-lg">
                        <h2>Buscar</h2>
                    </button>
                </div>

                <br>
                @if (count($loans))



                    @foreach ($loans as $loan)
                        @php
                            $oldDate = $loan->date;
                            $newDate = new DateTime($oldDate);
                            if ($loan->type == 'Profesor') {
                                $newDate->add(new DateInterval('P14D')); // P1D means a period of 1 day
                                $tarifa = 20;
                            }
                            if ($loan->type == 'Alumno') {
                                $newDate->add(new DateInterval('P7D')); // P1D means a period of 1 day
                                $tarifa = 10;
                            }
                            $fomattedDate = $newDate->format('Y-m-d');
                            
                            $fechaActual = date('d-m-Y');
                            
                            $inicio = strtotime($fomattedDate);
                            $hoy = strtotime($fechaActual);
                            $dias = $hoy - $inicio;
                        @endphp
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Código de Usuario</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Fecha inicio</th>
                                    <th scope="col">Fecha fin</th>
                                    <th scope="col">Multa</th>
                                    <th scope="col">Pagar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <h5>{{ $loan->code_user }}</h5>
                                    </td>
                                    <td class="text-center">
                                        <h5>{{ $loan->id_book }}</h5>
                                    </td>
                                    <td class="text-center">
                                        <h5>{{ $loan->date }}</h5>
                                    </td>
                                    <td class="text-center">
                                        <h5>{{ $fomattedDate }}</h5>
                                    </td>
                                    <td class="text-center">
                                        <h5> <a href="{{ route('multa', $loan->id) }}" style="font-size: 4rem"
                                                type="submit" class="btn btn-danger btn-lg">
                                                <h5>IMPRIMIR MULTA</h5>
                                            </a></h5>
                                    </td>


                                    <td class="text-center">
                                        <h5>
                                            <div class="col d-grid gap-2">
                                                @switch($loan->status)
                                                    @case(1)
                                                        <h5>NO TIENE MULTA</h5>
                                                    @break
                                                    @case(2)
                                                        <a href="{{url('/paypal/pay', $loan->id)}}" style="font-size: 4rem"
                                                            type="submit" class="btn btn-primary btn-lg">
                                                            <h5>PAGAR <i class="fab fa-paypal"></i></h5>
                                                        </a>
                                                    @break
                                                    @case(3)
                                                        CONCLUIDO
                                                    @break
                                                    @case(4)
                                                        <h5>PAGADO</h5>
                                                        <h5>FALTA REGRESAR LIBRO</h5>
                                                    @break
                                                    @default

                                                @endswitch
                                            </div>
                                        </h5>
                                    </td>


                                </tr>

                            </tbody>
                        </table>
                        </div>

                    @endforeach


                @endif

                @if (!$loans)
                    <h4 style="text-align: center;">No hay multas con ese código</h4>
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
