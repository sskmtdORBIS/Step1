<?php

class CarRace {
    private $cars;
    private $roundCount;

    public function __construct($cars) {
        $this->cars = $cars;
        $this->roundCount = array_fill(0, count($cars), 0);
    }

    public function simulateRace() {
        $goingCar = 1;

        while (!empty($this->cars)) {
            if ($this->cars[0] == $goingCar) {
                array_shift($this->cars);
                $goingCar++;
            } else {
                $removed = array_shift($this->cars);
                $this->cars[] = $removed;
                $this->roundCount[$removed - 1]++;
            }
        }
    }

    public function getMaxRoundCount() {
        return max($this->roundCount);
    }
}

$N = trim(fgets(STDIN));
$cars = [];

for ($i = 0; $i < $N; $i++) {
    $cars[] = trim(fgets(STDIN));
}

$race = new CarRace($cars);
$race->simulateRace();
echo $race->getMaxRoundCount();

?>
