<?php

namespace App\Observers;
use App\Models\Nav;
class NavsObserver extends BaseObserver
{
    public function saving(Nav $navs){
        if (empty($navs->sort) || !is_numeric($navs->sort)) {
            $navs->sort = 0;
        }
    }
}
