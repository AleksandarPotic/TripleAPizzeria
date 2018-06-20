@if(count($errors) >0)
    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
@endif
@if(session()->has('message'))
    <p class="alert alert-success">{{ session('message') }}</p>
@endif
@if(session()->has('message1'))
    <p class="alert alert-danger">{{ session('message1') }}</p>
@endif
@if(session()->has('message2'))
    <p class="alert alert-warning">{{ session('message2') }}</p>
@endif
@if(session()->has('message3'))
    <p class="alert alert-info">{{ session('message3') }}</p>
@endif
