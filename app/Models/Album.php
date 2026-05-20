<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }

    public function Artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }
}
