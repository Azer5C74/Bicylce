<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../Solution.php';

class BicycleTest extends TestCase
{
    public function testDefaultGear()
    {
        $bicycle = new Bicycle();
        $this->assertEquals(10, $bicycle->getGearLevel());
    }

    public function testDecreaseGear()
    {
        $bicycle = new Bicycle();
        $bicycle->decreaseGear();
        $this->assertEquals(9, $bicycle->getGearLevel());
    }

    public function testMaxGear()
    {
        $bicycle = new Bicycle();
        for ($i = 0; $i < 20; $i++) {
            $bicycle->increaseGear();
        }
        $this->assertEquals(10, $bicycle->getGearLevel());
    }

    public function testMinGear()
    {
        $bicycle = new Bicycle();
        for ($i = 0; $i < 20; $i++) {
            $bicycle->decreaseGear();
        }
        $this->assertEquals(1, $bicycle->getGearLevel());
    }

    public function testGearRatio()
    {
        $bicycle = new Bicycle();
        $this->assertEquals(2.74, $bicycle->getGearRatio());

        $bicycle->decreaseGear();
        $this->assertEquals(4.33, $bicycle->getGearRatio());
    }

    public function testCycle()
    {
        $bicycle = new Bicycle();
        $this->assertEquals(1721.59, $bicycle->cycle(10));
    }
}

class CheapBicycleTest extends TestCase
{
    public function testDefaultGear()
    {
        $bicycle = new CheapBicycle(WheelSize::size_20);
        $this->assertEquals(7, $bicycle->getGearLevel());
    }

    public function testCalculateSprocketTeeth()
    {
        $bicycle = new CheapBicycle(WheelSize::size_24);
        $bicycle->increaseGear();
        $this->assertEquals(26, $bicycle->calculateSprocketTeeth());
    }
}

class ExpensiveBicycleTest extends TestCase
{
    public function testDefaultGear()
    {
        $bicycle = new ExpensiveBicycle(WheelSize::size_28);
        $this->assertEquals(30, $bicycle->getGearLevel());
    }

    public function testCalculateSprocketTeeth()
    {
        $bicycle = new ExpensiveBicycle(WheelSize::size_20);
        $bicycle->increaseGear();
        $this->assertEquals(43, $bicycle->calculateSprocketTeeth());
    }
}
