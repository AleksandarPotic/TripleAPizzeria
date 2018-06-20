@if(count($errors) >0)
    @foreach($errors->all() as $error)
        <p class="alert alert-danger">Email and password are invalid!</p>
    @endforeach
@endif