<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/19
 * Time: 21:23
 */

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class BaseObserver
{
    public function created(Model $model)
    {
        push_success('添加成功！');
    }

    public function updated(Model $model)
    {
        if ($model->isDirty()) {
            push_success('更新成功！');
        } else {
            push_error('没有任何更新！');
        }
    }

    public function deleted(Model $model)
    {
        if ($model->isForceDeleting()) {
            push_success('彻底删除成功！');
        } else {
            push_success('删除成功！');
        }
    }

    public function restored(Model $model)
    {
        push_success('恢复成功！');
    }
}
