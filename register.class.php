<?php
require_once "admin/class/common.php";
require_once "admin/class/config.php";
class User extends Common{
	public $id, $name, $username, $email, $password, $status;

	public function login()
	{
		$this->password = $this->password;
		$sql = "SELECT * FROM tbl_register WHERE username = '$this->username' and password='$this->password' ";
		$conn = new mysqli('localhost','root','','db_khali');
		//print_r($conn);
		if($conn->connect_errno != 0){
			die("Database Connection error!!");
		}
		$res = $conn->query($sql);
		//print_r($res);
		if($res->num_rows == 1 ){
			$data = $res->fetch_assoc();
			//print_r($data);	
			@session_start();
			//$_SESSION['email'] = $this->email;
			$_SESSION['username'] = $data['username'];
			$_SESSION['first_name'] = $data['first_name'];
			$_SESSION['middle_name'] = $data['middle_name'];
			$_SESSION['last_name'] = $data['last_name'];
			$_SESSION['message_login'] = '<center>Welcome, ' .$data['first_name'] .' ' .$data['middle_name'] .' '.$data['last_name']. '. You are successfully logged in!!! Now you can post your own rental ad. Thank you for joining us!!</center>';
			redirect('index.php');
		}else{
			return false;
		}
	}

	public function save()
	{
		$this->password= $this->password;
		$sql = "insert into tbl_user (name,username,email,password) values('$this->name', '$this->username', '$this->email', '$this->password') ";
		$conn = new mysqli('localhost','root','','db_newsportal');
		$result = $this->insert($sql);
		if($result){
			$_SESSION['success_message'] = "User Inserted successfully with $result";
			//redirect('list_user.php');
		}else{
			return false;
		}
	}

	public function index() //listing
	{
		$sql = "SELECT * FROM tbl_user";
		$list = $this->select($sql);
		return $list;
	}
	public function edit()
	{
		$this->password=md5($this->password);
		$sql = "UPDATE tbl_user SET name='$this->name',username='$this->username', password='$this->password', email='$this->email', status='$this->status' WHERE id='$this->id'";
		//print_r($sql);
		$result = $this->update($sql);
		if($result){
			$_SESSION['success_message'] = "User Updated successfully";
			//header('location:list_category.php');
			redirect('list_user.php');
		}else{
			return false;
		}
		
	}
	public function remove()
	{
		$sql = "DELETE FROM tbl_user where id='$this->id'";
		$this->delete($sql);
		redirect('list_user.php');
	}

	public function selectUserByID(){
		$sql = "SELECT * FROM tbl_user WHERE id='$this->id' ";
		$list = $this->select($sql);
		return $list;
	}

}


?>