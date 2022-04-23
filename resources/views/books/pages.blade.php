@if (count($books))
@foreach($books as $book)
<tr>
  <td class="text-center"><h5><a @if(DB::table('loans')->where('id_book', $book->isbn)->where('status', '!=', '3')->first()) style="color: rgb(200, 7, 28);" @else href="{{route('book_loans', $book->isbn)}}" style="color: rgb(0, 170, 28);" @endif class="text-decoration-none"><b>{{$book->isbn}}</b></a></h5></td>
  <td class="text-center"><h5>{{$book->title}}</h5></td>
  <td class="text-center"><h5>{{$book->author}}</h5></td>

<td class="text-center"><h5>{{$book->editorial}}</h5></td>
<td class="text-center"><h5>{{$book->year_of_publication}}</h5></td>
<td class="text-center"><h5>{{$book->issue_number}}</h5></td>
<td class="text-center"><h5>{{$book->edition}}</h5></td>

  
  <td class="text-center"><div class="d-grid gap-2"><button class="btn btn-warning" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{$book->isbn}}"><h5><i class="fas fa-times"></i></h5></button></div></td>
</tr>
@endforeach

@foreach($books as $book)
<div class="modal fade" id="exampleModal{{$book->isbn}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-body">
      <h5>Seguro de eliminar el libro con isbn: {{$book->isbn}}</h5>
    </div>
<div class="container-fluid">
  <div class="row">
    <div class="col d-grid gap-2">
    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button>
    </div>
    <div class="col d-grid gap-2">
    <a href="{{route('book_delete', $book->isbn)}}" class="btn btn-info btn-lg">Eliminar</a>
    </div>
  </div>
</div>
<br>
  </div>
</div>
</div>
@endforeach

@endif