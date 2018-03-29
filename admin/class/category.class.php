<?php

require_once "common.php";

class Category extends Common{
	public $id, $name, $rank, $status, $created_date, $modified_date;

	public function save(){
		$sql = "INSERT INTO tbl_category(name, rank, status, created_date) values('$this->name', '$this->rank', '$this->status' ,'$this->created_date')";
		//echo "$sql";

		$result = $this->insert($sql);
		if($result){
			$_SESSION['success_message'] = "Category inserted successfully with $result";
			redirect("list_category.php");
		}else{
			return false;
		}



	}
	public function index(){
		$sql = "select * from tbl_category";
		$list = $this->select($sql);
		return $list;

	}
	public function edit(){

	}
	public function remove(){

	}
}


?>