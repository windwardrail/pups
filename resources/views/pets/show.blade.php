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
				<p>{{ $pet->story }}</p>
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
		<h1>Donate for this puppy now!</h1>
		<div class="name-wrapper">
			<input type="text" name="firstName" id="firstName" required placeholder="First Name" />
			<input type="text" name="lastName" id="lastName" required placeholder="Last Name" />
		</div>
		<input type="email" name="email" id="email" placeholder="Email" />
		<select name="donation-type">
			<option value="one">One Time</option>
			<option value="recurring">Monthly</option>
		</select>
		<textarea cols="50" rows="50" name="message" placeholder="Optional comment field for messages"></textarea>
		<input type="number" min="0.01" step="0.01" name="donation" id="donation" required />
		<input type="checkbox" name="notification" id="notification" />
		<button type="submit" />
		<div class="recommendation">
			<h2>How much should I give</h2>
			<ul>
				<li>$25 = XXX</li>
				<li>$50 = XXX</li>
			</ul>
		</div>
	</div>
@stop

