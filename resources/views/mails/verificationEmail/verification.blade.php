<x-mail::message>
    # Veuillez saisir le code suivant pour vérifier votre email:
    {{$data}}

    Merci,<br>
    {{ config('app.name') }}
</x-mail::message>