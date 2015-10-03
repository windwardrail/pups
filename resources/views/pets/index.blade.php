@extends('layout')

<<<<<<< Updated upstream
@section('content')
    <h1>Be a Pet's Guardian Angel</h1>

    @foreach($pets as $pet)
        <h1>{{ $pet->name }}</h1>
        <h2>{{ $pet->age }}</h2>
        @foreach($pet->pictures as $picture)
        	<img src="{{ $picture->url }}">
        @endforeach
        <hr>
    @endforeach
@stop
=======
@foreach($pets as $pet)
    <h1>{{ $pet->name }}</h1>
    <h2>{{ $pet->age }}</h2>
    <hr>
@endforeach

@foreach($updates as $update)
    <h1>{{ $update->pet_id }}</h1>
    <h2>{{ $update->content }}</h2>
    <hr>
@endforeach

@foreach($donors as $donor)
    <h1>{{ $donor->first_name }}</h1>
    <h2>{{ $donor->last_name }}</h2>
    <hr>
@endforeach

>>>>>>> Stashed changes
