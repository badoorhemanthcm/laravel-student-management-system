<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'age',
        'gender',
        'report_teacher'
    ];

    public function mark() { 

	  return $this->hasMany('App\Models\Mark','student_id');

	}  
}
