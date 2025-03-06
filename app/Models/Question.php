<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Question extends Model
{
    protected $fillable = [
        'survey_id',
        'question_text',
        'type',
        'order',
        'is_required'
    ];

    protected $casts = [
        'is_required' => 'boolean'
    ];

    protected $appends = ['stats'];

    protected $statsData = [];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }

    protected function stats(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->statsData,
            set: fn ($value) => $this->statsData = $value
        );
    }
}
