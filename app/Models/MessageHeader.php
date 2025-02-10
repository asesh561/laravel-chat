<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageHeader extends Model
{
    use HasFactory;
    // Specify the table name
    protected $table = 'message_header';

    // Define the fillable fields for mass assignment
    protected $fillable = ['chat_id', 'user1', 'user2', 'date','user1_id','user2_id'];
}
