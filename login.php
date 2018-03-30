<?php
$title = "Login Form";
require_once "header.php";
if(isset($_COOKIE['username']) && !empty($_COOKIE['username'])){
    redirect('index.php');
}
$_SESSION['error_message'] = "After login you can post rental ads!!";


?>

        <!-- BREADCRUMBS AREA START -->
        <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs">
                            
                            <ul class="breadcrumbs-list">
                                <li><a href="index.html">Home</a></li>
                                <li>Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS AREA END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- LOGIN SECTION START -->
            <div class="login-section pt-115 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-8 col-xs-12">
                            <div class="registered-customers mb-50">
                                <h5 class="mb-50">LOGIN</h5>
                                <form action="" method="post" id="login">
                                    <div class="login-account p-30 box-shadow">
                                         <?php if(isset($status) && $status == false){
                                            echo "<div class = 'alert alert-danger'>" ."Invalid Login Information!!" ."</div>";
                                        } ?>
                                        <?php 
                                        @session_start();
                                        if(isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])){
                                            echo "<div class = 'alert alert-success'>" .$_SESSION['error_message'] ."</div>";
                                            unset($_SESSION['error_message']);
                                        
                                        } ?>
                                        
                                        <?php if(isset($errUsername)){ echo "<p style='color:red'>$errUsername</p>";} ?>
                                        <input type="text" name="username" placeholder="Username">
                                        <?php if(isset($errPassword)){ echo "<p style='color:red'>$errPassword</p>";} ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <p><small><a href="#">Forgot our password?</a></small></p>
                                        <input name="remember" type="checkbox" value="Remember Me" name="remember"> Remember Me<br><br>
                                        <button class="submit-btn-1" type="submit" name = "btnLogin">login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- LOGIN SECTION END -->
            
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
