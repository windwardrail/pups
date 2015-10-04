@extends('layout')

@section('content')

    <div class="review">
        <h1>Please review your donation</h1>

        <img src="{{ $pet->getDefaultImage()->getImage(\App\Picture::SQUARE) }}" alt="Cute Pet">

        <div class="payment-info">
            <p>Name: {{ $donor->first_name }} {{ $donor->last_name }}</p>

            <p>Email: {{ $donor->email }}</p>
            @if($is_general)
                <p>You are donating ${{ $payment->amount }} to our general animal welfare fund.</p>
            @else
                <p>You are donating ${{ $payment->amount }} to {{ $pet->name }}</p>
            @endif

            @if( ! empty($donor->comment))
                <p>Your message: {{ $donor->comment }}</p>
            @endif
        </div>
    </div>



    <form action="{{ route('donations.confirm', ['donor_id' => $donor->id]) }}">
        <input type="submit" value="Confirm"><br>
        <a href="{{ route('pets.index') }}" class="button cancel-button">Cancel</a>
    </form>

@stop