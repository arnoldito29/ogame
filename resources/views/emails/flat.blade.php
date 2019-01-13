@component('mail::message')
    name: {{$name}} <br/>
    size: {{$size}} <br/>
    ad id: {{$id}} <br/>
    price: {{$price}} <br/>
    price diff: {{$diff}} <br/>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent