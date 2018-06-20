@if($first_name)
    First Name: {{ $first_name }} <br>
    Last Name: {{ $last_name }} <br>
    Email: {{ $email }} <br><br>
    @endif
{!!  htmlspecialchars_decode($body) !!}