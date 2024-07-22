<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'language',
        'description',
        'keywords',
        'favicon',
        'logo_light',
        'logo_dark',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
    ];

    public static function getValue($attribute)
    {
        $setting = self::first();
        return $setting ? $setting->$attribute : null;
    }

    public static function checkSettings()
    {
        return self::first();
    }
}
