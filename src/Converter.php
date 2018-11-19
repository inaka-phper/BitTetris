<?php
/**
 * Created by PhpStorm.
 * User: okuda
 * Date: 2018/11/19
 * Time: 13:44
 */

namespace InakaPhper\BitTetris;


class Converter
{
    public static function toMap(string $input): Map
    {
        $values = explode('-', $input);

        $map = [];
        foreach ($values as $hex) {
            $map[] = array_pad(str_split(base_convert($hex, 16, 2)), -8, 0);
        }

        return new Map($map);
    }

    public static function toHex(Map $map): string
    {
        $map = $map->toCollection();
        return $map->map(function ($column) {
            return str_pad(base_convert(implode('', $column), 2, 16), 2, 0, STR_PAD_LEFT);
        })->implode("-");
    }
}