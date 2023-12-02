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