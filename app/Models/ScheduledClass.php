<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ScheduledClass extends Model
{
    use HasFactory;

    protected $guarded = null;

    protected $casts = [
        'date_time' => 'datetime'
    ];

    /** 
     * This scheduled class belongs to a specific instructor.
     */
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    /**
     * This scheduled class belongs to a class type.
     */
    public function classType(): BelongsTo
    {
        return $this->belongsTo(ClassType::class);
    }

    /** 
     * This scheduled class belongs to many users/members.
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookings');
    }

    public function scopeUpcoming(Builder $query)
    {
        return $query->where('date_time', '>', now());
    }

    public function scopeNotBooked(Builder $query) 
    {
        return $query->whereDoesntHave('members', function ($query) {
                $query->where('user_id', auth()->user()->id);
            });
    }
}
