@foreach (['danger', 'warning', 'success', 'info','message'] as $msg)
    @if(session()->has($msg))

            layer.msg('{{ session()->get($msg) }}', {icon: 1});
    @endif
@endforeach