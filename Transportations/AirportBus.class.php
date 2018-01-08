<?php

class AirportBus {

    private $card;

    function __construct($card) {
        $this->card = $card;
    }


    public function __toString() {
        return '<li>From ' .$this->card['fromLocation']. ' Take Airport Bus to ' . $this->card['toLocation'] . '. No seat assignment.</li>';
    }

}
