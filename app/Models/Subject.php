<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $guarded = ['id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function curriculum() {
        return $this->belongsTo(Curriculum::class);
    }

    public function semester(){
        return $this->belongsTo(Semester::class);
    }
}
