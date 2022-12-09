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
	<title>FGC-Download</title>
	<link rel="stylesheet" href="css/payment.css">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<?php
	$file=$_GET['id'];
?>
<body>
	<p class="title">FILM GINNY CORPORATION</p>
	<p class="sub-title">PAYMENT SUCCESSFUL</p>
	<div class="download">
		<a href="upload/<?php echo $file?>" target="_blank">DOWNLOAD FILE</a>
	</div>
	<div class="download">
		 <a href="index.php" style="width: 150px; height:50px; font-size:20px; text-align:center;background-color:coral">HOME PAGE</a>
	</div>
</body>
</html>