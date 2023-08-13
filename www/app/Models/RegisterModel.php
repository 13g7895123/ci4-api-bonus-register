<?php

namespace App\Models;
use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table      = 'phone';
    protected $primaryKey = 'id';

    protected $allowedFields = ['phone', 'code', 'accouny', 'password'];
}

?>