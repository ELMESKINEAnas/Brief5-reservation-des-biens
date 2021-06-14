<?php
require_once "../Model/connect.class.php";


class Booking extends hotelDatabase
{

    public function bookAccom($details, $cart)
    {

        $stmt_booking = $this->connect()->prepare("INSERT INTO booking (checkIn, checkOut, idCustomer) VALUES(?,?,?)");
        $stmt_booking->bindParam(1, $details[1]);
        $stmt_booking->bindParam(2, $details[2]);
        $stmt_booking->bindParam(3, $details[3]);

        $stmt_booking->execute();

        //get the last inserted id
        $stmt_id_booking = $this->connect()->prepare("SELECT idBooking FROM booking ORDER BY idBooking DESC LIMIT 1");
        $stmt_id_booking->execute();

        $idnewBooking = $stmt_id_booking->fetchColumn();

        for ($i = 0; $i < $details[0]; $i++) {


            $stmt_cart = $this->connect()->prepare("INSERT INTO cart (idBooking, idAccom, idboard) VALUES(?,?,?)");
            $stmt_cart->bindParam(1, $idnewBooking);
            $stmt_cart->bindParam(2, $cart[$i][0]);
            $stmt_cart->bindParam(3, $cart[$i][1]);
            $stmt_cart->execute();
        }
        return $idnewBooking;
    }

public function SelectPrice($idBooking)
    {

        $stmt_select_accom = $this->connect()->prepare("SELECT SUM(accommodation.accomPrice) FROM accommodation INNER JOIN cart ON accommodation.idAccom = cart.idAccom AND cart.idBooking = ?");
        $stmt_select_accom->bindParam(1, $idBooking);
        $stmt_select_accom->execute();

        $row = $stmt_select_accom->fetch(PDO::FETCH_ASSOC);
        $accomPrice = $row['SUM(accommodation.accomPrice)'];

        $stmt_select_board = $this->connect()->prepare("SELECT SUM(board.boardPrice) FROM board INNER JOIN cart ON board.idBoard = cart.idboard AND cart.idBooking = ?");
        $stmt_select_board->bindParam(1, $idBooking);
        $stmt_select_board->execute();

        $row = $stmt_select_board->fetch(PDO::FETCH_ASSOC);
        $boardPrice = $row['SUM(board.boardPrice)'];

        $stmt_select_children = $this->connect()->prepare("SELECT SUM(childopt.optPrice) FROM childopt INNER JOIN children ON children.childOpt = childopt.idChildOpt AND children.idBooking = ?");
        $stmt_select_children->bindParam(1, $idBooking);
        $stmt_select_children->execute();

        $row = $stmt_select_children->fetch(PDO::FETCH_ASSOC);
        $childOptPrice = $row['SUM(childopt.optPrice)'];

        $prices = array($accomPrice, $boardPrice, $childOptPrice);

        return ($prices);
    }

    public function insertPrice($idBooking, $totalPrice)
    {

        $stmt_insert_price = $this->connect()->prepare("UPDATE booking SET totalPrice = ? WHERE idBooking = ?");
        $stmt_insert_price->bindParam(1, $totalPrice);
        $stmt_insert_price->bindParam(2, $idBooking);
        $stmt_insert_price->execute();
    }
}



    // }

