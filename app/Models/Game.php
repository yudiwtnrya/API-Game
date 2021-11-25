<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'realease_on',
        'author_id',
        'gendre_id'
    ];

    public function gendre()
    {
        return $this->belongsTo(Gendre::class);
    }
    
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
