<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groups_messages extends Model
{
    use HasFactory;
    protected $fillable = ['chat_id','user','user_id', 'message','group_name', 'file_path'];

}
