<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Str;

class Category extends Model
{
    use SoftDeletes,Cachable;
    protected $table = 'categories';
    protected $fillable = ['name', 'keywords', 'description', 'sort'];

    public function articles()
    {
        return $this->hasOne(Articles::class);
    }
}
