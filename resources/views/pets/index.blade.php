@extends('layout')

@section('content')
	<div class="subheader-wrapper">
		<div class="headline">
    		<h1>Be a Pet's Guardian Angel</h1>
    		<p>
    			Intro copy donate money for rescue puppies below:
    		</p>
    	</div>
    	<div class="donation-wrapper">
	    	<div class="donation honor">
	    		Donate to honor
	    	</div>
	    	<div class="donation general">
	    		General donation
	    	</div>
    	</div>
    	<p class="clear"></p>
	</div>
	<div class="pets-wrapper">
	    @foreach($pets as $pet)
	    	<div class="pet-wrapper">
		    	<div class="pet" data-id="{{$pet->id}}" >
			        <h1>{{ $pet->name }}</h1>
			        <img src="{{ $pet->getDefaultImageURL() }}">
			        <div class="pet-hover"></div>
		    	</div>
	    	</div>
	    @endforeach
	</div>
@stop

