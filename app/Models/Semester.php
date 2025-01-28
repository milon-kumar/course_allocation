<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $table = 'semesters';
    protected $guarded = ['id'];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function curriculum(){
        return $this->belongsTo(Curriculum::class);
    }

    public function Subjects()
    {
        return $this->hasMany(Subject::class);
    }



}
