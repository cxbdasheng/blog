<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/12
 * Time: 23:51
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use App\Models\Articles;
class Praise extends Model
{
    use SoftDeletes,Cachable;
    protected $table = 'praise';

    protected $fillable = ['article_id', 'ip'];
    public function Articles()
    {
        return $this->belongsTo(Articles::class,'article_id');
    }
}