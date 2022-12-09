<?php
include "include/header.php";
include 'database.php';
$obj = new Database();
?>
<?php
    $table='register';
        if(isset($_POST['login']))
        {   
            $email=$_POST['email'];
            $password=$_POST['password'];
            $res = $obj->select($table,null,$email,$password);
            $num=mysqli_num_rows($res);
            if($num==1){
                session_start();
                        $_SESSION['loggedin']=true;
                        $_SESSION['email']=$email;
                $row=mysqli_fetch_array($res);
                 if($row['member']== "writer"){
                        $_SESSION['fullname']=$row['fullname'];
                        $_SESSION['pagelink']='writer_dashboard.php';
                        header("location: writer_dashboard.php");
                }
                elseif($row['member']== "producer"){
                        $_SESSION['fullname']=$row['fullname'];
                        $_SESSION['pagelink']='producer_dashboard.php';
                        header("location: producer_dashboard.php");
                }
            }
            else{
                echo '<div class="dialog_container" id="dialog_container">
				<div class="dialogbox">
								<p>EMAIL OR PASSWORD INCORRECT</p>
								<button id="close">CLOSE</button>
							</div>
				</div>
				<script>
	const dialog_container=document.getElementById("dialog_container");
	const close=document.getElementById("close");

	close.addEventListener("click" , () => {
	dialog_container.classList.add("close");
	})
</script>';
            }
        }
    ?>
    <form action="login.php" method="POST">
    <div class="login_container">
        <div id="overlay">
            <div class="login_container-main">
                <h1>LOGIN</h1>
            <div class="input-group">
                <input type="email" id="name" name="email" required>
                <label for="name"><i class="fa-solid fa-user"></i>Email</label>
            </div>
            <div class="input-group">
                <input type="password" id="name" name="password" required>
                <label for="name"><i class="fa-solid fa-key"></i>Password</label>
            </div>
            <a href="#">Forget Password?</a><br>
            <input type="submit" value="LOGIN" name="login" class="login-btn">
            <br> Not a Member?<a href="apply_online.php" style="color:  #ee4242;;"> Sign Up</a>
        </div>
        </div>
    </div>
    </form>
    <?php
    include "include/footer.php";
    ?>