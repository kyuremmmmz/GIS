<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class players extends Model
{
    use HasFactory;

    protected $table = 'players';
    protected $fillable = [
        'playerNumber',
        'name',
        'age',
        'teamname',
        ];

    public function postData()
    {
        return $this->hasMany(player_rankings::class);
    }
}
