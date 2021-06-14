<?php

include "../Model/connect.class.php";

class Customer
{

    public function signUp($email, $password, $user, $firstName, $lastName)
    {

        $db = new hotelDatabase;
        $con = $db->connect();

        $stmt_email = $con->prepare("SELECT * FROM visitor WHERE email=?");
        $stmt_email->bindParam(1, $email);
        $stmt_email->execute();

        //Fetch the row / result.
        $count = $stmt_email->rowCount();

        //If num is bigger than 0, the email already exists
        if ($count > 0) {
            // echo 'Row exists!';
        } else {

            $stmt_visitor = $con->prepare("INSERT INTO visitor (email, passcode, accType) VALUES(?,?,?)");
            $stmt_visitor->bindParam(1, $email);
            $stmt_visitor->bindParam(2, $password);
            $stmt_visitor->bindParam(3, $user);
            $stmt_visitor->execute();

            $idVisitor = $con->lastInsertId();


            $stmt_customer = $con->prepare("INSERT INTO customer (firstName, lastName, idCustomer) VALUES(?,?,?)");
            $stmt_customer->bindParam(1, $firstName);
            $stmt_customer->bindParam(2, $lastName);
            $stmt_customer->bindParam(3, $idVisitor);
            $stmt_customer->execute();
        }
    }

    public function signIn($email)
    {
        $db = new hotelDatabase;
        $con = $db->connect();

        $stmt_select = $con->prepare("SELECT * FROM visitor WHERE email=?");
        $stmt_select->bindParam(1, $email);
        $stmt_select->execute();

        $count = $stmt_select->rowCount();
        $resul = $stmt_select->fetch(PDO::FETCH_ASSOC);

        if ($count == 1 && !empty($resul)) {
            return $resul;
        } else {
            return false;
        }
    }
}