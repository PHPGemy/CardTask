<?php

require_once('Transportations/AirportBus.class.php');
require_once('Transportations/Flight.class.php');
require_once('Transportations/Train.class.php');

class Transportation {

    public static function build($card) {
        $type = $card['transportationType'];
        if ($type == '') {
            throw new Exception('Invalid Transportation method.');
        } else {
            $className = $type;
            if (class_exists($className)) {
                return new $className($card);
            } else {
                throw new Exception('Transportation method not found.');
            }
        }
    }

}
