<?php

namespace App\Observers;
use App\Models\Link;
class LinkObserver extends BaseObserver
{
    public function saving(Link $link){
        if (empty($link->sort)) {
            $link->sort = 0;
        }
    }
}
