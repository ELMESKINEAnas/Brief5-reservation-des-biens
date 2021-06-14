<?php
include "../Model/customer.class.php";

class sign
{
    private $user_type;
    private $firstName;
    private $lastName;
    private $idVisitor;
    private $hashedPass;
    public function creerCompte()
    {
        $signUp = new Customer();


        if (isset($_POST['sign-up'])) {

            $this->user_type = "Customer";
            $this->email = $_POST['email'];
            $this->passcode = $_POST['password'];
            $this->firstName = $_POST['first-name'];
            $this->lastName = $_POST['last-name'];
            $this->hashedPass = password_hash($this->passcode, PASSWORD_DEFAULT);
            // var_dump($_POST);
            $signUp->signUp($this->email, $this->hashedPass, $this->user_type, $this->firstName, $this->lastName);
        }
    }



    public function authenticate()
    {
        $sauthentifier = new Customer();


        if (isset($_POST['sign-in'])) {
            session_start();
            $this->email = $_POST['sign-in-email'];
            $this->passcode = $_POST['sign-in-password'];
            $sauthentifier->signIn($this->email);

            $resul = $sauthentifier->signIn($this->email);
            if (!$resul) {
                echo ('please enter correct email & password');
            } else {

                $id = $resul['idVisitor'];
                $input_email = $resul['email'];
                $pass = $resul['passcode'];
                $type = $resul['accType'];
                $_SESSION['idUser'] = $id;

                if (password_verify(
                    $this->passcode,
                    $pass
                )) {
                    header("Location:../View/booking.php");
                } else {
                    echo ('incorrect password');
                }
            }
            return $_SESSION['idUser'];
        }
    }
}
