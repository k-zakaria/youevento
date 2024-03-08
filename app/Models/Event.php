<?php

namespace App\Models;

use CreateUsersTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'date',
        'image',
        'location_id',
        'categorie_id',
        'organisateur_id'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function organisateur()
    {
        return $this->belongsTo(User::class);
    }
}
