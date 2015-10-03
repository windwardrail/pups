@extends('layout')

@section('content')
	<div class="content">
		<div class="petname">
			{{ $pet->name }}
		</div>
		<div class="pet-image">
			@foreach($pet->updates as $update) 
			<img src="{{ $pet->getDefaultImageURL() }}"/>
			@endforeach
		</div>
		<div class="information-wrapper">
	    	<div class="information updates">
	    		Puppy updates
	    	</div>
	    	<div class="information messages">
	    		Donor messages
	    	</div>
    	</div>
		<div class="subcontent-wrapper">
			<div class="pet-story">
				<p>{!! $pet->story !!}</p>
			</div>
			<div class="pet-newsfeed">
				@foreach($pet->updates as $update) 
				<div class"newsfeed-wrapper">
					<p>{{ $update->content }}</p>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="right-content">
		@include('pets._donate', ['pet' => $pet, 'errors' => $errors])
	</div>
@stop

