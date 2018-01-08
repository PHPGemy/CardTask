<?php

class Train {

    private $card;

    function __construct($card) {
        $this->card = $card;
    }


    public function __toString() {
        return '<li>From ' .$this->card['fromLocation']. ' Take Flight to ' . $this->card['toLocation'] . '. Sit in seat ' . $this->card['seatNumber'] . '.</li>';
    }

}
