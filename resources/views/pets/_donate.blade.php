<div class=Donation-Name>
    Donate for {{ $pet->name }}
</div>
    <div class="TEST">
    We gratefully accept payments via /PayPal for your convenience
    </div> 
    <div class="TEST"> *Inicates a required field</div>
    <form action="{{ route('donations.submit', [$pet->id]) }}" method="post">
    {{ csrf_field() }}
    <div class="name-wrapper">
        <div class=TEST>
            <div class=form-titles>First Name*</div>
            {{ $errors->first('firstName') }}
            <input type="text" name="firstName" id="firstName" required placeholder="First Name"/>
        </div>
        <div class=TEST>
            <div class=form-titles>Last Name*</div>
            {{ $errors->first('lastName') }}
            <input type="text" name="lastName" id="lastName" required placeholder="Last Name"/>
        </div>
    </div>
    <div class=TEST>
    <div class=form-titles>Email address*</div>
        <input type="email" name="email" id="email" placeholder="Email"/>
    </div>
     <div class=TEST>
    <div class=form-titles>Donation type*</div>
        <select name="donation-type">
            <option value="one">One Time</option>
            <option value="recurring">Monthly</option>
        </select>
    </div>
    <div class=TEST>
        <div class=form-titles>Donation amount*</div>
            <input type="number" min="0.01" step="0.01" name="donation" id="donation" required/>
        </div>
        <div class=TEST>
            Add a message (optional)
            <textarea cols="45" rows="5" name="message" placeholder="Optional comment field for messages"></textarea>

        </div>

    <div class=subscribe-box><label for="subscribed">Subscribe to email updates about {{ $pet->name }}?&nbsp; &nbsp; &nbsp;  </label>
    <input type="checkbox" name="subscribed" id="subscribed"/>
    </div>
    <div class=donate-button>
    <input type="submit" value="Donate now">
    </div>
</form>
<div class="disclosure">
    As PUP is a 501(c)(3) registered non-profit organization, your contributions are 
    tax-deductible to the extent allowed by law. Please know that PUP does not share or 
    release our supporter information, including mail and e-mail addresses, to other organizations.
</div>