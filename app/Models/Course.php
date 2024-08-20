<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasNanoId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    use HasNanoId;

    protected $guarded = [];

    public function revisions(): HasMany
    {
        return $this->hasMany(CourseRevisions::class, 'course_id');
    }

    public function latestRevision(): HasOne
    {
        return $this->hasOne(CourseRevisions::class)->latestOfMany('updated_at');
    }

    public function scopeWithLatestRevision(Builder $query): Builder
    {
        return $query->with('latestRevision');
    }
}
