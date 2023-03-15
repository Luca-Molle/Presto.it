<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    use HasFactory;

    protected $fillable = ['favorites'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function setFavorite($value)
    {
        $this->favorites = $value;
        $this->save();
        return true;
    }
}
