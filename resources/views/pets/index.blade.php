<h1>All Pets!</h1>

@foreach($pets as $pet)
    <h1>{{ $pet->name }}</h1>
    <h2>{{ $pet->age }}</h2>
    @foreach($pet->pictures as $picture)
    	<img src="{{ $picture->url }}">
    @endforeach
    <hr>
@endforeach
