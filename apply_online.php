<?php
include "include/header.php";
include 'database.php';
$obj = new Database();
?>  
<?php
    $table='register';
        if(isset($_POST['submit']))
        {   
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $fullname=$_POST['fullname'];
            $password=$_POST['password'];
            $member=$_POST['member'];
            
            $res=$obj -> select($table,null,$email,null);
            if(mysqli_num_rows($res)>0){
                echo '<div class="dialog_container" id="dialog_container">
				<div class="dialogbox">
								<p>EMAIL ALREADY IN USE</p>
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
            else{
                $obj -> insert($table,['email'=>$email,'phone'=>$phone,'fullname'=>$fullname,'password'=>$password,'member'=>$member],null);
                session_start();
                            $_SESSION['loggedin']=true;
                            $_SESSION['email']=$email;
                     if($member== "writer"){
                            $_SESSION['fullname']=$fullname;
                            $_SESSION['pagelink']='writer_dashboard.php';
                            header("location: writer_dashboard.php");
                    }
                    elseif($member== "producer"){
                            $_SESSION['fullname']=$fullname;
                            $_SESSION['pagelink']='producer_dashboard.php';
                            header("location: producer_dashboard.php");
                
            }
            }
    }
    ?>
    <form action="apply_online.php" method="POST">
    <div class="apply_online">
        <div class="overlay">
            <div class="center">
                <h3>REGISTRATION FORM</h3>
                <div class="input-group_applyonline">
                    <input type="email" id="name" name="email" required>
                    <label for="name">Email</label>
                </div>
                <div class="input-group_applyonline">
                    <input type="number" id="name" name="phone"required>
                    <label for="name">Contact Number</label>
                </div>
                <div class="input-group_applyonline">
                    <input type="text" id="name" name="fullname" required>
                    <label for="name">Full name</label>
                </div>
                <div class="input-group_applyonline">
                    <input type="password" id="name" name="password" required>
                    <label for="name">Password</label>
                </div>
                <p><strong>REGISTER AS ?</strong><br><br></p><br>
                    <div id="member">
                        <div id="mem">
                        <p>Writer</p><input type="radio" name="member" value="writer">
                    </div>
                        <div id="mem">
                        <p>Producer</p><input type="radio" name="member" value="producer">
                    </div>
            </div>
                <div class="input_field_terms">

                     <div class="input_field_checkbox">   
                    <p>I hereby, declare that all the above mentioned information is correct</p>
                    <span class="checkmark"></span>
                    <input type="checkbox" required>
                    </span><br>
                </div>
                </div>
                <div class="input_field_terms_submit">
                <a href="writer_dashboard.php"><input type="submit" name="submit" value="REGISTER" class="btn"></a>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php
    include "include/footer.php";
    ?>