<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $guarded = ['id'];

    public function teacherDepartment(): BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }


}
