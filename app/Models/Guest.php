<?php

namespace App\Models;

class Guest extends AbstractUser
{
    public function login()
    {
        return "Guest Login";
    }
}
