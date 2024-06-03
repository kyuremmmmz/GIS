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
        'teamname',
        'points'];

    public function player_ranking()
    {
        return $this->belongsTo(players::class);
    }


}
