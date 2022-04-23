@extends('layout')
@section('content')
<br>
<br>
<br>
<br>
<br>
<div style="margin-left: auto; margin-right: auto; text-align: center;">
    @if ($user->img == "img.png")
    <img class="shadow" style="width: 200px;" src="{{asset('img.png')}}" alt="">
        
    @else
    <img class="shadow" style="width: 200px;" src="{{ url('getfile/' .$user->img )}}" alt="">
    @endif
    
</div>
<br>
<h1 class="text-center">{{$user->name}} {{$user->lastname}}</h1>
<br>
<br>
<br>
<h1 class="text-center">{{$user->code}}</h1>
<h1 class="text-center">{{$user->phone}}</h1>
<h1 class="text-center">{{$user->degree}}</h1>
@endsection