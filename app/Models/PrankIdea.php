<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrankIdea extends Model
{
    use HasFactory;
    protected $table = 'app_prank_scripts';

    public function categories()
    {
        return $this->belongsToMany(PrankCategory::class,
            'app_prank_scripts_app_categories',
            'app_prank_script_id',
            'app_category_id');
    }
}
