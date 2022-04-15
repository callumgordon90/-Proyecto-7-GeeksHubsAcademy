<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'game_id',
    ];

    //a parameter which is concealed from view:
    protected $hidden = [
        'user_id',
    ];

    // the user who made the party
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    // the users who belong to the party
    public function members()
    {
        return $this->hasMany(Member::class, 'party_id');
    }

    // messages which are sent to the party
    public function messages()
    {
        return $this->hasMany(Message::class, 'party_id');
    }

    // belongs to game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    // find a relevant party by game id
    public static function findByGame($game_id)
    {
        return Party::where('game_id', $game_id)->get();
    }


}
