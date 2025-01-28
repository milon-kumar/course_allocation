<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";
    protected $guarded =['id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->department_id = self::generateUniqueID();
        });
    }

    private static function generateUniqueID()
    {
        do {
            // Generate a random 9-digit number
            $uniqueID = mt_rand(100000000, 999999999);
        } while (self::idExists($uniqueID));

        return $uniqueID;
    }

    private static function idExists($id)
    {
        return self::where('department_id', $id)->exists();
    }
}
