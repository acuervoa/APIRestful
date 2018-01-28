@component('mail::message')
    # Hola, {{ $user->name }}

    Has cambiado tu correo electrónico. Por favor verifíca la nueva dirección usando el siguiente enlace:

    @component('mail::button', ['url' => route('verify', $user->verification_token)])
        Verificar mail
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
