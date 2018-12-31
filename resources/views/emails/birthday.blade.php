@component('mail::message')
    {{$name}} <br/>
    {{$birthday}} <br/>
    {{$years}} <br/>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent