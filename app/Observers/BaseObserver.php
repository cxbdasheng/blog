<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/19
 * Time: 21:23
 */

namespace App\Observers;


class BaseObserver
{
    public function created($model)
    {
        push_success('添加成功！');
    }

    public function updated($model)
    {
        if(! $model->isDirty('deleted_at')){
            push_success('更新成功！');
        }
    }

    public function deleted($model)
    {
        if ($model->isForceDeleting()) {
            push_success('彻底删除成功！');
        } else {
            push_success('删除成功！');
        }
    }

    public function restored($model)
    {
        push_success('恢复成功！');
    }
}