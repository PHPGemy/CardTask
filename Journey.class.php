<?php

require_once('Factory/Transportation.php');
require_once('JourneySort.class.php');

class Journey {

    private $fromLocation = '';
    private $toLocation = '';
    private $seat = '';
    protected $cards;

    public function __construct($cards) {
        $this->cards = $cards;
        $journeySort = new JourneySort($this->cards);
        $this->sortCards = $journeySort->sort();

    }

    public static function getFromLocation($obj) {
        return $obj->fromLocation;
    }

    public static function getToLocation($obj) {
        return $obj->toLocation;
    }

    public static function getSeat($obj) {
        return $obj->seat;
    }

    public function fullJourneyDescription() {
        $desc = '<ol>';
        foreach ($this->sortCards as $card) {
            $desc .= Transportation::build($card);
        }
        $desc .= '<li>You have arrived at your final destination.</li>';
        $desc .= '</ol>';
        return $desc;
    }

}
