<?php
/**
 * Created by PhpStorm.
 * User: okuda
 * Date: 2018/11/19
 * Time: 14:02
 */

namespace InakaPhper\BitTetris;


class Tetris
{
    private $map;

    private $result = [];

    /**
     * Tetris constructor.
     * @param Map $map
     */
    public function __construct(Map $map)
    {
        $this->map = clone $map;
        $this->result = $map->toArray();
    }

    /**
     * @return Map
     */
    public function execute(): Map
    {
        $map = $this->map->toCollection();
        for ($i = 0; $i < 8; $i++) {
            if ($map->pluck($i)->sum() === $map->count()) {
                $this->forget($i);
            }
        }
        $this->refresh();

        return new Map($this->result);
    }

    /**
     * @param $line
     */
    private function forget($line)
    {
        foreach ($this->result as $key => $column) {
            unset($this->result[$key][$line]);
        }
    }

    /**
     *
     */
    private function refresh()
    {
        foreach ($this->result as $key => $column) {
            $this->result[$key] = array_pad(array_values($column), -8, 0);
        }
    }
}