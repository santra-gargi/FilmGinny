<?php
include "include/header.php";
include 'database.php';
$obj = new Database();
?>
<?php
$table='upload';
$email=$_SESSION['email'];
$fullname=$_SESSION['fullname'];
if(isset($_POST['upload']))
{   
    $title=$_POST['scpt_title'];
    $summary=$_POST['scpt_summary'];
    $check="upload";

    $file=rand(100,1000) .  "-" . $_FILES['file']['name'];
    $tmpfile = $_FILES['file']['tmp_name'];
    $upload_path= 'upload/' .$file;
    move_uploaded_file($tmpfile,$upload_path);

    $obj -> insert($table,['title'=>$title,'summary'=>$summary,'file'=>$file,'email'=>$email,'fullname'=>$fullname],$check);
}
?>
 <?php
     if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'])!=true){
         header("location: login.php");
         exit;
     }
?> 
<div class="dashboard writer">
    <div class="overlay">
        <div class="dash_title">
            <H3>WRITER'S DASHBOARD</H3>
            <H3>WELCOME <?php echo $_SESSION['fullname']?></H3>
        </div>
        <h3 style="color: white;">UPLOAD YOUR NEW SCRIPT</h3>
        <div class="scpt_upload">
            <form action="writer_dashboard.php" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="text" id="scpt_title" name="scpt_title" required>
                    <label for="scpt_title">Title</label>
                </div>
                <div class="input-group">
                    <textarea id="scpt_summary" name="scpt_summary" rows="10" cols="70" required></textarea>
                    <label for="scpt_summary">Summary</label>
                </div>
                <div class="upload">
                    <p><strong>UPLOAD YOUR SCRIPT PDF HERE</strong></p>
                    <input type="file" name="file" required><br><br>
                </div>
                <div class="input_field_terms_submit">
                    <a href="#"><input type="submit" value="Upload" name="upload" class="btn"></a>
                </div>
            </form>
        </div>
        <h3 style="color: white;">YOUR UPLOADS</h3>
        <div class="dashboard_writer_bottom">
            <table style="width:100%">
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>SUMMARY</th>
                    <th>FILE</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
                <?php
                $table = "upload";
                $res = $obj->select($table,null,$email,null);
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td><?php echo $row['sno'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['summary'] ?></td>
                        <td><?php echo $row['file'] ?></td>
                        <td><a href="writer_dashboard_edit.php?id=<?php echo $row['sno'] ?>"><i class="fa-solid fa-pen-to-square " style="color: green; cursor:pointer;"></i></a></td>
                        <td><form action="writer_dashboard.php" method="POST">
                            <input type="hidden" name='id' value="<?php echo $row['sno'];?>"> 
                            <button style="color: red;cursor:pointer; font-size: large;" type="submit" name="delete"><i class="fa-solid fa-trash"></i></button>
                        </form></td>
                    </tr>
                <?php
                }

                ?>
            </table>
    </div>
</div>
</div>
<?php
	if(isset($_POST['upload_edit']))
	{
        $sno=$_POST['id'];
	    $title=$_POST['scpt_title'];
	    $summary=$_POST['scpt_summary'];

        $file_new=$_FILES['file']['name'];
        $file_old=$_POST['file_old'];

        if($file_new!=''){
            $file=rand(100,1000) .  "-" . $_FILES['file']['name'];
            $tmpfile = $_FILES['file']['tmp_name'];
            $upload_path= 'upload/' .$file;
            move_uploaded_file($tmpfile,$upload_path);
        }
        else{
            $file=$file_old;
        }

        $obj -> update($table,['title'=>$title,'summary'=>$summary,'file'=>$file],$sno);
	}
?>
<?php
    if(isset($_POST['delete'])){
        $sno=$_POST['id'];
        $obj -> delete($table,$sno);
    }
?>
<?php
include "include/footer.php";
?>