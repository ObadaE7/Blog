<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'article_id', 'user_id', 'comment'];

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
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
}
