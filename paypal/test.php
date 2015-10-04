<?php

if(isset($_POST['amount'])){
	session_start();
	
	$_SESSION['Payment_Amount']	= $_POST['amount'];
	$_SESSION['Payment_Option'] = $_POST['option'];
	header('Location: billing.php');
}
	
?>
<form action='test.php' METHOD='POST'>
Donatation Amount: <input type="text" name="amount"/><br>
Paypal: <input type="radio" name="option" value="PayPal"><br>
<input type='image' name='submit' src='https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif' border='0' align='top' alt='Check out with PayPal'/>
</form>


