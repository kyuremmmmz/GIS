<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class player_rankings extends Model
{
    use HasFactory;

    protected $table = 'player_rankings';

    protected $fillable = [
        'name',
        'playerID',
        'age',
        'teamname',];

    public function player_rankings()
    {
        return $this->belongsTo(players::class);
    }


}
