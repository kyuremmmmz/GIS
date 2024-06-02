<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class players extends Model
{
    use HasFactory;

    protected $table = 'players';
    protected $fillable = [
        'id',
        'name',
        'age',
        'teamname',
        ];

    public function postData():HasMany
    {
        return $this->hasMany(player_rankings::class);
    }
}
