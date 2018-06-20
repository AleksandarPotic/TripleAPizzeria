<!DOCTYPE html>
<html>
<head lang="en">
@include('user.layouts.head')
    @section('head-part')

    @show
</head>
<body>
<div class="container-fluid" id="container">
@include('user.layouts.header')

    @section('body-part')

        @show

</div>
@section('map')

    @show

@include('user.layouts.footer')

@include('user.layouts.script')

    @section('script-part')

        @show

</body>
</html>