<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =['name', 'parent_id', 'slug'];  //de chua cac ban duoc phep thao tac voi du lieu
}
