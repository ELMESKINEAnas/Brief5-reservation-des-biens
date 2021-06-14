<?php
require_once "../Controller/booking.class.php";
// session_start();
$obj = new BookNow;
$obj->book();
$va = $obj->book();

echo "<script>alert('Le montant est :'+$va);</script>";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- SASS -->
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->

    <!-- CSS -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <title>Booking</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" style="padding:0;">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form class="d-flex">
                    <button class="btn btn-warning" type="submit"><a href="../Controller/logout.class.php">Logout</a></button>
            </div>
            </form>
        </div>
        </div>
    </nav>

    <section class="form-section">

        <div class="booking-container">
            <div class="form-steps">
                <div class="step" id="step1"></div>
                <div class="step" id="step2"></div>
                <div class="step" id="step3"></div>
            </div>
            <form id="booking-form" method="POST">
                <div id="form-sec-1" class="form-sec">
                    <div>
                        <label for="">Check In</label>
                        <input type="date" class="booking-input" name="checkIn">
                    </div>
                    <div>
                        <label for="">Check Out</label>
                        <input type="date" class="booking-input" name="checkOut">
                    </div>

                    <div class="accom-opts">
                        <label class="checkOpt">
                            <input class="check" value="Apartment" type="checkbox">Apartment
                        </label>

                        <label class="checkOpt">
                            <input class="check" value="Bungalow" type="checkbox">Bungalow
                        </label>

                        <label class="checkOpt">
                            <input class="check" value="Single Room" type="checkbox">Single
                            Room
                        </label>

                        <label class="checkOpt">
                            <input class="check" value="Double Room" type="checkbox">Double
                            Room
                        </label>
                    </div>

                    <button id="first-page" class="booking-btn" type="button">Next</button>

                </div>

                <div id="form-sec-2">
                    <div id="accom-num" class="form-sec"></div>
                    <div id="accom-cond">
                        <div id="s-rooms"></div>
                        <div id="d-rooms"></div>
                        <div class="form-btns">
                            <button id="" class="booking-btn prev" type="button">Previous</button>
                            <button id="scnd-page" class="booking-btn" type="button">Next</button>
                        </div>
                    </div>
                </div>

                <div id="form-sec-3" class="form-sec">
                    <div id="children-ages"></div>
                </div>
                <div class="form-btns">
                    <button id="" class="booking-btn prev" type="button">Previous</button>
                    <button id="scnd-page" class="booking-btn" type="submit" name="book">Book Now</button>
                </div>
                <?php

                // function function_alert($va)
                // {
                //     echo "<script type='text/javascript'>alert('$va');</script>";
                // }
                ?>
            </form>
        </div>

    </section>

</body>
<script src="js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap min js -->
<script src="js/bootstrap.min.js"></script>
<script src="js/nav.js"></script>

<script src="booking.js"></script>