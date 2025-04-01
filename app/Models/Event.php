<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'details',
        'email',
        'date',
        'time',
        'phone_no',
        'speaker',
        'speaker_image',
        'type',
        'price',
        'seat',
        'hall',
        'progress',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function eventusers(){
        return $this->hasMany(EventUser::class);
    }


    public function scopeFilter($query, array $filters){

       if($filters['search']  ?? false){
        $query->where( function($q){
            $q->where('title', 'like' ,'%' .  request('search') . '%' )
            ->orWhere('speaker', 'like',  '%'  . request('search') . '%');
        });
       }
        
    }

}
