@foreach (['danger', 'warning', 'success', 'info','message','error'] as $msg)
    @if(session()->has($msg))
            layer.msg('{{ session()->get($msg) }}', @if($msg=='error'){icon: 2} @else{icon: 1}@endif);
    @endif
@endforeach