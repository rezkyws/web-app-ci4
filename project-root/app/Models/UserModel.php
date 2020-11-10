<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Defining the table name
    protected $table = 'users';

    // Allowing to add these fields in database
    protected $allowedFields = ['username', 'password'];
}
