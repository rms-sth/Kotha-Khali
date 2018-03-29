<?php 
$title ="Rooms Available";
require_once "header.php"; 
// require_once "admin/class/room.class.php";
//$room = new Room();
//$all_room = $room->index();

$conn = new mysqli('localhost','root','','db_khali');
if($conn->connect_errno != 0){
    die("Database Connection error!!");
}        
$sql = "SELECT COUNT(room_id) FROM tbl_room";
$res = $conn->query($sql);
$row = mysqli_fetch_row($res);




$rows = $row[0];
$page_rows = 6;
$last = ceil($rows/$page_rows);

if($last < 1){
    $last = 1;
}

$pagenum = 1;
if(isset($_GET['page'])){
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['page']);
}
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}

$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
$sql3 = "SELECT * FROM tbl_room $limit";
$result = $conn->query($sql3);
// print_r($result);

$textline1 = "Results : (<b>$rows</b>)";
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

$paginationCtrls = '';
if($last != 1){
    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> &nbsp; &nbsp; ';
        for($i = $pagenum-4; $i < $pagenum; $i++){
            if($i > 0){
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp; ';
            }
        }
    }
    $paginationCtrls .= ''.$pagenum.' &nbsp; ';
    for($i = $pagenum+1; $i <= $last; $i++){
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp; ';
        if($i >= $pagenum+4){
            break;
        }
    }
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '<li> &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'"><i class="fa fa-angle-right" aria-hidden="true"></i></li></a> ';
    }
}

$data = [];
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
}


?>

        <!-- BREADCRUMBS AREA START -->
        <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs">
                           
                            <ul class="breadcrumbs-list">
                                <li><a href="index.html">Home</a></li>
                                <li>Room</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS AREA END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            
            <!-- FEATURED FLAT AREA START -->
            <div class="featured-flat-area pt-115 pb-60">
                <div class="container">
                    <div class="featured-flat">
                        <div class="row">

                            <!-- flat-item -->
                            
                                <h2><?php echo $textline1; ?> rooms available</h2>
                            
                             <?php $i = 1; foreach($data as $app){ ?>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                               
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <span class="for-sale"><?php if($app['status']==1){ 
                                                        echo"Available";
                                                    }else{ 
                                                        echo "Unavailable";
                                                    } ?></span></span>
                                        <a href="properties-details.html"><img src="images/room_images/<?php echo $app['images']; ?>" alt="" width="365px" height="235px"></a>
                                        <div class="flat-link">
                                            <a href="properties-details.html">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <img src="images/icons/4.png" alt="">
                                                <span>
                                                    <?php if($app['status']==1){ 
                                                        echo"Available";
                                                    }else{ 
                                                        echo "Unavailable";
                                                    } ?></span>
                                            </li>
                                            <li>
                                                <img src="images/icons/5.png" alt="">
                                                <span><?php echo $app['no_of_rooms']; ?></span>
                                            </li>
                                            <li>
                                                <img src="images/icons/6.png" alt="">
                                                <span>3</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="flat-item-info">
                                        <div class="flat-title-price">
                                            <h5><a href="properties-details.html"><?php echo $app['location']; ?></a></h5>
                                            <span class="price"><?php
                                            $price = $app['price']; 
                                            require_once "admin/class/currency.class.php";
                                            $currency = new Currency();
                                            $x=$currency->numberToCurrency($price);
                                            print_r($x);
                                             ?></span>
                                        </div>
                                        <div>
                                            <p>Expiry Date: <?php echo $app['expiry_date'] ;
                                            $now = time(); // or your date as well
                                            $your_date = strtotime($app['expiry_date']) ;
                                            $datediff =  $your_date-$now;
                                            $remaining_days =round($datediff / (60 * 60 * 24));
                                            if ($remaining_days>0) {
                                                echo "<span class='p-3 mb-2 text-info'>" ."&nbsp;(" .$remaining_days ." days remaining)" ."</span>";
                                            }else{
                                                echo "<span class='text-danger'>&nbsp; (Expired!!!)</span>";
                                            }
                                            ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- pagination-area -->
                            <div class="col-xs-12">
                                <div class="pagination-area mb-60">
                                    <ul class="pagination-list text-center">
                                        
                                     <?php echo $paginationCtrls; ?>
                                        <p><?php echo $textline2; ?></p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FEATURED FLAT AREA END -->
            
            <!-- SUBSCRIBE AREA START -->
            <div class="subscribe-area bg-blue call-to-bg plr-140 ptb-50">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="section-title text-white">
                                <h3>SUBSCRIBE</h3>
                                <h2 class="h1">NEWSLETTER</h2>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                            <div class="subscribe">
                                <form action="#">
                                    <input type="text" name="subscribe" placeholder="Enter yur email here...">
                                    <button type="submit" value="send">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SUBSCRIBE AREA END -->
        </section>
        <!-- End page content -->


<?php require_once "footer.php"; ?>