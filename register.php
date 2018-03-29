<?php
$title = "Register Form";
require_once "header.php"; ?>

        <!-- BREADCRUMBS AREA START -->
        <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs">
                           
                            <ul class="breadcrumbs-list">
                                <li><a href="index.html">Home</a></li>
                                <li>Register</li>
                            </ul>
                        </div>
                    </div>

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

                <!-- new-customers -->
                <div class="col-md-12 col-xs-12">
                    <div class="new-customers mb-50">
                        <form action="#">

                            <div class="login-account p-30 box-shadow">
                                <div class="row">
                                    
                                        <h2 class="col-md-offset-2 mb-50">REGISTRATION FORM</h2>

                                        
                                        <div class="col-md-offset-3 col-sm-6">
                                            <label>First Name:</label><input type="text" placeholder="First Name">
                                        </div>
                                        <div class="col-sm-12"></div>
                                        
                                        <div class="col-md-offset-3 col-sm-6">
                                             <label>Middle Name:</label><input type="text"  placeholder="Middle Name">
                                        </div>
                                        <div class="col-sm-12"></div>
                                        
                                        <div class="col-md-offset-3 col-sm-6">
                                             <label>Last Name:</label><input type="text"  placeholder="Last Name">
                                        </div>
                                        <div class="col-sm-12"></div>
                                        
                                        <div class="col-sm-12">
                                            <h5 class="col-md-offset-3 col-sm-6">Select one of the option</h5>
                                        </div>

                                        <div class="col-md-offset-3 col-sm-6">
                                            <select class="custom-select-2">
                                                <option value="defalt">Gharbeti?</option>
                                                <option value="c-1">Bhadedar?</option>  
                                            </select>
                                        </div>
                                        <div class="col-sm-12"></div>
                                        
                                        <div class="col-sm-12">
                                            <h5 class="col-md-offset-3 col-sm-6">Select your location</h5>
                                        </div>
                                        <div class="col-md-offset-3 col-sm-6">
                                            <select class="custom-select-2">
                                                <option value="defalt">Location</option>
                                                <option value="c-1">Melbourne</option>
                                                <option value="c-2">Dhaka</option>
                                                <option value="c-3">New York</option>
                                                <option value="c-4">London</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12"></div>
                                        
                                        <div class="col-md-offset-3 col-sm-6">
                                             <label>Phone Number:</label><input type="text"  placeholder="Phone">
                                        </div>
                                        <div class="col-sm-12"></div>

                                        <div class="col-md-offset-3 col-sm-6">
                                             <label>Email Address:</label><input type="text"  placeholder="Email">
                                        </div>
                                        <div class="col-sm-12"></div>

                                        <div class="col-md-offset-3 col-sm-6">
                                             <label>Username:</label><input type="text"  placeholder="Username">
                                        </div>
                                        <div class="col-sm-12"></div>

                                        <div class="col-md-offset-3 col-sm-6">
                                             <label>Password:</label><input type="text"  placeholder="Password">
                                        </div>
                                        <div class="col-sm-12"></div>

                                        <div class="col-md-offset-3 col-sm-6">
                                             <label>Confirm Password:</label><input type="text"  placeholder="Confirm Password">
                                        </div>
                                        <div class="col-sm-12"></div>

                                        <div class="col-md-offset-3 col-sm-6">
                                            <label>
                                                Please Select your Profle Picture 
                                            </label>
                                            <input type="file">
                                        </div>
                                        <div class="col-sm-12"></div>
                                    </div>

                                    <div class="checkbox">
                                        <label class="col-md-offset-4 mr-10"> 
                                            <small>
                                                <input type="checkbox" name="signup">Sign up for our newsletter!
                                            </small>
                                        </label>
                                        <label> 
                                            <small>
                                                <input type="checkbox" name="signup">Receive special offers from our partners!
                                            </small>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-4 col-sm-2 col-xs-4">

                                            <button class="submit-btn-1 mt-20" type="submit" value="register">Register</button>
                                        </div>
                                        <div class="col-sm-2 col-xs-4">
                                            <button class="submit-btn-1 mt-20 f-right" type="reset">Clear</button>
                                        </div>
                                    </div>
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