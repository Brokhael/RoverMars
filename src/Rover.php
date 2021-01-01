<?php

namespace MarsRover;

/**
 * Class Rover
 *
 * @package App\Src
 */
class Rover
{
    /**
     * @var array
     */
    public $start;
    /**
     * @var string
     */
    public $direction;
    /**
     * @var string
     */
    public $command;
    /**
     * @var array
     */
    public $grid;
    /**
     * @var array
     */
    public $obstaculo;

    /**
     * Rover constructor.
     *
     * @param array $start
     * @param string $direction
     * @param string $command
     * @param array $grid
     * @param array $obstaculo
     */
    public function __construct(array $start, string $direction, string $command, array $grid, array $obstaculo)
    {
        $this->start = $start;
        $this->direction = $direction;
        $this->command = $command;
        $this->grid = $grid;
        $this->obstaculo = $obstaculo;
    }

    /**
     * @return array
     */
    public function getStart(): array
    {
        return $this->start;
    }

    /**
     * @param array $start
     */
    public function setStart(array $start)
    {
        $this->start = $start;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection(string $direction)
    {
        $this->direction = $direction;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param string $command
     */
    public function setCommand(string $command)
    {
        $this->command = $command;
    }

    /**
     * @return array
     */
    public function getGrid(): array
    {
        return $this->grid;
    }

    /**
     * @param array $grid
     */
    public function setGrid(array $grid)
    {
        $this->grid = $grid;
    }

    /**
     * @return array
     */
    public function getObstaculo(): array
    {
        return $this->obstaculo;
    }

    /**
     * @param array $obstaculo
     */
    public function setObstaculo(array $obstaculo)
    {
        $this->obstaculo = $obstaculo;
    }

}