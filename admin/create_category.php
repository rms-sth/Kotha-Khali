<?php

require_once "class/category.class.php";
$title = "Create Category";
require_once "header.php"; 

if (isset($_POST['btnSave'])){
    $category = new Category();
    $category->set('name', $_POST['name']);
    $category->set('rank', $_POST['rank']);
    $category->set('status', $_POST['status']);
    $category->set('created_date', date('Y-m-d H:i:s'));
    $category->set('modified_date', date('Y-m-d H:i:s'));
    //print_r($category);
    $status = $category->save();
    
    

}

?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category Management</h1>
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
                            Create Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                     <?php 
                                        if (isset($status) && $status == false){
                                            echo "<div class='alert alert-danger'> Cannot insert Data!! </div> ";
                                        }
                                    ?>
                                    <form role="form" id="categoryform" action="" method="post" novalidate="">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input class="form-control" name="name" required="">
                                            <p class="help-block">Example: clothes, electronics etc</p>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Rank</label>
                                            <input class="form-control" placeholder="Enter rank" required="" name="rank" type="number">
                                        </div>
                                        
                                       
                                      
                                       
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="" value="1">Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="" value="0" checked>De-Active
                                                </label>
                                            </div>
                                           
                                        </div>
                                       
                                       
                                        
                                        <button type="submit" class="btn btn-success" name="btnSave"><i class="fa fa-save"></i> Save </button>
                                        <button type="reset" class="btn btn-danger">Reset </button>
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