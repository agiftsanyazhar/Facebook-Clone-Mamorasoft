<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Post extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the like for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function like(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all of the comment for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all of the share for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function share(): HasMany
    {
        return $this->hasMany(Share::class);
    }

    public function countLike(): int
    {
        return $this->like()->count();
    }

    public function countComment(): int
    {
        return $this->comment()->count();
    }

    /**
     * Count Share for the post
     */
    public function countShare(): int
    {
        return $this->share()->count();
    }
}
