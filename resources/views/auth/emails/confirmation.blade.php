{{ $link = url('confirmation', $remember_token) }}
Click here to reset your password: <a href="{!! url('confirmation/'.$remember_token) !!}"> {{ $link }} </a>
