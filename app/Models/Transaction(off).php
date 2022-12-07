<?php

namespace App\Models;

class Transaction
{
    private static $test = [
        [
            "isi" => "ok"
        ],
        [
            "isi" => "ok2"
        ]
    ];

    public static function all()
    {
        return collect(self::$test);
    }
}
