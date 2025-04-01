<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EventUser extends Model
{
    /** @use HasFactory<\Database\Factories\EventUserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'phone_no', 'event_id'
    ];

    public function events()
    {
        return $this->belongsTo(Event::class);
    }



    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where(function($q){
                $q->where('name', 'like', '%' . request('search')  . '%')
                ->orWhere('phone_no', 'like', '%' . request('search')  . '%');
            });
        }
    }

}
