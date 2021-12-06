<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $allowedFields = ["username", "password_hash", "name", "email", "gender", "description",
        "image_url", "university", "major", "linkedin_account", "linkedin_url", "github_account", "whatsapp_account"];
    protected $useTimestamps = true;
}