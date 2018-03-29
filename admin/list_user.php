<?php 
 $title = "List User";
 require_once "header.php"; 
 require_once "header.php"; 
 require_once "class/user.class.php";
 $us = new User();
$uslist = $us->index();

?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List of all Doctor</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List all Doctor
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <?php 
                            @session_start();
                            if(isset($_SESSION['success_message'])){
                                echo "<div class = 'alert alert-success'>" .$_SESSION['success_message'] ."</div>";
                                unset($_SESSION['success_message']);
                            } ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Username</th>                     
                                        <th>Email Address</th>
                                        <th>Status</th>
                                        <!-- <th>Created by</th>
                                        <th>Modified by</th>
                                        <th>Created date</th>
                                        <th>Modififed date</th> -->
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; foreach($uslist as $us){ ?>
                                     <tr class="odd gradeX">
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $us['name'] ?></td>
                                        <td><?php echo $us['username'] ?></td>
                                        <td><?php echo $us['email'] ?></td>

                                        <!-- <td><?php echo $us['created_by'] ?></td>
                                        <td><?php echo $us['modified_by'] ?></td>
                                        <td><?php echo $us['created_date'] ?></td>
                                        <td><?php echo $us['modified_date'] ?></td> -->
                                        
                                        <td class="center">
                                            <?php if ($us['status'] == 1) {
                                               echo "<span class='bg bg-success'>Active</span>";
                                            } else {
                                                echo "<span class='bg bg-danger'>De Active</span>";
                                                } ?>
                                        </td>
                                        
                                        <td class="center"><a href="delete_user.php?id=<?php echo $us['id'] ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete ?')"><i class="fa fa-trash"></i> Delete</a>
                                        <a href="edit_user.php?id=<?php echo $us['id'] ?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a></td>   
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <?php require_once "footer.php" ?>