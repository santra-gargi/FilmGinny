<link rel="stylesheet" href="css/style.css">
<?php
use LDAP\Result;

	class Database{
		private $db_host="localhost";
		private $db_user="root";
		private $db_pass="";
		private $db_name="fgc";

		private $conn=false;
		public $mysqli="";
		private $result = array();
		//DATABASE CONNECTION
		public function __construct()
		{
			if(!$this->conn){
				$this->mysqli=new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
				$this->conn=true;

				if($this->mysqli->connect_error){
					array_push($this->result,$this->mysqli->connect_error);
					return false;
				}
			}
			else{
				return true;
			}
		}
		//INSERT
		public function insert($table, $param=array(),$check)
		{
			$table_columns= implode(',', array_keys($param));
			$table_value= implode("','", $param);

			$sql= "INSERT INTO $table ($table_columns) VALUES ('$table_value')";

			if($this->mysqli->query($sql)){
				if($check=="upload"){
					echo '<div class="dialog_container" id="dialog_container">
				<div class="dialogbox">
								<p>SCRIPT UPLOADED SUCCESFULLY</p>
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
				elseif($check=="contact"){
					echo '<div class="dialog_container" id="dialog_container">
				<div class="dialogbox">
								<p>THANK YOU FOR CONTACTING US</p>
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
			}else{
				echo '<div class="dialog_container" id="dialog_container">
				<div class="dialogbox">
								<p>SCRIPT NOT UPLOADED SUCCESFULLY</p>
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
		//UPDATE
		public function update($table, $param=array(),$where=null)
		{	
			$args=array();
			foreach ($param as $key => $value){
				$args[]="$key = '$value'";
			}

			$sql="UPDATE $table SET " . implode(',', $args);
			if($where!=null){
				$sql .=" WHERE sno='$where'";
			}

			if($this->mysqli->query($sql)){
				echo '<div class="dialog_container" id="dialog_container">
				<div class="dialogbox">
								<p>SCRIPT UPDATED SUCCESFULLY</p>
								<button id="close">CLOSE</button>
							</div>
				</div>
				<script>
	const dialog_container=document.getElementById("dialog_container");
	const close=document.getElementById("close");

	close.addEventListener("click" , () => {
	dialog_container.classList.add("close");
	window.location.href = "writer_dashboard.php";
	})
</script>';
			}else{
				echo '<div class="dialog_container" id="dialog_container">
				<div class="dialogbox">
								<p>SCRIPT NOT UPDATED SUCCESFULLY</p>
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
		
		//DELETE
		public function delete($table,$where=null)
		{
			$sql="DELETE FROM $table";
			if($where!=null){
				$sql .=" WHERE sno='$where'";
			}
			if($this->mysqli->query($sql)){
				echo '<div class="dialog_container" id="dialog_container">
				<div class="dialogbox">
								<p>SCRIPT DELETED SUCCESFULLY</p>
								<button id="close">CLOSE</button>
							</div>
				</div>
				<script>
	const dialog_container=document.getElementById("dialog_container");
	const close=document.getElementById("close");

	close.addEventListener("click" , () => {
	dialog_container.classList.add("close");
	window.location.href = "writer_dashboard.php";
	})
</script>';
			}else{
				echo '<div class="dialog_container" id="dialog_container">
				<div class="dialogbox">
								<p>SCRIPT NOT DELETED SUCCESFULLY</p>
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
		//SELECT
		public function select($table,$where=null,$where1=null,$where2=null)
		{
			$sql="SELECT * FROM $table";
			if($where!=null){
				$sql .=" WHERE sno='$where'";
			}
			if($where1!=null){
				$sql .=" WHERE email='$where1'";
			}
			if($where2!=null){
				$sql .=" AND password='$where2'";
			}
			if($this->mysqli->query($sql)){
				$res=$this->mysqli->query($sql);
				return $res;
			}else{
				echo '<script>alert("NOT DONE")</script>';
			}
		}
		public function getResult(){
			$val = $this->result;
			$this->result = array();
			return $val;
		}
		}
?>
