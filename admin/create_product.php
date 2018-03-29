<?php
$title = "Create Product";
require_once "header.php";
require_once "class/product.class.php";
require_once "class/category.class.php";

$category = new Category();
$allcat = $category->index();

if (isset($_POST['btnProduct'])){
    $product = new Product();
    $product->set('product_name', $_POST['product_name']);
    $product->set('category_id', $_POST['category_id']);
    $product->set('manufacturer', $_POST['manufacturer']);
    $product->set('status', $_POST['status']);
    $product->set('price', $_POST['price']);
    $product->set('created_date', date('Y-m-d H:i:s'));
    $product->set('modified_date', date('Y-m-d H:i:s'));
    print_r($category);
    $status = $product->save();
    
    

}

 ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product Management</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                        <?php 
                                        if (isset($status) && $status == false){
                                            echo "<div class='alert alert-danger'> Cannot insert Product data!! </div> ";
                                        }
                                    ?>
                                    <form role="form" name="productform" action="" method="post">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="form-control" name="product_name">
                                            <p class="help-block" >Example: Shoes, Clock, laptop etc.</p>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Category Type</label>
                                            <select class="form-control" placeholder="Enter category type E.g. clothes, electronics, foods, automobiles etc." name="category_id">
                                                <option>Select Category</option>
                                                <?php 
                                                foreach($allcat as $cat){?>
                                                <option value="<?php echo $cat['id'];?>"><?php echo $cat['name']; ?></option>
                                                <?php }?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Manufacturer</label>
                                            <input class="form-control" placeholder="Enter Manufacturer name" name="manufacturer">
                                        </div>
                                         <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" placeholder="Enter price of product" name="price">
                                        </div>
      
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="" value="1" checked>Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="" value="0">De-Active
                                                </label>
                                            </div>
                                           
                                        </div>
                                       
                                       
                                        
                                        <button type="submit" class="btn btn-success" name="btnProduct"><i class="fa fa-save"></i> Save </button>
                                        <button type="reset" class="btn btn-danger" >Reset </button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->


   <?php require_once "footer.php" ?>