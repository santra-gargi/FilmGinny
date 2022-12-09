<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>contact</title>
    <link rel="stylesheet" href="both.css">
    <script src="https://kit.fontawesome.com/0ef8057b2b.js" crossorigin="anonymous"></script> 
</head>
<body>
    <div class="contactus">
        <div class="contact-box">
            <div class="contact-left">
                <h3>Send your Feedback</h3>
                <form method="POST" action="#">
                    <div class="row">
                    <div class="input-group">
                        <input type="text" id="name"required>
                        <label for="name"><i class="fa-solid fa-user"></i>Your Name</label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="number"required>
                        <label for="number"><i class="fa-solid fa-phone-square-alt"></i>Phone No.</label>
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" id="email"required>
                    <label for="email"><i class="fa-solid fa-envelope"></i>Email Id</label>
                </div>
                <div class="input-group">
                    <textarea id="message" rows="8" required></textarea>
                    <label for="message"><i class="fa-solid fa-comments"></i>Your Message</label>
                </div>
                <button type="submit" name="submit"><i class="fa-solid fa-paper-plane"></i>Submit</button>
            </form>
            <?php
            if(isset($_POST['submit'])){
                include_once 'function.php';
                $obj=new Contact();
                $res=$obj->contact_us($_POST);
                if($res==true){
                    echo "<script>alert('Your Feedback Is Precious For Us,Thank You')</script>";
                }
                else{
                    echo"<script>alert('Something Went Wrong')<?script>";
                }
            }
            ?>
            </div>
            <div class="contact-right">
                <h3>Contatct Us</h3>
                <div class="contactInfo">
                    <div class="box">
                        <div class="text">
                            <h3><i class="fa-solid fa-location-dot"></i>Address</h3>
                            <p>Gt Road,<br>Dharampur,Chuchura<br>712103</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <h3><i class="fa-solid fa-phone-square-alt"></i>Phone No</h3>
                            <p>+0165454578</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <h3><i class="fa-solid fa-envelope"></i>Email Id</h3>
                            <p>abc@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>