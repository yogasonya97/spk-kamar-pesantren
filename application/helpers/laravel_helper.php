<?php
// File: application/helpers/laravel_helper.php

if (!function_exists('collect')) {
    function collect($array)
    {
        return new Laravel_Collection($array);
    }
}

class Laravel_Collection {
    protected $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function map($callback)
    {
        return array_map($callback, $this->items);
    }
}
