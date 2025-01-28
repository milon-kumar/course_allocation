<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function batchCoordinator () {
        return $this->belongsTo(User::class,'coordinator');
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }
}
