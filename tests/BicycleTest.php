<?php

namespace tests;

require_once __DIR__ . '/../Solution.php';

// Test Bicycle class
use Bicycle;
use CheapBicycle;
use ExpensiveBicycle;
use PHPUnit\Framework\TestCase;
use WheelSize;

class BicycleTest extends TestCase
{
    public function testCycle(): void
    {
        $bicycle = new Bicycle(WheelSize::size_20);
        $this->assertEquals(859.8, $bicycle->cycle(5));
    }

    public function testIncreaseGear(): void
    {
        $bicycle = new Bicycle(WheelSize::size_20);
        $bicycle->increaseGear();
        $this->assertEquals(10, $bicycle->getGearLevel());
    }

    public function testDecreaseGear(): void
    {
        $bicycle = new Bicycle(WheelSize::size_20);
        $bicycle->decreaseGear();
        $this->assertEquals(9, $bicycle->getGearLevel());
    }

    public function testCheapBicycleCalculateSprocketTeeth(): void
    {
        $cheapBicycle = new CheapBicycle(WheelSize::size_20);
        $cheapBicycle->decreaseGear();
        $this->assertEquals(12, $cheapBicycle->calculateSprocketTeeth());
    }

    public function testExpensiveBicycleCalculateSprocketTeeth(): void
    {
        $expensiveBicycle = new ExpensiveBicycle(WheelSize::size_20);
        $expensiveBicycle->decreaseGear();
        $this->assertEquals(36, $expensiveBicycle->calculateSprocketTeeth());
    }

}
