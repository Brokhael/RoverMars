<?php

namespace MarsRover;

/**
 * Class MovementUtil
 */
class MovementUtil {

    /** @var Rover */
    public $rover;

    public function __construct(Rover $rover)
    {
        $this->rover = $rover;
    }

    /**
     * @return Rover
     */
    public function getRover(): Rover
    {
        return $this->rover;
    }

    /**
     * @param Rover $rover
     */
    public function setRover(Rover $rover)
    {
        $this->rover = $rover;
    }

    public function moveRover()
    {
        $command = str_split($this->rover->getCommand());
        $actualOrientation = $this->rover->getDirection();
        $position = $this->rover->getStart();
        $obstacle = $this->rover->getObstaculo();
        $obstaculoEncontrado = false;
        $planetaExplorado = false;
        foreach ($command as $next) {
            $actualOrientation = $this->getNextOrientation($actualOrientation, $next);
            if ('F' === $next) {
                $nextPosition = $this->getNextPosition($position, $actualOrientation);
            }
            if ($obstacle === $nextPosition) {
                $obstaculoEncontrado = true;
                $return = 'Hay un obstáculo en la posición ['.$nextPosition[0].', '.$nextPosition[1].'], permanezco en la última posición segura ['.$position[0].', '.$position[1].']';
                break;
            } else {
                $position = $nextPosition;
            }
        }
        if (!$obstaculoEncontrado) {
            $return = '¡He conseguido recorrer el camino indicado sin obstáculos!';
        }

        return $return;
    }

    /**
     * @param array $position
     * @param string $orientation
     * @return array
     */
    private function getNextPosition(array $position, string $orientation): array
    {
        $x = $position[0];
        $y = $position[1];
        if ('N' === $orientation) {
            $y ++;
        } elseif ('S' === $orientation) {
            $y --;
        } elseif ('E' === $orientation) {
            $x ++;
        } else {
            $x --;
        }

        return [$x, $y];
    }

    /**
     * Si el comando es R o L el rover cambiará su orientación
     *
     * @param string $actualOrientaton
     * @param string $command
     */
    private function getNextOrientation(string $actualOrientaton, string $command): string
    {
        $orientation = '';
        if ('F' !== $command) {
            switch ($actualOrientaton) {
                case 'N':
                    if ('R' === $command) {
                        $orientation = 'E';
                    } else {
                        $orientation = 'W';
                    }
                    break;
                case 'S':
                    if ('R' === $command) {
                        $orientation = 'W';
                    } else {
                        $orientation = 'E';
                    }
                    break;
                case 'W':
                    if ('R' === $command) {
                        $orientation = 'N';
                    } else {
                        $orientation = 'S';
                    }
                    break;
                case 'E':
                    if ('R' === $command) {
                        $orientation = 'S';
                    } else {
                        $orientation = 'N';
                    }
                    break;
            }
        } else {
            $orientation = $actualOrientaton;
        }

        return $orientation;
    }
}