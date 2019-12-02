<?php

class Advent_Day1 {

    public function run(){
        echo '<pre>';
        echo 'This is the Day 2 Advent Code.' . "\n";

        $codes = $this->get_input();
        foreach(range(0,99) as $first){
            $codes[1] = $first;
            foreach(range(0,99) as $second){
                $codes[2] = $second;
                $output = $this->getOutput($codes);
                if($output == 19690720) {
                    echo "Success! $first + $second \n";
                    echo (100 * $first + $second) . "\n";
                } else {
                    echo "Failure! $first + $second \n";
                }
            }
        }


        echo $this->getOutput($codes);
    }

    protected function get_input(){
        $content = file_get_contents('day2_input.txt');
        return explode(",", $content);
    }

    /**
     * @param array $codes
     * @return mixed
     */
    public function getOutput(array $codes)
    {
        $position = 0;

        while (true) {
            $code = $codes[$position];

//            echo "Processing command $position: $code \n";

            if ($code == 99) {
                return $codes[0];
            }

            $first_position = $codes[$position + 1];
//            echo "Getting first position $first_position \n";
            $first = $codes[$first_position];
            $second_position = $codes[$position + 2];
            $second = $codes[$second_position];
            $new_position = $codes[$position + 3];

            switch ($code) {
                case 1:
                    $sum = $first + $second;
//                    echo "Add $first and $second to make $sum and assigning it to position $new_position \n";
                    $codes[$new_position] = $sum;
                    $position = $position + 4;
                    break;
                case 2:
                    $sum = $first * $second;
//                    echo "Add $first and $second to make $sum and assigning it to position $new_position \n";
                    $codes[$new_position] = $sum;
                    $position = $position + 4;
                    break;
            }
        }
    }

}

$day = new Advent_Day1;
$day->run();