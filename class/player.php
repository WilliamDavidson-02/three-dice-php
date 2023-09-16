<?php
require __DIR__ . '/dice.php';

class Player {
    public $name;
    public $points;

    public $dice1;
    public $dice2;
    public $dice3;

    public function __construct($point) {
        $this->points = $point;
        $this->dice1 = new Dice();
        $this->dice2 = new Dice();
        $this->dice3 = new Dice();
    }

    public function rollDices() {
        $roll1 = $this->dice1->roll();
        $roll2 = $this->dice2->roll();
        $roll3 = $this->dice3->roll();

        return [$roll1, $roll2, $roll3];
    }

    public function set_points($point) {
        $this->points = $point;
    }

    public function get_points() {
        return $this->points;
    }

    public function set_name($name) {
        $this->name = ucwords($name);
    }

    public function get_name() {
        return $this->name;
    }
}