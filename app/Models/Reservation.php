<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $fillable = ['user_id', 'event_id', 'nombre_places'];
    
    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function evenement()
    {
        return $this->belongsTo(Event::class);
    }
}
