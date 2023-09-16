<?php

class Player {
    public $name;
    public $points;

    public function __construct($point) {
        $this->points = $point;
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