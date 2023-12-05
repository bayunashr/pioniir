<?php

function format_rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function format_hari_sub($date) {
    $start = new DateTime($date);
    $exp = clone $start;
    return $start->diff($exp->modify('+30 days'))->days.' Hari Tersisa';
}

function format_persen_miles($nilai, $target) {
    return strval(($nilai/$target)*100)."%";
}

function format_persen_miles_creator($nilai, $target) {
    $percentage = intval(($nilai / $target) * 100);
    $formatted_percentage = min($percentage, 100);
    return $formatted_percentage;
}

function format_waktu_lampau($time){
    $now = new DateTime();
    $past = new DateTime($time);
    return $now->diff($past)->format('%i');
}

function format_date($waktu_awal)  {
    return date('H:i:s d F Y', strtotime($waktu_awal));
}