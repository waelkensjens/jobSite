<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * jobs relationShip a company can have many jobs
     *
     * @return HasMany
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    /**
     * City relationShip a company has one city
     *
     * @return HasOne
     */
    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id');
    }
}
