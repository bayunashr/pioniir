<?php

function format_rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}