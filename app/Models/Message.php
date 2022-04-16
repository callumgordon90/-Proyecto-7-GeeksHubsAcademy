<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'party_id',
        'message',
    ];

    // Attributes which are hidden from view: 
    
    protected $hidden = [
        'user_id',
        'party_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}
