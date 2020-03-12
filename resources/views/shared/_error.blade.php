@if ($errors->any())
    <script>
        layui.use(['layer','form'],function () {
                @foreach ($errors->all() as $error)
                    layer.msg('{{ $error }}');
                @endforeach
            });
    </script>
@endif