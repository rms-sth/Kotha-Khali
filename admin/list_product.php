<?php
$title = "List Category";
require_once "header.php";
require_once "class/product.class.php";
$product = new Product();
$product_list = $product->index();
//$prd = "SELECT product_name, price FROM tbl_product";
//print_r($product_list);
//echo "<pre>";

require_once "fuse/fusioncharts.php";

   $hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "db_kotha";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if ($dbhandle->connect_error) {
      exit("There was an error with your connection: ".$dbhandle->connect_error);
   }


?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List Product</h1>
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
                            List of All Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                            <?php
                            @session_start();
                            if(isset($_SESSION['success_message'])){
                                echo "<div class='alert alert-success'>" . $_SESSION['success_message']. "</div>";
                            }
                            unset($_SESSION['success_message']);

                            ?>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Category Name</th>
                                        <th>Manufacturer</th>
                                        <th>Price</th>
                                        <th>Created Date</th>
                                        <th>Modified Date</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                          
                                <tbody>
                                    <?php $i = 1;
                                    //echo "<pre>";
                                    //print_r($catlist)
                                    foreach($product_list as $cat){
                                    ?>
                                    <tr class="odd gradeX">
                            
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $cat['product_name']; ?></td>
                                        <td><?php echo $cat['name']; ?></td>
                                        <td><?php echo $cat['manufacturer']; ?></td>
                                        <td><?php echo $cat['price']; ?></td>
                                        <td><?php echo $cat['created_date']; ?></td>
                                        <td><?php echo $cat['modified_date']; ?></td>
                                        <td><a href="edit_product.php?id=<?php echo $cat['id'] ?> ">Edit</a> / <a href="delete_product.php?id=<?php echo $cat['id']?>" onclick="return confirm('Do you really want to delete this record?')">Delete</a></td>   
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

 <?php

         // Form the SQL query that returns the top 10 most populous countries
         $strQuery = "SELECT product_name, SUM(price) as price FROM tbl_product GROUP BY product_name ORDER BY price desc ";

         // Execute the query, or else return the error message.
         $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

         // If the query returns a valid response, prepare the JSON string
         if ($result) {
            // The `$arrData` array holds the chart attributes and data
            $arrData = array(
                "chart" => array(
                  "caption" => "Total price of product",
                  "showValues" => "0",
                  "theme" => "zune",
                  "xAxisname"=>"Product Name",
                  "yAxisname"=>"Product Prices"
                  )
               );

            $arrData["data"] = array();

    // Push the data into the array
            while($row = mysqli_fetch_array($result)) {
               array_push($arrData["data"], array(
                  "label" => $row["product_name"],
                  "value" => $row["price"]
                  )
               );
            }

            /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

            $jsonEncodedData = json_encode($arrData);

    /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

            $columnChart = new FusionCharts("column2D", "myFirstChart" , 800, 500, "chart-1", "json", $jsonEncodedData);

            // Render the chart
            $columnChart->render();

            // Close the database connection
            $dbhandle->close();
        }

      ?>

      <center><div id="chart-1" ><!-- Fusion Charts will render here--></div></center><br>

<?php require_once "footer.php"; ?>