<?php

namespace App\Models;

abstract class AbstractUser
{
    protected $email;
    protected $password;

    abstract public function login();
}
