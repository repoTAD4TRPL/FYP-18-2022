@component('mail::message')
# Thanks for your registration

Click below to activate your account.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/verify/{{ $param }}'])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
