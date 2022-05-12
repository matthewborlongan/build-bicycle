<?php
namespace App\Entity;

use App\Entity\Wheel;
use App\Entity\Frame;
use App\Entity\Seat;
use App\Entity\HandleBar;
use App\Entity\Pedal;
use App\Entity\Brake;

class Bicycle {
    private Wheel $frontWheel;
    private Wheel $rearWheel;
    private Frame $frame;
    private Seat $seat; 
    private HandleBar $handleBar;
    private Pedal $leftPeddle;
    private Pedal $rightPedal;
    private Brake $frontBrake;
    private Brake $rearBrake;

    public function __construct(Frame $frame, HandleBar $handleBar, Wheel $wheel, Pedal $pedal, Brake $brake) 
    {
        $this->frame = $frame;
        $this->handleBar = $handleBar;
        $this->frontWheel = $wheel;
        $this->backWheel = $wheel;
        $this->leftPeddle = $pedal;
        $this->rightPeddle = $pedal;
        $this->frontBrake = $brake;
        $this->rearBrake = $brake;
    }

    /**
     * Get the value of frontWheel
     * @return Wheel
     */ 
    public function getFrontWheel(): Wheel
    {
        return $this->frontWheel;
    }

    /**
     * Set the value of frontWheel
     *
     * @param Wheel $frontWheel
     * @return  self
     */ 
    public function setFrontWheel(Wheel $frontWheel): self
    {
        $this->frontWheel = $frontWheel;

        return $this;
    }

    /**
     * Get the value of rearWheel
     * @return Wheel
     */ 
    public function getRearWheel(): Wheel
    {
        return $this->rearWheel;
    }

    /**
     * Set the value of rearWheel
     *
     * @param Wheel $rearWheel
     * @return  self
     */ 
    public function setRearWheel(Wheel $rearWheel): self
    {
        $this->rearWheel = $rearWheel;

        return $this;
    }

    /**
     * Get the value of frame
     * @return Frame
     */ 
    public function getFrame(): Frame
    {
        return $this->frame;
    }

    /**
     * Set the value of frame
     *
     * @param Frame $frame
     * @return  self
     */ 
    public function setFrame(Frame $frame): self
    {
        $this->frame = $frame;

        return $this;
    }

    /**
     * Get the value of seat
     * 
     * @return Seat
     */ 
    public function getSeat(): Seat
    {
        return $this->seat;
    }

    /**
     * Set the value of seat
     *
     * @param Seat $seat
     * @return  self
     */ 
    public function setSeat(Seat $seat): self
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * Get the value of handleBar
     * 
     * @return HandleBar
     */ 
    public function getHandleBar(): HandleBar
    {
        return $this->handleBar;
    }

    /**
     * Set the value of handleBar
     *
     * @param HandleBar $handleBar
     * @return  self
     */ 
    public function setHandleBar(HandleBar $handleBar): self
    {
        $this->handleBar = $handleBar;

        return $this;
    }

    /**
     * Get the value of leftPeddle
     * 
     * @return Pedal
     */ 
    public function getLeftPeddle(): Pedal
    {
        return $this->leftPeddle;
    }

    /**
     * Set the value of leftPeddle
     *
     * @param Pedal $leftPeddle
     * @return  self
     */ 
    public function setLeftPeddle(Pedal $leftPeddle): self
    {
        $this->leftPeddle = $leftPeddle;

        return $this;
    }

    /**
     * Get the value of rightPedal
     * 
     * @return Pedal
     */ 
    public function getRightPedal(): Pedal
    {
        return $this->rightPedal;
    }

    /**
     * Set the value of rightPedal
     *
     * @param Pedal $rightPedal
     * @return  self
     */ 
    public function setRightPedal($rightPedal): self
    {
        $this->rightPedal = $rightPedal;

        return $this;
    }

    /**
     * Get the value of frontBrake
     * @return Brake
     */ 
    public function getFrontBrake(): Brake
    {
        return $this->frontBrake;
    }

    /**
     * Set the value of frontBrake
     *
     * @param Brake $frontBreak
     * @return  self
     */ 
    public function setFrontBrake(Brake $frontBrake): self
    {
        $this->frontBrake = $frontBrake;

        return $this;
    }

    /**
     * Get the value of rearBrake
     * 
     * @return Brake
     */ 
    public function getRearBrake(): Brake
    {
        return $this->rearBrake;
    }

    /**
     * Set the value of rearBrake
     *
     * @param Brake $rearBrake
     * @return  self
     */ 
    public function setRearBrake(Brake $rearBrake): self
    {
        $this->rearBrake = $rearBrake;

        return $this;
    }
}