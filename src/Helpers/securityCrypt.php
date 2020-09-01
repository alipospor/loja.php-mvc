<?php

namespace App\Loja\Helpers;

/**
 * 
 */
trait securityCrypt
{
    private $_salt = "72b302bf297a228a75730123efef7c41";
    private $_saltCost = 8;

    public function encrypt($value)
    {
        $hash = crypt($value, $this->_saltCost . '$' . $this->_salt);
        return $hash;
    }

    public function compareHash($password, $encryptedPassword)
    {
        if (crypt($password, $encryptedPassword) === $encryptedPassword) {
            return true;
        } else {
            return false;
        }
    }
}
