<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class post extends Model
{
    use HasFactory;
    
    protected $table = 'posts';

    protected $fillable = ['judul', 'isi', 'foto'];

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
