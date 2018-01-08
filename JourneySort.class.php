<?php

class JourneySort {

    private $cards;
    private $allFromLocations = [];
    private $allToLocations = [];

    public function __construct($cards) {
        $this->cards = $cards;

    }

    public function sort($cards) {
        foreach ($this->cards as $card) {
            $this->allFromLocations[$card['fromLocation']] = $card;
            $this->allToLocations[$card['toLocation']] = $card;
        }

        $startingLocation = $this->getStartLocation();

        $sortedLocations[] = $startingLocation;
        $location = $startingLocation;

        while (count($sortedLocations) < count($this->cards)) {
            $location = $this->allFromLocations[$location['toLocation']];
            $sortedLocations[] = $location;
        }
        return $sortedLocations;
    }

    private function getStartLocation() {
        $startLocation = null;
        foreach ($this->cards as $card) {
            if (!$startLocation || ($startLocation['toLocation'] != $card['fromLocation'] && !isset($this->allToLocations[$card['fromLocation']]))) {
                $startLocation = $card;
            }
        }

        return $startLocation;
    }

}
