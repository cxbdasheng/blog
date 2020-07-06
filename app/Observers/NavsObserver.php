<?php

namespace App\Observers;
use App\Models\Navs;
class NavsObserver extends BaseObserver
{
    public function saving(Navs $navs){
        if (empty($navs->sort) || !is_numeric($navs->sort)) {
            $navs->sort = 0;
        }
    }
}
