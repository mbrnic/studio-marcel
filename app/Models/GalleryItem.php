<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'category_id',
        'src',
        'alt',
        'order_id',
    ];

    public function about(): BelongsTo
    {
        return $this->belongsTo(About::class, 'category_id');
    }
}
