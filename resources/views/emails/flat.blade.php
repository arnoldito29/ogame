@component('mail::message')
    name: {{$name}} <br/>
    size: {{$size}} <br/>
    ad id: {{$id}} <br/>
    price: {{$price}} <br/>
    price diff: {{$diff}} <br/>
    link: <a href='https://www.aruodas.lt{{$link}}'>Link</a> <br/>
    @if($other->count()>0)
        Kiti pasiulymai: <br/>
        @foreach($other as $item)
            {{$item->full_name}}: <a href="https://www.aruodas.lt{{$item->link}}">Link</a> <br/>
        @endforeach
    @endif
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent