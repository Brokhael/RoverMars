<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use MarsRover\Rover;
use MarsRover\MovementUtil;

class RoverTest extends TestCase
{

    /**
     * Test para que el rover se encuentre con el obstaculo.
     */
    public function testConducirRoverHaciaObstaculo()
    {
        $start = [0, 0];
        $direction = 'N';
        $command = 'FFFRFLFFFF';
        $grid = [10, 10];
        $obstaculo = [1, 4];

        $rover = new Rover($start, $direction, $command, $grid, $obstaculo);
        $movement = new MovementUtil($rover);
        $result = $movement->moveRover();

        self::assertStringContainsString('Hay un obstáculo en la posición', $result);
    }

    /**
     * Test para que el rover complete el comando.
     */
    public function testConducirRoverEvitarObstaculo()
    {
        $start = [0, 0];
        $direction = 'N';
        $command = 'FFFRFFLFFF';
        $grid = [10, 10];
        $obstaculo = [1, 4];

        $rover = new Rover($start, $direction, $command, $grid, $obstaculo);
        $movement = new MovementUtil($rover);
        $result = $movement->moveRover();

        self::assertStringContainsString('¡He conseguido recorrer el camino indicado sin obstáculos!', $result);
    }
}