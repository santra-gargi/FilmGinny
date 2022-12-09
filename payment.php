<!DOCTYPE html>
<html lang="en">
<?php
	include 'database.php';
	$obj = new Database();
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FGC-Payment</title>
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="css/payment.css">
</head>
<?php
$file=$_GET['id'];
$table = 'payment';
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];


    $obj->insert($table, ['fullname' => $fullname, 'email' => $email, 'address' => $address, 'city' => $city, 'state' => $state, 'zipcode' => $zipcode],null);
}
?>
<body>
	<p class="title">FILM GINNY CORPORATION</p>
	<p class="sub-title">PAYMENT GATEWAY</p>
	<div class="container">
		<form action="payment.php" method="POST">
			<div class="row">
				<div class="col">
					<h3 class="title">billing address</h3>
					<div class="inputBox">
						<span>full name :</span>
						<input type="text" placeholder="john deo" name="fullname">
					</div>
					<div class="inputBox">
						<span>email :</span>
						<input type="email" placeholder="example@example.com" name="email">
					</div>
					<div class="inputBox">
						<span>address :</span>
						<input type="text" placeholder="room - street - locality" name="address">
					</div>
					<div class="inputBox">
						<span>city :</span>
						<input type="text" placeholder="mumbai" name="city">
					</div>
					<div class="flex">
						<div class="inputBox">
							<span>state :</span>
							<input type="text" placeholder="india" name="state">
						</div>
						<div class="inputBox">
							<span>zip code :</span>
							<input type="text" placeholder="123 456" name="zipcode">
						</div>
					</div>

				</div>
				<div class="col">
					<h3 class="title">payment</h3>
					<div class="inputBox">
						<span>cards accepted :</span>
						<img src="images/card_img.png" alt="">
					</div>
					<div class="inputBox">
						<span>name on card :</span>
						<input type="text" placeholder="mr. john deo">
					</div>
					<div class="inputBox">
						<span>credit card number :</span>
						<input type="number" placeholder="1111-2222-3333-4444">
					</div>
					<div class="inputBox">
						<span>exp month :</span>
						<input type="text" placeholder="january">
					</div>

					<div class="flex">
						<div class="inputBox">
							<span>exp year :</span>
							<input type="number" placeholder="2022">
						</div>
						<div class="inputBox">
							<span>CVV :</span>
							<input type="text" placeholder="1234">
						</div>
					</div>
				</div>
			</div>
			<button type="submit"  value="proceed to checkout" class="submit-btn" style="color:white;" name="submit"><a href="payment_complete.php?id=<?php echo $file ?>">Proceed To Checkout</a></button>
		</form>
	</div>
</body>
</html>