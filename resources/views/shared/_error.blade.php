@if ($errors->any())
    @foreach ($errors->all() as $error)
        layer.msg('{{ $error }}', {icon: 2});
    @endforeach
@endif