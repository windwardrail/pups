<h2>Donate for {{ $pet->name }}</h2>

<form action="{{ route('donations.submit', [$pet->id]) }}" method="post">

    {{ csrf_field() }}

    <div class="name-wrapper">
        {{ $errors->first('firstName') }}
        <input type="text" name="firstName" id="firstName" required placeholder="First Name"/>
        {{ $errors->first('lastName') }}
        <input type="text" name="lastName" id="lastName" required placeholder="Last Name"/>
    </div>
    <input type="email" name="email" id="email" placeholder="Email"/>
    <select name="donation-type">
        <option value="one">One Time</option>
        <option value="recurring">Monthly</option>
    </select>

    <textarea cols="50" rows="5" name="message" placeholder="Optional comment field for messages"></textarea>

    <input type="number" min="0.01" step="0.01" name="donation" id="donation" required/>

    <label for="subscribed">Subscribe to this animal's updates?</label>
    <input type="checkbox" name="subscribed" id="subscribed"/>

    <input type="submit" value="Donate!">
</form>

<div class="recommendation">
    <h2>How much should I give</h2>
    <ul>
        <li>$25 = XXX</li>
        <li>$50 = XXX</li>
    </ul>
</div>