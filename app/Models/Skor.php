<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    use HasFactory;
    protected $fillable = ['club_id_1', 'club_id_2', 'score_1', 'score_2'];

    public function club1()
    {
        return $this->belongsTo(Klub::class, 'club_id_1');
    }

    public function club2()
    {
        return $this->belongsTo(Klub::class, 'club_id_2');
    }
}
