<?php

require_once "common.php";

class Product extends Common{
	public $id, $product_name, $category_id, $manufacturer, $status, $price, $created_date, $modified_date;

	public function save(){
		$sql = "INSERT INTO tbl_product(product_name, category_id, manufacturer, status, price, created_date) values('$this->product_name', '$this->category_id', '$this->manufacturer', '$this->status', '$this->price', '$this->created_date')";
		//echo "$sql";

		$result = $this->insert($sql);
		if($result){
			$_SESSION['success_message'] = "Product inserted successfully with $result";
			//redirect("list_product.php");
		}else{
			return false;
		}



	}
	public function index(){
		$sql = "select p.*, c.name from tbl_product as p join tbl_category as c on c.id=p.category_id";
		$list = $this->select($sql);
		return $list;
	}
	public function edit(){

	}
	public function remove(){

	}
}


?>