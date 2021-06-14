<?php
include "../Controller/login.controller.php";

$signIn = new sign();
$signIn->creerCompte();
$signIn->authenticate();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel='stylesheet' type='text/css' media='screen' href='login.css'>

  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <title>Document</title>
</head>

<body>
  <script>
    function signIn() {
      if (document.getElementById('sign-in-click').click = true) {
        document.getElementById('sign-up').style.display = "none";
        document.getElementById('sign-in').style.display = "block";
      }
    }

    function signUp() {
      if (document.getElementById('sign-up-click').click = true) {
        document.getElementById('sign-in').style.display = "none";
        document.getElementById('sign-up').style.display = "block";
      }
    }
  </script>

  <section>
    <form method="POST">
      </div>
      <div id="sign-in" class='container'>
        <div class='window'>
          <div class='overlay'></div>
          <div class='content'>
            <div class='welcome'>Hello There!</div>
            <div class='subtitle'>We're almost done. Before using our services you need to login to your account.</div>
            <div class='input-fields'>
              <input type='email' name="sign-in-email" placeholder='Email' class='input-line full-width'></input>
              <input type='password' name="sign-in-password" placeholder='Password' class='input-line full-width'></input>
            </div>
            <div><button name="sign-in" type="submit" class='ghost-round btn btn--radius-2 btn--blue full-width'>login</button></div>
            <p>Not a member?<a id="sign-up-click" onclick="signUp()"> Register now!</a> </p>
          </div>
        </div>
      </div>
    <!-- </form> -->
    <!-- fffffffffffffffffffffffffffffffffffffffffffffffffff -->
    <!-- <form class="container" method="POST"> -->
      <div id="sign-up" style="display:none;" class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
          <div class="card card-4">
            <div class="card-body">
              <h2 class="title">Registration Form</h2>
              <form method="POST">
                <div class="row row-space">
                  <div class="col-2">
                    <div class="input-group">
                      <label class="label">first name</label>
                      <input class="input--style-4" type="text" name="first-name">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group">
                      <label class="label">last name</label>
                      <input class="input--style-4" type="text" name="last-name">
                    </div>
                  </div>
                </div>
                <div class="row row-space">
                  <div class="col-2">
                    <div class="input-group">
                      <label class="label">Email</label>
                      <input class="input--style-4" type="email" name="email">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group">
                      <label class="label">Password</label>
                      <input class="input--style-4" type="password" name="password">
                    </div>
                  </div>
                </div>
                <div class="p-t-15">
                  <button name="sign-up" class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                </div>
                <a id="sign-in-click" onclick="signIn()">Already a member</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</body>

</html>