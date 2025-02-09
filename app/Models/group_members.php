<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_members extends Model
{
    use HasFactory;
    protected $fillable = ['group_id','user_name','user_id','group_name'];

}
