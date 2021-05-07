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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <style>
            .banner-image {
                background-image: url(../img/facade.jpg);
                background-size: cover;
        
            }
        
            .link {
                font-size: .875rem;
                color: #6582B0;
            }
        </style>

    <title>Hello, world!</title>
</head>

<body>
<?php

      // include '../model/model.php';
      // $model = new Model();
      // $insert = $model->insert();
      
      include '../Controller/controller.php';
      $controllers = new controllers();
      $controllers->Autonfication();

 ?>


    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center ">
        <section class="intro pt-4">
            <div class="mask d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 mx-auto ">
                            <div class="card" style="border-radius: 1rem;">
                                <div class="card-body p-5">
    
                                    <h1 class="mb-5 text-center">Connectez-vous pour profiter des tarifs réservés aux
                                        membres</h1>
    
                                    <form action="" method="POST" class="was-validated">
                                        <!-- 2 column grid layout with text inputs for the first and last names -->
                                        <div class="row">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <input type="email" name="email" id="email"  class="form-control is-invalid" id="validationTextarea"
                                                    placeholder="Email@goldentulip.com" required />

                                                <label class="form-label" for="form6Example5">Email*</label>
                                            </div>

                                            <div class="form-outlin mb-4">
                                                <input type="pass" name="pass" id="pass"  class="form-control is-invalid"
                                                    id="validationTextarea" placeholder="password" required />
                                                <label class="form-label" for="form6Example1">Mot de passe *</label>

                                            </div>

                                            <p><a href="#" class="link float-end">Mot de passe oublié ?</a></p>
                                            <!-- Submit button -->
                                            <button type="submit" name="login" class="btn  btn-warning btn-rounded btn-block ">Se
                                                    Connecter</button><br><br>
                                            <hr>

                                            <div class="col-4">
                                                <p><a href="View/sign-up.php" class="link ">Vous n'avez pas de Compte ?</a></p>
                                                <a href="View/index.php"><button type="button"
                                                        class="btn btn-outline-warning btn-rounded mt-2 ">Retour</button></a>
                                            </div>
                                    </form>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    



    <!-- Footer -->
    <footer class="nb-footer">
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
    </footer>
    <!-- jQuery-->
    <script src="../js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap min js -->
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>