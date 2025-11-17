<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the parent category that this sub-category belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
