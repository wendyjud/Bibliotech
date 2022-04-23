
<title>Libros | Busqueda</title>

<div class="container">
<div class="container card shadow">
<div class="table-responsive">
<h1>Hola aqui estan tus resultados</h1>
    <table class="table table-striped align-middle">
        <thead>
          <tr>

            <th class="text-center" scope="col"><h5>Titulo</h5></th>
            <th class="text-center" scope="col"><h5>Autor</h5></th>
            <th class="text-center" scope="col"><h5>Editorial</h5></th>
            <th class="text-center" scope="col"><h5>Año de publicacion</h5></th>
            <th class="text-center" scope="col"><h5>Número de emisión</h5></th>
            <th class="text-center" scope="col"><h5>Edición</h5></th>
          </tr>
        </thead>
        @if (count($books))
        @foreach($books as $book)
        <div class="table-responsive">
        <tbody>
        <tr>
        <td class="text-center"><h5><a @if(DB::table('loans')->where('id_book', $book->isbn)->where('status', '!=', '3')->first()) style="color: rgb(200, 7, 28);" @else href="{{route('book_loans', $book->isbn)}}" style="color: rgb(0, 170, 28);" @endif class="text-decoration-none"><b>{{$book->isbn}}</b></a></h5></td>
        <td class="text-center"><h5>{{$book->title}}</h5></td>
        <td class="text-center"><h5>{{$book->author}}</h5></td>
        <td class="text-center"><h5>{{$book->editorial}}</h5></td>
        <td class="text-center"><h5>{{$book->year_of_publication}}</h5></td>
        <td class="text-center"><h5>{{$book->issue_number}}</h5></td>
        <td class="text-center"><h5>{{$book->edition}}</h5></td>
  
        </tr>
        </tbody>  

        </div>
        @endforeach
        @endif
            </table>
            
  </div>
 </div>
  </div>