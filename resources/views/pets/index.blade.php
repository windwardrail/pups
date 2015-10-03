@extends('layout')

@section('content')
	<div class="subheader-wrapper">
		<div class="headline">
    		<h1>Be a Pet's Guardian Angel</h1>
    		<p>
    			Intro copy donate money for rescue puppies below:
    		</p>
    	</div>
    	<div class="donation-honor">

    	</div>
    	<div class="donation-general">

    	</div>
	</div>
	<div class="pets-wrapper">
	    @foreach($pets as $pet)
	    	<div class="pet">
		        <h1>{{ $pet->name }}</h1>
		        <h2>{{ $pet->age }}</h2>
		        <img src="{{ $pet->getDefaultImage() }}">
	    	</div>
	    @endforeach
	</div>
@stop

