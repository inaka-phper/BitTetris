<?php
/**
 * This file is part of the InakaPhper.BitTetris
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace InakaPhper\BitTetris;

class BitTetris
{
    /**
     * @var Map
     */
    private $map;

    public function __construct(string $input)
    {
        $this->map = Converter::toMap($input);
    }

    /**
     * @return string
     */
    public function play()
    {
        return Converter::toHex((new Tetris($this->map))->execute());
    }
}
