<?php
// File: application/helpers/laravel_helper.php

if (!function_exists('collect')) {
    function collect($array)
    {
        return new Laravel_Collection($array);
    }
}

class Laravel_Collection
{
    protected $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function map($callback)
    {
        return array_map($callback, $this->items);
    }

    public function reduce($callback, $initial = null)
    {
        return array_reduce($this->items, $callback, $initial);
    }
    public function where($key, $operator, $value = null)
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '=';
        }

        $result = [];
        foreach ($this->items as $item) {
            switch ($operator) {
                case '=':
                    if ($item[$key] == $value) {
                        $result[] = $item;
                    }
                    break;
                case '!=':
                    if ($item[$key] != $value) {
                        $result[] = $item;
                    }
                    break;
                case '<':
                    if ($item[$key] < $value) {
                        $result[] = $item;
                    }
                    break;
                case '<=':
                    if ($item[$key] <= $value) {
                        $result[] = $item;
                    }
                    break;
                case '>':
                    if ($item[$key] > $value) {
                        $result[] = $item;
                    }
                    break;
                case '>=':
                    if ($item[$key] >= $value) {
                        $result[] = $item;
                    }
                    break;
                default:
                    break;
            }
        }

        return collect($result);
    }

    public function filter($callback)
    {
        return array_filter($this->items, $callback);
    }
}
