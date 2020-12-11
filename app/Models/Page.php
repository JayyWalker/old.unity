<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPage
 */
class Page extends Model
{
    use HasFactory;
    use CamelCasing;

    protected $fillable = [
        'title',
        'description',
        'seo_title',
    ];
}
