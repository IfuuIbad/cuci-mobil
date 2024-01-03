<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Membership;
use App\Models\User;



class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that car belongs to
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function memberships(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
