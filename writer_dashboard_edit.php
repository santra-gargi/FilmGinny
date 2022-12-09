<?php
include "include/header.php";
include 'database.php';
$obj = new Database();
$sno=$_GET['id'];
$table = "upload";
$res = $obj->select($table,$sno);
while ($row = mysqli_fetch_array($res)) {
			?>
			<div class="dashboard writer">
			<div class="overlay">
				<div class="dash_title">
					<H3>WRITER'S DASHBOARD</H3>
					<H3>WELCOME USER</H3>
				</div>
				<h3 style="color: white;">EDIT YOUR SCRIPT</h3>
				<div class="scpt_upload">
					<form action="writer_dashboard.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name='id' value="<?php echo $row['sno'];?>"> 
						<div class="input-group">
							<input type="text" id="scpt_title" name="scpt_title" value="<?php echo $row['title'];?>" required>
							<label for="scpt_title">Title</label>
						</div>
						<div class="input-group">
							<textarea id="scpt_summary" name="scpt_summary" rows="10" cols="70" required><?php echo $row['summary'];?></textarea>
							<label for="scpt_summary">Summary</label>
						</div>
						<div class="upload">
							<p><strong>UPLOAD YOUR SCRIPT PDF HERE</strong></p>
							<input type="file" name="file"><br><br>
							<input type="hidden" name="file_old" value="<?php echo $row['file'];?>" required><br><br>
						</div>
						<div class="input_field_terms_submit">
							<a href="#"><input type="submit" value="Update" name="upload_edit"class="btn"></a>
						</div>
					</form>
				</div>
		<?php
}
?>
		<?php
include "include/footer.php";
?>