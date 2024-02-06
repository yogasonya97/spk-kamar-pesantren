<?php
if (!function_exists('successResponse')) {
    function successResponse($response) {
		$res = (object) [
			'responseCode' => 1,
			'response' => $response
		];
		return $res;
    }
}

if (!function_exists('failResponse')) {
    function failResponse($response) {
		$res = (object) [
			'responseCode' => 0,
			'response' => $response
		];
		return $res;
    }
}
