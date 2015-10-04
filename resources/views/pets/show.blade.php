@extends('layout')

@section('content')
	<div class="right-content">
		@include('pets._donate', ['pet' => $pet, 'errors' => $errors])
	</div>
	<div class="left-content">
		<div class="petname">
			{{ $pet->name }}
		</div>
	<div class="pet-image">
		<span id="scroll-left"><</span>
		<span id="scroll-right">></span>
		<div class="pet-image-inner">
				@foreach($pet->pictures as $picture) 
						<img src="{{ $picture->getImage(App\Picture::SQUARE) }}"/>
				@endforeach
		</div>
	</div>
	<div class="information-wrapper">
	    <a href="#updates" class="information updates">
	    	Pet updates
	    </a>
	    <a href="#newsfeed" class="information messages">
	    	Donor messages
	    </a>
	    <a href="/" class="information back">
	    	Return to all pets
	    </a>
	</div>	
	<div class="subcontent-wrapper">
		<div class="pet-story">
			<div class="newsfeed-updates">
				About
			</div>
			<p>{!! $pet->story !!}</p>
		</div>
	</div>
	<div class="newsfeed-wrapper">
		<div class="newsfeed-updates" id="updates">
			Pet updates
		</div>
		<div class="puppyupdates">
			@foreach($pet->updates as $update) 
				<p>{!! $update->content !!}</p>
			@endforeach
		</div>
		<div class="newsfeed-updates" id="newsfeed">
			Messages from Donors
		</div>
	</div>
</div>
@stop

