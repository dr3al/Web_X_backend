<?php

namespace App\Services\User;

class GeneratePasswordService
{
    public function __construct (
    )
    {}

    function gen_password($length = 10): string
    {
        $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP';
        $size = strlen($chars) - 1;
        $password = '';
        while($length--) {
            $password .= $chars[random_int(0, $size)];
        }
        return $password;
    }
}
