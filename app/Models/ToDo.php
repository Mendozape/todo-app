<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'to_dos';
    protected $fillable = ['task','endDate','status','priority','progress','notes'];
}
