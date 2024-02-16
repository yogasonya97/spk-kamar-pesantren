<?php 
if (!function_exists('sortRankDariYangTerbesar')) {
    function sortRankDariYangTerbesar(&$array, $field) {
        usort($array, function($a, $b) use ($field) {
            return $b[$field] - $a[$field];
        });
        return $array;
    }
}