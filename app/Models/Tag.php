<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Tag extends Model
{
    use SoftDeletes;
    use Cachable;
    protected $table = 'tag';
    protected $fillable = ['name', 'keywords', 'description'];
}
