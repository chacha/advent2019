<?php

class Advent_Day1 {

    public function run(){
        echo '<pre>';
        echo 'This is the Day 1 Advent Code.' . "\n";

        $moduleMass = $this->get_input();
        $fuelResults = [];
        foreach($moduleMass as $mass){

            if(empty($mass)){
                continue;
            }

            $fuel = $this->getFuel($mass);
            printf('Module weighing %d required %d fuel.' . "\n", $mass, $fuel);
            $fuelResults[] = $fuel;
        }

        $total = array_sum($fuelResults);
        printf('Total fuel required is %d', $total);
    }

    protected function get_input(){
        $content = file_get_contents('day1_input.txt');
        return explode("\n", $content);
    }

    /**
     * @param $mass
     * @return false|float|int
     */
    public function getFuel($mass)
    {
        $fuel = floor($mass / 3) - 2;
        if($fuel < 0){
            return 0;
        }

        return $fuel + $this->getFuel($fuel);
    }


}

$day = new Advent_Day1;
$day->run();