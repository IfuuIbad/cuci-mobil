<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Car;

class Membership extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * The roles that belong to the user.
     */
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class, 'car_member');
    }
}
