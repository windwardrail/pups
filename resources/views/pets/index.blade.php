@extends('layout')

@section('content')
	<div class="subheader-wrapper">
		<div class="headline">
    		<h1>Be a Pet's Guardian Angel!</h1>
    		<p>
    			Your donations help us pull in hundreds of dogs from local and high-kill shelters
    			as well as dogs with medical or other special needs.  These dogs face insurmountable
    			odds and often time require surgery and long-term care.  PUP provides thousands of
    			 dollars in medical care to sick and injured dogs each year.<br> 
    			 <br>
    			You can be a PUP Guardian Angel by sponsoring one of these special dogs. The cost 
    			is a minimum of $10 per month.  You can stop your donation at any time or it will 
    			automatically stop when the dog is adopted.  We will update you on the progress of 
    			the dog you are sponsoring while he or she is in PUP's care. You may also elect to
    			direct your donation to the general fund for PUP's special and medical needs dogs
    			rather than a specific dog.  <br>
    			<br>
    			Your donation helps us make the decisions that save lives.  Thank you for your generosity!
    		</p>
    	</div>
    	<div class="donation-wrapper">
	    	<a href="/donate" class="donation honor">
	    		Donate in Honor
	    		of a Pet or Loved One
	    	</a>
    	</div>
    	<p class="clear"></p>
	</div>
	<div class="pets-wrapper">
	    @foreach($pets as $pet)
	    	<div class="pet-wrapper">
		    	<div class="pet" data-id="{{$pet->id}}" >
			        <h1>{{ $pet->name }}</h1>
			        <img src="{{ $pet->getDefaultImageURL(App\Picture::SQUARE) }}">
			        <div class="pet-hover"></div>
		    	</div>
	    	</div>
	    @endforeach
      <p class="clear"></p>
	</div>
@stop

