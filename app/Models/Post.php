<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = [];

    /**
     * Post belongs to a user
     *
     * @return belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get short description for the post
     *
     * @return string
     */
    public function getShortDescriptionAttribute()
    {
        if (strlen($this->description) < 120) {
            return $this->description;
        }

        return Str::limit($this->description, 120, '...');
    }
}
