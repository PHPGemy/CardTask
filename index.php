<?php

require_once('Journey.class.php');

$cards = [
	[
	'fromLocation' 			=> 'Barcelona',
	'toLocation' 			=> 'Gerona',
	'transportationType' 	=> 'Airport bus'
	],
	[
	'fromLocation' 			=> 'Madrid',
	'toLocation' 			=> 'Barcelona',
	'transportationType' 	=> 'Train',
	'seatNumber' 			=> '45B'
	],
	[
	'fromLocation' 			=> 'Stockholm',
	'toLocation' 			=> 'New York JFK',
	'transportationType' 	=> 'Flight',
	'transportationNumber' 	=> 'SK22',
	'seatNumber' 			=> '7B', 
	'gateNumber' 			=> '22', 
	'baggageNumber' 		=> 'will we automatically transferred from your last leg', 
	],
	[
	'fromLocation' 			=> 'Gerona',
	'toLocation' 			=> 'Stockholm',
	'transportationType' 	=> 'Flight',
	'transportationNumber' 	=> 'SK455',
	'seatNumber' 			=> '3A', 
	'gateNumber' 			=> '45B', 
	'baggageNumber' 		=> 'drop at ticket counter 344', 
	]
];



$journey = new Journey($cards);
echo $journey->fullJourneyDescription();