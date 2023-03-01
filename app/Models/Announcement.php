<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use PhpParser\Node\Stmt\Static_;

class Announcement extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['title', 'description', 'price'];

    public function toSearchableArray()
    {
        $category = $this->category;
        $array = [
            'id' =>$this->id,
            'title' =>$this->title,
            'description' =>$this->description,
            'category' => $category,
        ];
        return $array;
    }




    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function toBeRevisionedCounter()
    {
        return Announcement::where('is_accepted', null)->count();
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
}
