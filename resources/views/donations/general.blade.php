@extends('layout')

@section('content')
  <div class="donation-form">
      <h1>Make a Gift Donation in Memory or Honor of a Beloved Person or Animal</h1>
      <p>We gratefully accept donations via Paypal for your convenience.</p>
      <div class="form">
          <form method="post">
              <table>
                <tr>
                    <td>
                      First name
                      <input type="text" required name="first_name" id="firstname" /></td>
                    <td>
                      Last name
                      <input type="text" required name="last_name" id="lastname" />
                    </td>
                </tr>
                <tr>
                    <td>
                      Email address
                      <input type="email" required name="email" id="email" />
                    </td>
                </tr>
                <tr>
                    <td>
                      Donation type
                      <select name="type">
                        <option value="one">One Time</option>
                        <option value="recurring">Monthly</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td>
                      Donation Amount
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
                      <input type="checkbox" name="subscription" class="checkbox" />Add me to the email list
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
                extent allowed by law.<br />
                See the difference your gift makes.
              </p>
          </form>
      </div>
  </div>
  <div class="donation-messages">
    <h1>Donation in memory or in honor of</h1>

  </div>
@stop