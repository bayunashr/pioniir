<?php

function format_rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function format_hari_sub($date)
{
    $currentDate = new DateTime('now');
    $givenDate = new DateTime($date);
    $givenDate->modify('+30 days');
    $interval = $currentDate->diff($givenDate);

    if ($givenDate < $currentDate) {
        return 'Expired';
    } else {
        return $interval->format('%a Hari Tersisa');
    }
}

function format_persen_miles($nilai, $target)
{
    return strval(($nilai / $target) * 100) . "%";
}

function format_persen_miles_creator($nilai, $target)
{
    $percentage = intval(($nilai / $target) * 100);
    $formatted_percentage = min($percentage, 100);
    return $formatted_percentage;
}

function format_waktu_lampau($time)
{
    $now = new DateTime();
    $past = new DateTime($time);
    return $now->diff($past)->format('%i');
}

function format_date($waktu_awal)
{
    return date("d F Y, H:i:s", strtotime($waktu_awal));
}

function potongString($kalimat)
{
    if (strlen($kalimat) <= 15) {
        return $kalimat;
    } else {
        $potongan = substr($kalimat, 0, 15);
        $lastSpacePos = strrpos($potongan, ' ');
        if ($lastSpacePos !== false) {
            $potongan = substr($potongan, 0, $lastSpacePos);
        }
        return $potongan . '...';
    }
}

function hitungSelisihHari($subscriptionDate) {
   // Ubah string tanggal menjadi objek DateTime
   $subscriptionDateTime = new DateTime($subscriptionDate);
   $currentDateTime = new DateTime();

   // Hitung selisih antara tanggal saat ini dan tanggal langganan
   $diff = $currentDateTime->diff($subscriptionDateTime);

   // Mengembalikan sisa hari dalam bentuk bilangan bulat
   return (30 - $diff->days);
}

function isi($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}