@extends('user.layouts.app')

@section('body-part')

    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-12" id="image-one">
                    <img class="img-fluid" src="{{ asset('user/image/povrcke1.png') }}">
                </div>

                <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="product-box">
                    <h1 class="text-center"><b>TRIPLE A PRIVACY POLICY</b></h1><br>
                    <p class="text-center">Triple A Convenience & Pizzeria is committed to protecting your Personal Information. This Privacy Policy describes how your personal information is collected, used, and stored when you visit or place an order online from www.tripleapizzeria.ca.</p><br><br>
                    <h5 class="text-center"><b>PERSONAL INFORMATION WE COLLECT</b></h5><br>
                    <p class="text-center">We only collect information that is needed to place an order online such as your name, address, email, and phone number. If you are a Triple A Member, we also collect and store your credit card information for faster checkout. Your name and phone number are needed in case we need to ask you a question or resolve a problem with your order. We use your email either to respond to online inquiries from our Contact page, to let you know how long your order will take, or to notify you of any special deals we may have.  </p><br><br>
                    <h5 class="text-center"><b>HOW IS MY INFORMATION STORED?</b></h5><br>
                    <p class="text-center">We store the Personal Information you provide in our secure computer database and have specific security measures in place to protect your information. We do not share any of your personal information with anyone outside Triple A, except for the purpose of processing transactions on our site.  </p>
                    <p class="text-center">If you do not wish to have your Personal Information stored, please send us an email at info@tripleapizzeria.ca. </p><br><br>
                    <h5 class="text-center"><b>COOKIES</b></h5><br>
                    <p class="text-center">Triple A Convenience & Pizzeria uses cookies to enhance your experience on the website by saving your Personal Information so you do not have to re-enter it each time you visit the site. </p><br><br>
                    <h5 class="text-center"><b>THIRD-PARTY SITES</b></h5><br>
                    <p class="text-center">Triple A Convenience & Pizzeria offers links to third-party websites that are not operated by Triple A. Triple A Convenience & Pizzeria is not responsible for the policies and practices of other websites, you may visit them at your own discretion.  </p><br><br>
                    <h5 class="text-center"><b>CANADA’S ANTI-SPAM LEGISLATION</b></h5><br>
                    <p class="text-center">Triple A Convenience & Pizzeria complies with Canada’s Anti-Spam Legislation (CASL). We will always provide you with the option to opt-in to receive email communications from us. At any time, you may opt-out from our email communications by un-checking the opt-in box located in your Triple A account.  </p><br><br>
                    <h5 class="text-center"><b>CHANGES</b></h5><br>
                    <p class="text-center">We may update this privacy policy from time to time. Any changes to the Privacy Policy will take effect immediately upon any changes to this website. This Privacy Policy was last reviewed on April 23rd, 2018. </p>
                </div>

                <div class="col-12 text-center" id="image-two">
                    <img class="img-fluid" src="{{ asset('user/image/povrcke2.png') }}">
                </div>
            </div>
        </div>
    </div>

    @endsection
@section('title-part')
    <title>Privacy Policy</title>
@show
@section('script-part')
    
@endsection