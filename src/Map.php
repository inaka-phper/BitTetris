<?php
namespace InakaPhper\BitTetris;

/**
 * Created by PhpStorm.
 * User: okuda
 * Date: 2018/11/19
 * Time: 13:34
 */

use Tightenco\Collect\Contracts\Support\Arrayable;
use Tightenco\Collect\Support\Collection;

class Map implements Arrayable
{
    /**
     * @var Collection
     */
    private $map;

    public function __construct(array $map)
    {
        $this->map = new Collection($map);
    }

    /**
     * @return Collection
     */
    public function toCollection()
    {
        return $this->map;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->map->toArray();
    }

    /**
     * @return string
     */
    public function toText()
    {
        $output = "";

        for ($i = 0; $i < 8; $i++) {
            $row = $this->map->pluck($i);
            foreach ($row as $cell) {
                $output .= $cell ? '■' : '□';
            }
            $output .= "\n";
        }
        return $output;
    }
}