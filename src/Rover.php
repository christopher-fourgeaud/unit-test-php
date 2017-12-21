<?php

class Rover
{

    private $x;
    private $y;
    private $orientation;

    public function __construct($x, $y, $orientation)
    {
        $this->x = $x;
        $this->y = $y;
        $this->orientation = $orientation;
    }

    

    // Get X
    public function getX()
    {
        return $this->x;
    }

    // Get Y
    public function getY()
    {
        return $this->y;
    }

    // Get Orientation
    public function getOrientation()
    {
        return $this->orientation;
    }

    public function moveForward()
    {
        //Si le rover avance vers le nord
        if ($this->orientation === "N") {
            $this->y--;
        } 
        //Si le rover avance vers le sud
        elseif ($this->orientation === "S") {
            $this->y++;
        } 
        // Si le rover avance vers l'ouest
        elseif ($this->orientation === "W") {
            $this->x--;
        } 
        // Sinon le rover avance vers l' est.
        else {
            $this->x++;
        }
    }

    public function turnRight()
    {
        if ($this->orientation === "S") {
            $this->orientation = "W";
        } elseif ($this->orientation === "E") {
            $this->orientation = "S";
        } elseif ($this->orientation === "W") {
            $this->orientation = "N";
        } elseif ($this->orientation === "N") {
            $this->orientation = "E";
        }
    }

    public function turnLeft()
    {
        if ($this->orientation === "N") {
            $this->orientation = "W";
        } elseif ($this->orientation === "W") {
            $this->orientation = "S";
        } elseif ($this->orientation === "S") {
            $this->orientation = "E";
        } else {
            $this->orientation = "N";
        }
    }

    public function followInstructions($instruction)
    {
        $instructions = str_split($instruction);
        var_dump($instructions);

        foreach ($instructions as $instruction) {
            if ($instruction === "F") {
                $this->moveForward();
            } elseif ($instruction === "L") {
                $this->turnLeft();
            } elseif ($instruction === "R") {
                $this->turnRight();
            }
        }

    }
}