<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $allowedFields = ["username", "password_hash","name", "email"];
    protected $useTimestamps = true;
}