<?php

class Journey
{
	protected $cards;
	protected $allFromLocations=[];
	protected $allToLocations=[];

	public function __construct($cards) {
		$this->cards = $cards;
	}



	public function sortCards() {
		foreach ($this->cards as $card) {
			$this->allFromLocations[$card['fromLocation']] = $card;
			$this->allToLocations[$card['toLocation']] = $card;
		}

		$startingLocation = $this->getStartLocation();

		$sortedLocations[] = $startingLocation;
		$location = $startingLocation;

		// var_dump($startingLocation);
		// echo "<pre>";
		// print_r($this->allFromLocations);
		// exit;
		while (count($sortedLocations) < count($this->cards)) {
			$location = $this->allFromLocations[$location['toLocation']];
			$sortedLocations[] = $location;
		}
		return $sortedLocations;
	}

	private function getStartLocation() {
		$startLocation = null;
		foreach ($this->cards as $card) {
			if(!$startLocation || ($startLocation['toLocation'] != $card['fromLocation'] && !isset($this->allToLocations[$card['fromLocation']]))) {
				$startLocation = $card;
			}
		}

		return $startLocation; 
	}

	public function fullJourneyDescription() {
		$sortedCards = $this->sortCards();
		// echo "<pre>";
		// print_r($sortedCards);
		// exit;
		$desc = '<ol>';
		foreach ($sortedCards as  $card) {
			$desc .= '<li>';
			$desc .= 'From ' . $card['fromLocation'];
			$desc .= ', take  '. $card['transportationType'] .' ';
			if(isset($card['transportationNumber'])) {
				$desc .= $card['transportationNumber'];
			}
			$desc .= ' to ' . $card['toLocation'].' ';
			if(isset($card['transportationNumber'])) {
				$desc .= '. Gate ' .$card['gateNumber'];
			}
			if(isset($card['seatNumber'])) {
				$desc .= '. Sit in seat ' .$card['seatNumber'].'. ';
			} else {
				$desc .= 'No seat assignment.';
			}
			if(isset($card['baggageNumber'])) {
				$desc .= 'Baggage ' .$card['baggageNumber'];
			}
			$desc .= '</li>';
		}
		$desc .= '<li>You have arrived at your final destination.</li>';
		$desc .= '</ol>';
		return $desc;
	}
}