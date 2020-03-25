<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/25
 * Time: 20:01
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Time;
use App\Http\Requests\TimeRequest;
class TimeController extends Controller
{
    public function index(Request $request, Time $time)
    {
        $limit = $request->limit ? $request->limit : 20;
        $data = $time->withTrashed()->where('type',1)->orderBy('id', 'desc')->paginate($limit);
        return view('admin.time.index', compact('data'));
    }

    public function create(Time $data)
    {
        return view('admin/time/create_and_edit', compact('data'));
    }

    public function store(TimeRequest $request, Time $time)
    {
        $time->fill($request->except('_token'));
        $time->save();
        return redirect('admin/time/index');
    }

    public function edit($id, Time $time)
    {
        $data = $time->withTrashed()->find($id);
        return view('admin.time.create_and_edit', compact('data'));
    }

    public function update(TimeRequest $request, Time $time, $id)
    {
        $time->withTrashed()->find($id)->update($request->except('_token'));
        return back()->withInput();
    }

    public function destroy(Time $time, $id)
    {
        $time->find($id)->delete();
        return redirect('admin/time/index');
    }

    public function restore(Time $time, $id)
    {
        $time->onlyTrashed()->find($id)->restore();
        return redirect('admin/time/index');
    }

    public function forceDelete(Time $time, $id)
    {
        $time->onlyTrashed()->find($id)->forceDelete();
        return redirect('admin/time/index');
    }
}