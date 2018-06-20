@extends('user.layouts.app')

@section('body-part')

    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-12" id="image-one">
                    <img class="img-fluid" src="{{ asset('user/image/povrcke1.png') }}">
                </div>

                <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="product-box">
                    <h1 class="text-center">Thank you for placing your order!</h1><br>
                    <p class="text-center">Please check your email to see exactly how long your food will take. Your order should be ready in 25 minutes for pick-up, and anywhere between 30-45 minutes for delivery. Thanks for ordering from Triple A, enjoy your food!</p>
                </div>

                <div class="col-12 text-center" id="image-two">
                    <img class="img-fluid" src="{{ asset('user/image/povrcke2.png') }}">
                </div>
            </div>
        </div>
    </div>

    @endsection
@section('title-part')
    <title>Thank You</title>
@show
@section('script-part')
    <script>
        $(document).ready(function () {
            window.setTimeout(function() {
                window.location.href = '/';
            }, 5000);
        })
    </script>
    @endsection