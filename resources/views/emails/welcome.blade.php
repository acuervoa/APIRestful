@component('mail::message')
    # Hola, {{ $user->name }}

    Gracias por crear una cuenta. Por favor verifícala usando el siguiente enlace:

    @component('mail::button', ['url' => route('verify', $user->verification_token)])
        Verificar mail
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
