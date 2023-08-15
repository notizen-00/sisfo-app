<?php

namespace App\Helpers;

use DateTime;
use DateTimeZone;

class TanggalHelper
{
    public static function formatTanggalIndo($dateTimeString)
    {
        $daysInIndonesian = [
            'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
        ];

        // Ubah string tanggal menjadi objek DateTime dengan timezone UTC
        $dateTime = new DateTime($dateTimeString, new DateTimeZone('UTC'));

        // Set timezone ke Asia/Jakarta (WIB)
        $dateTime->setTimezone(new DateTimeZone('Asia/Jakarta'));

        // Format tanggal dan waktu ke dalam format yang diinginkan
        $formattedDate = $dateTime->format('d-m-Y');
        $dayOfWeek = $dateTime->format('w'); // Hari dalam angka, 0 untuk Minggu, 1 untuk Senin, dst.
        $formattedTime = $dateTime->format('H:i:s');

        return $daysInIndonesian[$dayOfWeek] . ', ' . $formattedDate . ' ' . $formattedTime;
    }
}
