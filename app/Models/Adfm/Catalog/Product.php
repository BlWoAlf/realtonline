<?php

namespace App\Models\Adfm\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Adfm\Traits\AttachmentTrait;
use App\Models\Adfm\Traits\Sluggable;
use App\Models\Adfm\File;
use WTolk\Eloquent\Filter;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    use AttachmentTrait;
    use Filter;

    protected $casts = [
        'meta' => 'array',
        'properties' => 'array',
    ];

    protected $fillable = [
        'title',
        'slug',
        'price',
        'square',
        'type',
        'room_count',
        'properties',
        'content',
        'article',
        'meta'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable')
            ->where('model_relation', '=', 'files')->orderBy('sort');
    }

    public function getFormatPriceAttribute()
    {
        $value = number_format($this->price, 0, '.', ' ');
        return $value;
    }

    public function getMinSquareAttribute()
    {
        $square = 1;
        if($this->square == 0){
            return $square;
        }
        else{
            return $this->square;
        }
    }
}
