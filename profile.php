<?php 
$title = "Profile Page";
require_once "header.php";
require_once "admin/class/profile.class.php";
require_once "admin/class/room.class.php";

$profile = new Profile();
$user_profile=$profile->index();
if (isset($_GET['reg_id'])) {
    $profile->reg_id = $_GET['reg_id'];
    $profilelist=$profile->SelectUserById();
        // echo "<pre>";
        // print_r($profilelist);
        // echo "</pre>";

}


$room = new Room();

if (isset($_GET['reg_id'])) {
    $room->reg_id=$_GET['reg_id'];
    $room_info=$room->profile();
        // echo "<pre>";
        // print_r($room_info);
        // echo "</pre>";

}


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        h4,h5{
            font-family: courier;
            
        }
        strong{
            color: green;
        }
    </style>
    

</head>
<body>
    


     <div class="row">
        
    </div>
<br>
    <div class="row">

   <?php if(isset($profilelist) && !empty($profilelist)) {?>
   <div class="col-md-offset-4 col-md-8 col-xs-8">
    <img class="img-circle" src="images/profile/<?php 
    if(isset($profilelist[0]['profile_picture']) && !empty($profilelist[0]['profile_picture'])){
        echo $profilelist[0]['profile_picture'];
    }else{
        echo "profile_default.png";
    }
    ?>" width="500px" height="500px" alt=""><br> <br>
    <h4><strong>Name:</strong><?php echo  $profilelist[0]['first_name'] ." ".$profilelist[0]['middle_name'] ." " .$profilelist[0]['last_name']; ?></h4>
    <h4><strong>User Id:</strong><?php echo $profilelist[0]['reg_id']; ?></h4>
    <h4><strong>Username:</strong><?php echo $profilelist[0]['username']; ?></h4>
    <h4><strong>Location:</strong><?php echo $profilelist[0]['location']; ?></h4>
    <h4><strong>Contact:</strong><?php echo $profilelist[0]['phone']; ?></h4>
    <h4><strong>Email:</strong><?php echo $profilelist[0]['email']; ?></h4>
    <h4><strong>Member since:</strong></h4> 
   
    <div>
            
           <h4><strong>Room ID:</strong> <?php echo $room_info[$profile->reg_id]['room_id'] ."</span>" ."<strong> => Posted Date: </strong>" .$room_info[$profile->reg_id]['created_date'] ." <strong>=> Expiry Date: </strong>" .$room_info[$profile->reg_id]['expiry_date']; ?>
           <?php }else{ ?>
            <center>
              <h1 class="text-danger">404 Error!!</h1>
              <h1 class="text-danger">No Room found !!! </h1>
              <h1 class="text-danger">Please select the correct Rooom ID </h1>
            </center>
           
         <?php } ?></h4>
        </div>
   
    </div>
    </div>
</div>
</div>
</body>
</html>




<?php require_once "footer.php"; ?>