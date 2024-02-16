<?php
function konversiBulan($nama_bulan) {
    switch ($nama_bulan) {
        case 'January':
            return 'Januari';
        case 'February':
            return 'Februari';
        case 'March':
            return 'Maret';
        case 'April':
            return 'April';
        case 'May':
            return 'Mei';
        case 'June':
            return 'Juni';
        case 'July':
            return 'Juli';
        case 'August':
            return 'Agustus';
        case 'September':
            return 'September';
        case 'October':
            return 'Oktober';
        case 'November':
            return 'November';
        case 'December':
            return 'Desember';
        default:
            return '';
    }
}

if (!function_exists('formatIndoText')) {
    function formatDateIndoText($date) {
		$day = date('d', strtotime($date));
		$month = konversiBulan(date('F', strtotime($date)));
		$year = date('Y', strtotime($date));
		$formatText = $day.' '.$month.' '.$year;
		return $formatText;
    }
}

if (!function_exists('formatIndoTextWithoutDay')) {
    function formatIndoTextWithoutDay($date) {
		$month = konversiBulan(date('F', strtotime($date)));
		$year = date('Y', strtotime($date));
		$formatText = $month.' '.$year;
		return $formatText;
    }
}


