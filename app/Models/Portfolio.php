<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order_id',
        'gallery_item_id',
    ];

    public function gallery_items(): HasMany
    {
        return $this->hasMany(GalleryItem::class, 'category_id')->where('category', 'portfolio')->orderBy('order_id');
    }

    public function headline(): HasOne
    {
        return $this->hasOne(GalleryItem::class, 'id', 'gallery_item_id');
    }
}
