<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price']; 

    public function categories()
    {
        return $this->belongsTo(Category::class); 
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
