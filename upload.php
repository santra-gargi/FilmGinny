<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <header>Upload Your Register Work Here</header>
        <form action="#">
            <input class="file-input" type="file" name="file" hidden>
            <i class="fas fa-cloud-upload-alt"></i>
            <p>Browse File to Upload</p>
        </form>
        <section class="progress-area"></section>
        <section class="uploaded-area"></section>
    </div>

	<?php
$file_name =  $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$file_up_name = time().$file_name;
move_uploaded_file($tmp_name, "files/".$file_up_name);
?>
    <script src="js/main.js"></script>

</body>
</html>