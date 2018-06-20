@extends('user.layouts.app')

@section('body-part')

    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-12" id="image-one">
                    <img class="img-fluid" src="{{ asset('user/image/povrcke1.png') }}">
                </div>

                <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="product-box">
                    <h1 class="text-center"><b>TERMS AND CONDITIONS</b></h1><br>
                    <h5 class="text-center">PLEASE READ THE FOLLOWING TERMS AND CONDITIONS CAREFULLY. ACCESS TO AND USE OF THIS SITE IS PROVIDED SUBJECT TO THESE TERMS AND CONDITIONS. USE OF THIS SITE CONSTITUTES YOUR ACCEPTANCE OF THE TERMS AND CONDITIONS CONTAINED HEREIN. IF YOU DO NOT AGREE TO THESE TERMS AND CONDITIONS YOU SHOULD NOT USE THIS SITE IN ANY MANNER. </h5><br>
                    <p class="text-center">This site is operated by Triple A Convenience & Pizzeria and the following terms and conditions ("Terms and Conditions") govern your use of this site. Triple A Convenience & Pizzeria reserves the right, in its sole discretion, to change or modify all or any part of this Agreement at any time. Your use and continued use of the site constitutes your binding acceptance of this Agreement, including any changes or modifications made by Triple A as permitted above. If at any time this Agreement becomes unacceptable to you, you should immediately cease all use of this site. </p><br><br>
                    <h5 class="text-center"><b>RESTRICTION OF LIABILITY</b></h5><br>
                    <p class="text-center">Triple A Convenience & Pizzeria is not liable for any damages or injuries arising from the use of this site, caused by, including but not limited to, any error, failure in operation, inaccuracy, omission, interruption in service, delays in operation of transmission, computer virus, or failure to process your request.</p>
                    <p class="text-center">Under no circumstances shall Triple A Convenience & Pizzeria, or the website designers be liable for any damages resulting from the use of this site, including without limitation, indirect, special, consequential, incidental or punitive losses, damages or expenses or lost revenues. </p><br><br>
                    <h5 class="text-center"><b>RESTRICTIONS ON USE</b></h5><br>
                    <p class="text-center">Except as stated herein, all information and materials contained in this site including the design of this site, the text, graphics, logos, images, and icons are the sole property of Triple A Convenience & Pizzeria. You may not re-use anything from this site on any other website or publication.</p><br><br>
                    <h5 class="text-center"><b>WARRANTY DISCLAIMER</b></h5><br>
                    <p class="text-center">The information provided may include technical inaccuracies or typographical errors. Triple A Convenience & Pizzeria may make changes or improvements at any time. YOU AGREE THAT YOUR USE OF THE TRIPLE A CONVENIENCE & PIZZERIA WEBSITE SHALL BE AT YOUR SOLE RISK. TO THE FULLEST EXTENT PERMITTED BY LAW, TRIPLE A CONVENIENCE & PIZZERIA DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH THIS WEBSITE AND YOUR USE OF THIS WEBSITE. TRIPLE A CONVENIENCE & PIZZERIA MAKES NO WARRANTIES OR GUARANTEES CONCERNING THE ACCURACY OR COMPLETENESS OF THIS SITE'S CONTENT AND ASSUMES NO LIABILITY OR RESPONSIBILITY FOR ANY ERRORS, MISTAKES, OR INACCURACIES OF CONTENT; ANY INTERRUPTION OR LOSS OF ACCESS TO OR FROM OUR WEBSITE, AND ANY FAILURE TO DELIVER DUE TO LOST OR UNDELIVERED ORDER EMAILS; ANY BUGS, VIRUSES, OR OTHER MALICIOUS SOFTWARE WHICH MAY BE TRANSMITTED VIA OUR WEBSITE BY ANY THIRD PARTY; ANY UNAUTHORIZED ACCESS TO OR USE OF PERSONAL INFORMATION STORED WITHIN THE SYSTEM.</p><br><br>
                    <h5 class="text-center"><b>CONTACT US</b></h5><br>
                    <p class="text-center">For more information about our privacy practices or terms and conditions, or if you have any questions, or if you would like to make a complaint, please contact us by e-mail at info@tripleapizzeria.ca.</p>
                </div>

                <div class="col-12 text-center" id="image-two">
                    <img class="img-fluid" src="{{ asset('user/image/povrcke2.png') }}">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('title-part')
    <title>Terms And Conditions</title>
@show
@section('script-part')
    
@endsection