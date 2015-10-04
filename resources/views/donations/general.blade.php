@extends('layout')

@section('content')
  <div class="donation-form">
      <h1>Make a Gift Donation in Memory or Honor of a Beloved Person or Animal</h1>
      <p>We gratefully accept donations via Paypal for your convenience.</p>
      <div class="form">
          <form action="{{ route('donations.submit', 0) }}" method="post">
              <table cellspacing="10" >
                <tr>
                  <td colspan="2">
                     *Inicates a required field
                  </td>
                </tr>
                <tr>
                    <td>
                      First name*
                      <input type="text" required name="firstName" id="firstname" /></td>
                    <td>
                      Last name*
                      <input type="text" required name="lastName" id="lastname" />
                    </td>
                </tr>
                <tr>
                    <td>
                      Email address*
                      <input type="email" required name="email" id="email" />
                    </td>
                </tr>
                <tr>
                    <td>
                      Donation type
                      <select name="donation-type">
                        <option value="one">One Time</option>
                        <option value="recurring">Monthly</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td>
                      Donation Amount*
                      <input  type="number" min="0.01" step="0.01" name="donation" id="donation" required />
                    </td>
                    <td>
                      <a id="howmuch">How much should I give?</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                      Add a message in honor of your beloved (optional)
                      <textarea name="message" rowspan="20"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                      <input type="checkbox" name="subscribed" class="checkbox" />Add me to the email list
                    </td>
                </tr>
                <tr>
                  <td colspan="2" align="center">
                    <button type="submit">Donate now</button>
                  </td>
                </tr>
              </table>
              <p class="disclaimer">
                People United for Pets (PUP) is a 501(c)3 registered non-profit
                organization and your contributions are tax-deductible to the
                extent allowed by law.
                See the difference your gift makes.
              </p>
          </form>
      </div>
  </div>
  @if(count($donations) > 0)
    <div class="donation-messages">
      <h2>Donation in memory or in honor of</h2>
      @foreach($donations as $donation)
          <div class="message-wrapper">
              <div class="message">
                  "{{$donation->comment}}"
              </div>
              <div class="author">
                  {{ucwords($donation->first_name)}} {{ucwords($donation->last_name)}}
              </div>
          </div>
      @endforeach
    </div>
  @endif
  <div class="suggested-donations">
    <div id="close">&#10006;</div>
    <h2>How much should I give?</h2>
    <p>
      We accept any amount of donations. The information below will give you an
      idea of what your donation may cover.
    </p>
    <p>
      People United for Pets (PUP) is a 501(c)3 registered non-profit organization
      and your contributions are tax-deductible to the extent allowed by law.
    </p>
    <div class="donation-amounts">
        <div class="amount" data-amount="25">
          <span>$25</span> Pays for five microchips
        </div>
        <div class="amount" data-amount="40">
          <span>$40</span> Pays for one grooming
        </div>
        <div class="amount" data-amount="50">
          <span>$50</span> Pays for 25 collars &amp; 25 leashes
        </div>
        <div class="amount" data-amount="75">
          <span>$75</span> Pays for one teeth cleaning
        </div>
        <div class="amount" data-amount="100">
          <span>$100</span> Pays for neuter of one dog
        </div>
        <div class="amount" data-amount="120">
          <span>$120</span> Pays for spay of one dog
        </div>
        <div class="amount" data-amount="">
          Other amount
        </div>
    </div>
    <div class="last-paragraph">
      <h3>Other Donation Methods</h3>
      <p style="margin-top: 0;">Download our donation form (pdf) here!</p>
      <p>
          Monetary donations can be mailed directly to:<br />
          People United for Pets<br />
          P.O. Box 1691<br />
          Issaquah, WA 98027
      </p>
      <p>
        Also do not forget to take a look into the PUP Wishlist. or consider a single donation. For donations of non-monteray items or donation questions, please contact Laura at donate@pupdogrescue.org
      </p>
      <p>
        Thank you for your generosity!
      </p>
    </div>
  </div>
@stop