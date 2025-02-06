<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the plural of the model name
    protected $table = 'students';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'age',
        'class',
        'address',
        'user_id', // this field is added later to fillable
    ];

    // Optionally specify the attributes that should be hidden for arrays
    protected $hidden = [
        'password',
    ];

    // Specify any default casts for attributes
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
