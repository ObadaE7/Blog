<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'slug',
        'content',
        'status',
    ];

    public function imageable(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'likable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner()
    {
        return User::find($this->user_id);
    }

    public function ownerFullName()
    {
        return $this->owner()->fname . ' ' .  $this->owner()->lname;
    }

    public function ownerAvatar()
    {
        return $this->owner()->imageable != null ? $this->owner()->imageable->url : null;
    }

    public function ownerAvatarSubtle()
    {
        return Str::upper(Str::substr($this->owner()->fname, 0, 1) . Str::substr($this->owner()->lname, 0, 1));
    }

    public function getDateForHumans()
    {
        Carbon::setLocale('ar');
        return $this->created_at->isoFormat('Do MMMM, YYYY');
    }

    public function isReactedByUser($userId, $type)
    {
        return $this->reactions()->where('user_id', $userId)->where('type', $type)->exists();
    }

    public function isLikedByUser($userId)
    {
        return $this->isReactedByUser($userId, 1);
    }

    public function isDislikedByUser($userId)
    {
        return $this->isReactedByUser($userId, 0);
    }
}
