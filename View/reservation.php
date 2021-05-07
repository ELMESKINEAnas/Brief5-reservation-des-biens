<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reservation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    

    <title>Hello, world!</title>
</head>

<body>

<?php
require_once '..Model/connect.php'

    $user = '';
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        echo $user->firstname;
    }else{
        header('location: ../View/login.php');
    }
?>


<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p>
            <input type="submit" name="" value="Login" /><br />
        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Hirer</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Apply as a Employee</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
                            </div>
                            <div class="form-group">
                                <div class="maxl">
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="male" checked>
                                        <span> Male </span>
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="female">
                                        <span>Female </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control"
                                    placeholder="Your Phone *" value="" />
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option class="hidden" selected disabled>Please select your Sequrity Question
                                    </option>
                                    <option>What is your Birthdate?</option>
                                    <option>What is Your old Phone Number</option>
                                    <option>What is your Pet Name?</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Your Answer *" value="" />
                            </div>
                            <input type="submit" class="btnRegister" value="Register" />
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3 class="register-heading">Apply as a Hirer</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" maxlength="10" minlength="10" class="form-control"
                                    placeholder="Phone *" value="" />
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option class="hidden" selected disabled>Please select your Sequrity Question
                                    </option>
                                    <option>What is your Birthdate?</option>
                                    <option>What is Your old Phone Number</option>
                                    <option>What is your Pet Name?</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="`Answer *" value="" />
                            </div>
                            <input type="submit" class="btnRegister" value="Register" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    
    <!-- Footer -->
    <!-- <footer class="nb-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="about">
    
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque, rem odio recusandae dolor sequi
                            distinctio consectetur autem facilis animi est nobis suscipit, beatae atque sunt eos ipsam
                            inventore harum excepturi tempore repellat cupiditate. Voluptas quae aliquid commodi dignissimos
                            laboriosam voluptatibus!</p>
    
                        <div class="social-media">
                            <ul class=" list-inline">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-3 col-sm-6">
                    <div class="footer-info-single">
                        <h2 class="title">Help Center</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                    How to Pay</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                    FAQ's</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                    Sitemap</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                    Delivery Info</a></li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-md-3 col-sm-6">
                    <div class="footer-info-single">
                        <h2 class="title">Customer information</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" <i class="fa fa-angle-double-right"></i>
                                    About Us</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                    FAQ's</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                    Sell Your Items</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                    Contact Us</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                    RSS</a></li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-md-3 col-sm-6">
                    <div class="footer-info-single">
                        <h2 class="title">Security & privacy</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                    Terms Of Use</a></li>
                            <li><a href="#><i class=" fa fa-angle-double-right"></i>
                                    Privacy Policy</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                    Return / Refund Policy</a></li>
                            <li><a href="#><i class=" fa fa-angle-double-right"></i>
                                    Store Locations</a></li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-md-3 col-sm-6">
                    <div class="footer-info-single">
                        <h2 class="title">Payment</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium sunt velit veniam quos
                            perspiciatis soluta voluptate aspernatur iure quis deleniti!
                        </p>
    
                    </div>
                </div>
            </div>
        </div>
    
        <section class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Copyright © 2021. Resort Hotel.</p>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </section>
    </footer> -->

    <!-- jQuery-->
    <script src="../js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap min js -->
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>