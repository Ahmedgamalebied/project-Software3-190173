<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name','code','department','previous','doctor_id'];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }
}
