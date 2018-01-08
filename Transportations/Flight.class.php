<?php

class Flight {

    private $card;

    function __construct($card) {
        $this->card = $card;
    }


    public function __toString() {
        return '<li>From ' .$this->card['fromLocation']. ' Take '. __CLASS__ . ' ' . $this->card['transportationNumber']. ' to ' . $this->card['toLocation'] . '. Sit in seat ' . $this->card['seatNumber'] . 
                ' Gate '. $this->card['gateNumber'] .' Baggage '. $this->card['baggageNumber'].'</li>';
    }

}
