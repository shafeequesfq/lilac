<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'user';

    protected $fillable = [
        'name',
        'fk_department',
        'fk_designation',
        'phone_number',
        'created_at',
    ];

    // Define relationship with Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'fk_department');
    }

    // Define relationship with Designation
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'fk_designation');
    }
}
