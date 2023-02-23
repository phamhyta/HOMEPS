<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'email',
        'password',
        'created_at',
        'updated_at',
        'remember_token',
        'deleted_by',
    ];
    public $timestamps = true;
}
