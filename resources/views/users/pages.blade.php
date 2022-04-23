@if (count($users))
    @foreach ($users as $user)
    <tr>
        <td class="text-center"><h5><a style="color: black;" class="text-decoration-none" href="{{route('viewuser', $user->id)}}"><b>{{$user->code}}</b></a></h5></td>
        <td class="text-center">
          @if ($user->img == "img.png")
        <img class="shadow" style="width: 100px;" src="{{asset('img.png')}}" alt="">
            
        @else
        <img class="shadow" style="width: 100px;" src="{{ url('getfile/' .$user->img )}}" alt="">
        @endif
       </td>
        <td class="text-center"><h5>{{$user->name}}</h5></td>
        <td class="text-center"><h5>{{$user->lastname}}</h5></td>
        <td class="text-center"><h5>{{$user->type}}</h5></td>

      <td class="text-center"><h5>{{$user->degree}}</h5></td>
      <td class="text-center"><h5>{{$user->phone}}</h5></td>

        <td class="text-center"><div class="d-grid gap-2"><a href="{{route('edituser', $user->id)}}" class="btn btn-secondary"><h5><i class="fas fa-edit"></i></h5></a></div></td>
        <td class="text-center"><div class="d-grid gap-2"><button class="btn btn-warning" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}"><h5><i class="fas fa-times"></i></h5></button></div></td>
      </tr>
    @endforeach

    @foreach($users as $user)
    <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
       <div class="modal-content">
         <div class="modal-body">
           <h5>Seguro de eliminar el usuario con codigo: {{$user->code}}</h5>
         </div>
     <div class="container-fluid">
       <div class="row">
         <div class="col d-grid gap-2">
         <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button>
         </div>
         <div class="col d-grid gap-2">
         <a href="{{route('user_delete', $user->id)}}" class="btn btn-info btn-lg">Eliminar</a>
         </div>
       </div>
     </div>
     <br>
       </div>
     </div>
   </div>
@endforeach
    
@endif