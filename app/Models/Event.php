<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'location',
        'date',
        'user_id',
    ];

    /**
     * Get the user that owns the event.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_event_attendees', 'event_id', 'user_id')->withTimestamps();
    }
}
