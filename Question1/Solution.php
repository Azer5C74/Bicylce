<?php

enum WheelSize: int
{
    case size_20 = 20;
    case size_24 = 24;
    case size_28 = 28;
}

class Bicycle
{
    protected int $chainRingTeeth;
    protected int $sprocketTeeth;
    protected float $rearWheelCircumference;
    protected int $gear;
    protected int $maxGear;
    protected WheelSize $wheelSize;

    public function __construct(WheelSize $wheelSize = WheelSize::size_20, $maxGear = 10, $chainRingTeeth = 52, $sprocketTeeth = 19)
    {
        $this->chainRingTeeth = $chainRingTeeth;
        $this->sprocketTeeth = $sprocketTeeth;
        $this->wheelSize = $wheelSize;
        $this->maxGear = $maxGear;
        $this->gear = $maxGear;
        $this->rearWheelCircumference = $wheelSize->value * M_PI;
    }

    public function increaseGear(): void
    {
        if ($this->gear < $this->maxGear) {
            $this->gear++;
            echo "Increasing gear level...";
            $this->calculateSprocketTeeth();
        } else {
            echo "Reached Max gearing level.";
        }
    }

    public function decreaseGear(): void
    {
        if ($this->gear > 1) {
            $this->gear--;
            echo "Decreasing gear level...";
            $this->calculateSprocketTeeth();
        } else {
            echo "Reached Min gearing level.";
        }
    }

    public function getGearLevel(): int
    {
        return $this->gear;
    }

    public function getGearRatio(): float
    {
        if ($this->sprocketTeeth === 0) {
            return INF;
        }
        return round($this->chainRingTeeth / $this->sprocketTeeth, 2);
    }

    public function cycle(int $numberOfRotations): float
    {
        $distance = $this->rearWheelCircumference * $this->getGearRatio() * $numberOfRotations;
        return round($distance, 2);
    }

    public function calculateSprocketTeeth(): float|int
    {
        return $this->sprocketTeeth = 30 - (2 * $this->gear);
    }
}

class CheapBicycle extends Bicycle
{
    public function __construct(WheelSize $wheelSize)
    {
        parent::__construct($wheelSize, 7);
    }

    public function calculateSprocketTeeth(): int|float
    {
        return $this->sprocketTeeth = 30 - (2 * $this->gear);
    }
}

class ExpensiveBicycle extends Bicycle
{
    public function __construct(WheelSize $wheelSize)
    {
        parent::__construct($wheelSize, 30);
    }

    public function calculateSprocketTeeth(): int|float
    {
        return $this->sprocketTeeth = 46 - floor(1.2 * $this->gear);
    }
}

class Solution
{
    public static function main(): void
    {
        $bike = new Bicycle();
        $bike->decreaseGear();
        echo $bike->getGearLevel();
    }
}

Solution::main();