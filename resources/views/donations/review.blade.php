@extends('layout')

@section('content')

    <h1>Please review your donation</h1>

    <p>{{ $donor->first_name }} {{ $donor->last_name }}</p>
    <p>{{ $donor->email }}</p>
    <p>${{ $payment->amount }}</p>

<form action="{{ route('donations.confirm', ['donor_id' => $donor->id]) }}">
    <input type="submit" value="Confirm"><br>
    <a href="{{ route('pets.index') }}" class="button cancel-button">Cancel</a>
</form>

@stop