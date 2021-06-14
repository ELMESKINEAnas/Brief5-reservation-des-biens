<?php
require_once "../Model/booking.class.php";
require_once "../Model/children.class.php";
session_start();

class BookNow
{
    private $checkIn;
    private $idBooking;
    private $checkOut;
    private $nmbr;
    private $totalNmbr;
    private $accomName;
    private $accomType;
    private $roomType;
    private $view;
    private $board;
    private $halfBoard;
    private $bookingArr = array();
    private $cart = array();
    private $children = array();
    private $apartment = 1;
    private $childAge;
    private $option;
    private $idOpt;
    private $total;
    private $bungalow = 1;
    private $singleRoom = 1;
    private $doubleRoom = 1;

    public function book()
    {

        

        if (isset($_POST['book'])) {

            $this->checkIn = $_POST['checkIn'];
            $this->checkOut = $_POST['checkOut'];
            $this->idCustomer = $_SESSION['idUser'];

            // $this->cart = array_push($this->cart, 'h', 'hello');
            array_push($this->cart, $this->totalNmbr);
            array_push($this->cart, $this->checkIn);
            array_push($this->cart, $this->checkOut);
            array_push($this->cart, $this->idCustomer);

            // var_dump($_POST);
            // foreach ($_POST as $key => $entry) {
            //     print $key . ": " . $entry . "<br>";
            // }

            if ((isset($_POST['Apartment-nmbr'])) &&  ($this->apartment = 1)) {
                $this->nmbr = $_POST['Apartment-nmbr'];
                $this->accomName = "Apartment";
                $this->accomType = 1;
                $this->bookingDuplication();
                // echo ("===================> <br> " . $this->apartment);
            }

            if ((isset($_POST['Bungalow-nmbr'])) && ($this->bungalow = 1)) {
                $this->nmbr = $_POST['Bungalow-nmbr'];
                $this->accomName = "Bungalow";
                $this->accomType = 2;
                $this->bookingDuplication();
            }

            if ((isset($_POST['SingleRoom-nmbr'])) &&  $this->singleRoom = 1) {
                $this->nmbr = $_POST['SingleRoom-nmbr'];
                $this->accomName = "SingleRoom";
                // echo ($this->accomName . "<br>");
                // echo ("!!!!!!!!!!!!!!!!!!!!!! <br>");
                $this->bookingDuplication();
            }

            if ((isset($_POST['DoubleRoom-nmbr'])) && ($this->doubleRoom = 1)) {
                $this->nmbr = $_POST['DoubleRoom-nmbr'];
                $this->accomName = "DoubleRoom";
                $this->bookingDuplication();
            }
            
            $booking = new Booking;
            $this->idBooking= $booking->bookAccom($this->cart, $this->bookingArr);
            

            if (isset($_POST['Children-nmbr']) && ($_POST['Children-nmbr'] > 0)) {

                $this->totalNmbr = $_POST['Children-nmbr'];
                $this->childrenOpts();

                $childopts = new children();
                $childopts->insertChild($this->totalNmbr, $this->idBooking, $this->children);
            }

            $prices = $booking->SelectPrice($this->idBooking);
            $start_date = strtotime($this->checkIn);
            $end_date = strtotime($this->checkOut);

            $date = ($end_date - $start_date) / 60 / 60 / 24;

            $this->total = ($prices[0] + $prices[1] + $prices[2]) * $date;

            // echo ("Total" . $this->total . "<br>");

            $booking->insertPrice($this->idBooking, $this->total);


            // echo (" ||||||||||||||||||||||||||||||| $this->totalNmbr |||||||||||||||||||||||||||||||||| ");

        }
        // echo ('<pre>');
        // print_r($this->bookingArr);
        // echo ('</pre>');
        
        return ($this->total);


        
    }

    public function bookingDuplication()
    {
        $this->cart[0] += $this->nmbr;

        for ($i = 0; $i < $this->nmbr; $i++) {

            if (($this->accomName === "Apartment") || ($this->accomName === "Bungalow")) {
                $this->view = NULL;
                $this->board = NULL;
            } else {

                $this->view = $_POST[$this->accomName . '-view-' . ($i + 1)];
                $this->board = $_POST[$this->accomName . '-' . ($i + 1) . '-board'];
                // echo ($this->board);

                // echo (($this->accomName) . ($i + 1) . '-board');
                // echo ($this->board . " vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv");

                if ($this->accomName === "SingleRoom") {

                    if ($this->view === "Internal View") {
                        $this->accomType = 3;
                    } else {
                        $this->accomType = 4;
                    }
                } else if ($this->accomName === "DoubleRoom") {
                    $this->roomType = $_POST['DoubleRoom-' . ($i + 1)];

                    if ($this->roomType === "Double Bed") {

                        if ($this->view === "Internal View") {
                            $this->accomType = 5;
                        } else {
                            $this->accomType = 6;
                        }
                    } else {
                        $this->accomType = 7;
                    }
                }

                $this->board($i);
            }

            $Arr = array($this->accomType, $this->board);
            array_push($this->bookingArr, $Arr);
        }

        $this->setAttribute();
        // echo ('<pre>');
        // print_r($this->cart);
        // echo ('</pre>');
    }
    public function board($i)
    {

        if ($this->board === "Half") {
            $this->halfBoard = $_POST[$this->accomName . '-' . ($i + 1) . '-board-half'];
        }

        switch (true) {
            case $this->board === "None":
                $this->board = 1;
                break;

            case $this->board === "Full":
                $this->board = 2;
                break;

            case $this->board === "Half" && $this->halfBoard === "Breakfast&Lunch":
                $this->board = 3;
                break;

            case $this->board === "Half" && $this->halfBoard === "Breakfast&Dinner":
                $this->board = 4;
                break;
        }
    }

    public function setAttribute()
    {

 

        switch (true) {
            case $this->accomName === "Apartment":
                $this->apartment = 0;

                break;
            case $this->accomName === "Bungalow":
                $this->bungalow = 0;
                break;

            case $this->accomName === "SingleRoom":
                $this->singleRoom = 0;
                break;

            case $this->accomName === "DoubleRoom":
                $this->doubleRoom = 0;
                break;
        }
    }


    public function childrenOpts()
    {
        for ($i = 0; $i < $this->totalNmbr; $i++) {

            $this->childAge = $_POST['child-' . ($i + 1)];
            $this->option = $_POST['child-' . ($i + 1) . '-opt'];

            switch (true) {
                case $this->childAge === "2yo & under" && $this->option === "Add bed 25%":
                    $this->idOpt = 1;
                    break;
                case $this->childAge === "2yo & under" && $this->option === "No Additional bed":
                    $this->idOpt = 2;
                    break;
                case $this->childAge === "2 - 14yo":
                    $this->idOpt = 3;
                    break;
                case $this->childAge === "14 - 17yo" && $this->option === "Add room":
                    $this->idOpt = 4;
                    break;
                case $this->childAge === "14 - 17yo" && $this->option === "Add bed 70%":
                    $this->idOpt = 5;
                    break;
            }

            $child = array($this->childAge, $this->idOpt);
            array_push($this->children, $child);
        }
    }
}
