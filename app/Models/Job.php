<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Company relation a job belongs to a company
     *
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }


    /**
     * Type relation a job has one type
     *
     * @return HasOne
     */
    public function type(): HasOne
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }
}
