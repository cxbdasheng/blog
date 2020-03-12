
<div id="page-panel">
    <div id="test1"></div>
</div>
<script>
    layui.use('laypage', function(){
        var laypage = layui.laypage;

        //执行一个laypage实例
        laypage.render({
            elem: 'test1' //注意，这里的 test1 是 ID，不用加 # 号
            ,count: {{$paginator->total()}}
            ,curr:{{$paginator->currentPage()}}
            ,limit:{{$paginator->perPage()}}
            ,layout: [ 'prev', 'page', 'next','limit','count','skip']
            ,jump: function(obj, first){
                if(!first){
                    window.location.href="?page="+obj.curr+"&limit="+obj.limit;
                }
            }
        });
    });
</script>