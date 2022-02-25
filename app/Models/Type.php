<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * jobs relation a type can have many jobs
     *
     * @return BelongsToMany
     */
    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class);
    }
}
