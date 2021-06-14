<?php
require_once "../Model/connect.class.php";

class Children extends hotelDatabase
{
    public function insertChild($nmbr, $idBooking, $children)
    {
    
        for ($i = 0; $i < $nmbr; $i++) {
            $stmt_childOpt = $this->connect()->prepare("INSERT INTO children (childAge,childOpt,idBooking) VALUES(?,?,?)");
            $stmt_childOpt->bindParam(1, $children[$i][0]);
            $stmt_childOpt->bindParam(2, $children[$i][1]);
            $stmt_childOpt->bindParam(3, $idBooking);
            $stmt_childOpt->execute();
        }
    }
}
