@extends('layouts.body')
@section('title', '第三方登录列表')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <a href="javascript:void(0)">
                    <li class="layui-this">第三方登录列表
                    </li>
                </a>
            </ul>
            <div class="layui-tab-content"></div>
        </div>

        <div class="layui-tab-content">
            <form action="" class="layui-form">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input id="boxCode" name="name" placeholder="Socialite 名称" class="layui-input" type="text"
                                       value="{{$name}}" maxlength="50"></div>
                        </div>
                        <div class="layui-inline">
                            <a href="{{url('admin/socialiteClient/index')}}" class="layui-btn">重置</a>
                            <button id="btnSubmit" type="submit" class="layui-btn">查询</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="layui-table">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>Socialite 名称</th>
                    <th>Client Id</th>
                    <th>Client Secret</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $index => $items)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$items->name}}</td>
                        <td>{{$items->client_id}}</td>
                        <td>{{$items->client_secret}}</td>
                        <td>
                            <a class="layui-btn layui-btn-xs" href="{{url('admin/socialiteClient/edit/'.$items->id)}}">修改</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    {{ $data->links('layouts.page') }}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        layui.use('laypage', function () {
            layer.ready(function () {
                var laypage = layui.laypage;
                        @include('shared._error')
                        @include('shared._messages')
                var name = "{{old('title')}}";
                //执行一个laypage实例
                laypage.render({
                    elem: 'page' //注意，这里的 test1 是 ID，不用加 # 号
                    , count: {{$data->total()}}
                    , curr:{{$data->currentPage()}}
                    , limit:{{$data->perPage()}}
                    , layout: ['prev', 'page', 'next', 'limit', 'count', 'skip']
                    , jump: function (obj, first) {
                        if (!first) {
                            if (name) {
                                window.location.href = "?page=" + obj.curr + "&limit=" + obj.limit + "&name=" + name;
                            } else {
                                window.location.href = "?page=" + obj.curr + "&limit=" + obj.limit;
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
