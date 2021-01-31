<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrankCategory extends Model
{
    use HasFactory;
    protected $table = 'app_categories';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';


    public function scopeActive($query)
    {
        return $query->where('status', static::STATUS_ACTIVE);
    }

    public function ideas()
    {
        return $this->belongsToMany(PrankIdea::class,
            'app_prank_scripts_app_categories',
            'app_category_id',
            'app_prank_script_id');
    }
}
