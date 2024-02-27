<?php

namespace App\Models;

use App\Models\ScheduledClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassType extends Model
{
    use HasFactory;

    public function scheduledClasses(): HasMany
    {
        return $this->hasMany(ScheduledClass::class);
    }
}
