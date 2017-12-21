<?php

use PHPUnit\Framework\TestCase;


class TestRover extends TestCase
{

    public function testInit()
    {
        $rover = new Rover(1, 1, "E");
        $this->assertEquals(1, $rover->getX());
        $this->assertEquals(1, $rover->getY());
        $this->assertEquals("E", $rover->getOrientation());
    }

    public function testForward()
    {
        $rover = new Rover(1, 1, "E");
        $rover->moveForward();
        $this->assertEquals(2, $rover->getX());
        $this->assertEquals(1, $rover->getY());
        $this->assertEquals("E", $rover->getOrientation());

    }

    public function testForwardNorth()
    {
        $rover = new Rover(1, 1, "N");
        $rover->moveForward();
        $this->assertEquals(1, $rover->getX());
        $this->assertEquals(0, $rover->getY());
        $this->assertEquals("N", $rover->getOrientation());
    }

    public function testForwardSouth()
    {
        $rover = new Rover(1, 1, "S");
        $rover->moveForward();
        $this->assertEquals(1, $rover->getX());
        $this->assertEquals(2, $rover->getY());
        $this->assertEquals("S", $rover->getOrientation());
    }

    public function testForwardWest()
    {
        $rover = new Rover(1, 1, "W");
        $rover->moveForward();
        $this->assertEquals(0, $rover->getX());
        $this->assertEquals(1, $rover->getY());
        $this->assertEquals("W", $rover->getOrientation());
    }

    public function testTurnRight()
    {
        $rover = new Rover(1,1,"E");
        $rover->turnRight();
        $this->assertEquals("S", $rover->getOrientation());
        $rover->turnRight();
        $this->assertEquals("W", $rover->getOrientation());
        $rover->turnRight();
        $this->assertEquals("N", $rover->getOrientation());
        $rover->turnRight();
        $this->assertEquals("E", $rover->getOrientation());
    }

    public function testTurnLeft()
    {
        $rover = new Rover(1, 1, "E");
        $rover->turnLeft();
        $this->assertEquals("N", $rover->getOrientation());
        $rover->turnLeft();
        $this->assertEquals("W", $rover->getOrientation());
        $rover->turnLeft();
        $this->assertEquals("S", $rover->getOrientation());
        $rover->turnLeft();
        $this->assertEquals("E", $rover->getOrientation());
    }

    public function testMoveAndTurn()
    {
        // Création du rover
        $rover = new Rover(4, 2, "S");

        // Le rover avance
        $rover->moveForward();
        $this->assertEquals(4, $rover->getX());
        $this->assertEquals(3, $rover->getY());
        $this->assertEquals("S", $rover->getOrientation());

        // Le rover tourne à droite
        $rover->turnRight();
        $this->assertEquals("W", $rover->getOrientation());

        // Le rover tourne à gauche
        $rover->turnLeft();
        $this->assertEquals("S", $rover->getOrientation());

        // Le rover avance
        $rover->moveForward();
        $this->assertEquals(4, $rover->getX());
        $this->assertEquals(4, $rover->getY());
        $this->assertEquals("S", $rover->getOrientation());

        // Le rover tourne à droite
        $rover->turnRight();
        $this->assertEquals("W", $rover->getOrientation());

        // Le rover avance
        $rover->moveForward();
        $this->assertEquals(3, $rover->getX());
        $this->assertEquals(4, $rover->getY());
        $this->assertEquals("W", $rover->getOrientation());

        // Le rover avance
        $rover->moveForward();
        $this->assertEquals(2, $rover->getX());
        $this->assertEquals(4, $rover->getY());
        $this->assertEquals("W", $rover->getOrientation());

        // Le rover tourne à droite
        $rover->turnRight();
        $this->assertEquals("N", $rover->getOrientation());

        // Le rover tourne à droite
        $rover->turnRight();
        $this->assertEquals("E", $rover->getOrientation());

        // Le rover avance
        $rover->moveForward();
        $this->assertEquals(3, $rover->getX());
        $this->assertEquals(4, $rover->getY());
        $this->assertEquals("E", $rover->getOrientation());
    }

    public function testInstructions(){
        // Création du rover
        $rover = new Rover(1, 1, "E");
        $rover->followInstructions("FFFRLLFRFLFF");
        $this->assertEquals(5, $rover->getX());
        $this->assertEquals(-2, $rover->getY());
        $this->assertEquals("N", $rover->getOrientation());
    }
}
