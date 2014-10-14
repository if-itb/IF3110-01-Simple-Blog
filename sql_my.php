<?php
    date_default_timezone_set("Asia/Jakarta");
    function date_sql2my($sql_date) {
        $timestamp = date_create_from_format('Y-m-d', $sql_date);

        return $timestamp->format('d-m-Y');
    }


    function date_sql2my0($sql_date) {
        $timestamp = date_create_from_format('Y-m-d', $sql_date);

        $month_name = array(1 => "Januari", "Februari", "Maret", "April", "Mei",
            "Juni", "Juli", "Agustus", "September", "Oktober", "November",
            "Desember");

        return $timestamp->format('d ') . $month_name[+$timestamp->format('m')]
            . $timestamp->format(' Y');
    }

    function time_passed($sql_date_time) {
        $timestamp = date_create_from_format('Y-m-d H:i:s', $sql_date_time);
        $now = new DateTime();
        $difference = $now->diff($timestamp);
        //return $now->format("Y-m-d H:i:s");
        if ($difference->d == 0) {
        if ($difference->h == 0) {
        if ($difference->i == 0) {
        if ($difference->s == 0) {
            return "Barusan Saja";
        } else {
            return $difference->s. " detik yang lalu";
        }
        } else {
            return $difference->i.' menit yang lalu';
        }
        } else {
            return $difference->h.' jam, '.$difference->i.' menit yang lalu';
        }
        } else {
            return $sql_date_time;
        }
        return "ERROR";
    }
?>