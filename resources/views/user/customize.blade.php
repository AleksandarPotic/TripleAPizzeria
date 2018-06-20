<!DOCTYPE html>
<html>

<head lang="en">
    <title>Pizza Customize</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="nova scotia, halifax, pizza, convenience, restaurant, store, dalhousie university, jubilee Road, donair, triple a" />
    <meta name="descripton" content="Order food online from Triple A Convenience & Pizzeria online menu. Triple A Convenience & Pizzeria Pizza restaurant, services include online order Pizza food, dine in, Pizza food take out, delivery and catering. You can find online coupons, daily specials and customer reviews on our website." />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta name="robots" content="noindex" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="format-detection" content="telephone = no" />
    <link rel="icon" href="{{ asset('/user/image/logic.png') }}">

    <!-- fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lalezar" rel="stylesheet">

    <!--asset-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/costomize.css') }}">


    <link href="{{ asset('user/assets/library/fontawesome/web-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('user/assets/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>

<body>
<div class="container-fluid" id="container">
    @include('user.layouts.header')


    <div class="row">
        <div class="container">
            <form id="form-customize" action="{{ route('customizeUser.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h3 id="caption" class="text-center">{{ $product->name }}</h3>
                        <div class="col-8 offset-2">
                            <p class="text-center">Toppings: {{ $product->descriptions }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @include('admin.layouts.errors.error')
                    </div>
                </div>
                <!--
                <div class="row">
                    <div class="col-12">
                        <h3 id="caption" class="text-center">{{ $product->name }}</h3>
                    </div>
                </div>
                -->
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="descriptions" value="{{ $product->descriptions }}">

                <div class="row">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 offset-lg-2 col-lg-8">
                        <div id="top-line" class="text-center"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 offset-md-2 col-md-8">
                        <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10">
                            <h3 class="text-left orange-text">CRUST TYPE</h3>
                        </div>
                    </div>
                </div>

                <!-- TIPOVI CRUSTA - A -->

                <div class="element-container">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary" style="background-color: #01181E;">
                                <div class="col-1 text-center">
                                    <input name="crust_type" class="form-check-input default-check" type="radio" value="White" id="crust-type1" checked>
                                    <span class="checkmark" onclick="clickRadioCrust(this)"></span>
                                </div>

                                <div class="col-12 text-left">
                                    <label style="color:white;" class="form-check-label labela">White </label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- zatvara se veliko row -->
                </div>

                <div class="element-container">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                <div class="col-1 text-center">
                                    <input name="crust_type" class="form-check-input default-check" type="radio" value="Whole Wheat" id="crust-type2">
                                    <span class="checkmark" onclick="clickRadioCrust(this)"></span>
                                </div>

                                <div class="col-12 text-left">
                                    <label class="form-check-label labela">Whole Wheat </label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- zatvara se veliko row -->
                </div>

                <!-- OVO JE ONAJ VEGANSKI ON CE BUDE NA DISPLAY NONE OSIM ZA MEDIUM PIZZE -->

                <div class="element-container" id="glutenfree">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                <div class="col-1 text-center">
                                    <input name="crust_type" class="form-check-input default-check" type="radio" value="Gluten-free" id="crust-type3">
                                    <span class="checkmark" onclick="clickRadioCrust(this)"></span>
                                </div>

                                <div class="col-12 text-left">
                                    <label class="form-check-label labela">Gluten Free </label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- zatvara se veliko row -->
                </div>

                <!-- VEGANSKI -->

                <div class="row">
                    <div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8" id="line-carry">
                        <div style="padding: -10px;" class="col-xs-12 col-sm-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                            <div id="bottom-line" class="text-center"></div>
                        </div>
                    </div>
                </div>
                <!-- TIPOVI CRUSTA - A KRAJ -->


                <div class="row">
                    <div class="col-12 offset-md-2 col-md-8">
                        <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10">
                            <h3 class="text-left orange-text">CRUST</h3>
                        </div>
                    </div>
                </div>

                <!-- TIPOVI CRUSTA - A -->



                <!-- SAMO CRUST -->

                <div class="element-container">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary" style="background-color: #01181E;">
                                <div class="col-1 text-center">
                                    <input name="crust" class="form-check-input default-check" type="radio" value="Regular" id="crustt1" checked>
                                    <span class="checkmark" onclick="clickRadioCrustt(this)"></span>
                                </div>

                                <div class="col-12 text-left">
                                    <label style="color:white;" class="form-check-label labela">Regular Crust</label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- zatvara se veliko row -->
                </div>

                <div class="element-container">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                <div class="col-1 text-center">
                                    <input name="crust" class="form-check-input default-check" type="radio" value="Thin" id="crustt2">
                                    <span class="checkmark" onclick="clickRadioCrustt(this)"></span>
                                </div>

                                <div class="col-12 text-left">
                                    <label class="form-check-label labela">Thin Crust </label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- zatvara se veliko row -->
                </div>

                <div class="row">
                    <div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8" id="line-carry">
                        <div style="padding: -10px;" class="col-xs-12 col-sm-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                            <div id="bottom-line" class="text-center"></div>
                        </div>
                    </div>
                </div>


                <!-- SAMO CRUST -->



                <div class="row">
                    <div class="col-12 offset-md-2 col-md-8">
                        <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10">
                            <h3 class="text-left orange-text">SIZE</h3>
                        </div>
                    </div>
                </div>

                <div class="element-container" id="size-container1">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                <div class="col-1 text-center">
                                    <input name="size_radio" class="form-check-input default-check size-checked" type="radio" value="small" id="size1" @if($size == 'small') checked @endif>
                                    <input type="hidden" value="{{ $product->small }}">
                                    <span class="checkmark" onclick="clickRadio(this),changePrice('small'),changeTotalPrice()"></span>
                                </div>

                                <div class="col-12 text-left">
                                    <label class="form-check-label labela">Small (9") <span class="cena"> ${{ $product->small }}</span></label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- zatvara se veliko row -->
                </div>

                <div class="element-container" id="size-container2">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                <div class="col-1 text-center">
                                    <input name="size_radio" class="form-check-input default-check size-checked" type="radio" value="medium" id="size2" @if($size == 'medium') checked @endif>
                                    <input type="hidden" value="{{ $product->medium }}">
                                    <span class="checkmark" onclick="clickRadio(this),changePrice('medium'),changeTotalPrice()"></span>
                                </div>

                                <div class="col-12 text-left">
                                    <label class="form-check-label labela">Medium (12") <span class="cena"> ${{ $product->medium }}</span></label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- zatvara se veliko row -->
                </div>

                <div class="element-container" id="size-container3">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                <div class="col-1 text-center">
                                    <input name="size_radio" class="form-check-input default-check size-checked" type="radio" value="large" id="size3" @if($size == 'large') checked @endif>
                                    <input type="hidden" value="{{ $product->large }}">
                                    <span class="checkmark" onclick="clickRadio(this),changePrice('large'),changeTotalPrice()"></span>
                                </div>

                                <div class="col-12 text-left">
                                    <label class="form-check-label labela">Large (16") <span class="cena"> ${{ $product->large }}</span></label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- zatvara se veliko row -->
                </div>

                <div class="element-container" id="size-container4">
                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                <div class="col-1 text-center">
                                    <input name="size_radio" class="form-check-input default-check size-checked" type="radio" value="xlg" id="size4" @if($size == 'xlg') checked @endif>
                                    <input type="hidden" value="{{ $product->xlg }}">
                                    <span class="checkmark" onclick="clickRadio(this),changePrice('xlg'),changeTotalPrice()"></span>
                                </div>

                                <div class="col-12 text-left">
                                    <label class="form-check-label labela">Extra Large (18") <span class="cena"> ${{ $product->xlg }}</span></label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- zatvara se veliko row -->
                </div>
                <!-- TOPINZI -->

                <div class="row">
                    <div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8" id="line-carry">
                        <div style="padding: -10px;" class="col-xs-12 col-sm-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                            <div id="bottom-line" class="text-center"></div>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{ $product->topping_num }}" name="topping_num" id="topping_num">
                <input type="hidden" value="{{ $product->premium_num }}" name="premium_num" id="premium_num">
                <input type="hidden" value="{{ $regular_toppings->customize_price }}" id="regular_small">
                <input type="hidden" value="{{ $regular_toppings->medium_price }}" id="regular_medium">
                <input type="hidden" value="{{ $regular_toppings->large_price }}" id="regular_large">
                <input type="hidden" value="{{ $regular_toppings->xlg_price }}" id="regular_xlg">
                <input type="hidden" value="{{ $premium_toppings->customize_price }}" id="premium_small">
                <input type="hidden" value="{{ $premium_toppings->medium_price }}" id="premium_medium">
                <input type="hidden" value="{{ $premium_toppings->large_price }}" id="premium_large">
                <input type="hidden" value="{{ $premium_toppings->xlg_price }}" id="premium_xlg">

                <input type="hidden" name="total_price" id="total_price" value="">
                <input type="hidden" name="bonus" value="0">
                <input type="hidden" name="used_points" value="0">

                    <!-- SIREVI TOPINZI -->

                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 hoveref" onclick="openCheese()">
                                <h3 class="text-left orange-text">CHEESE<span id="open-close-plus">+</span></h3>
                            </div>
                        </div>
                    </div>

                    <div id="cheese-category">
                        @foreach($customizes as $customize)
                            @if($customize->customize_category == 'Cheeses' and $customize->regular_premium == 'regular')
                                <div class="element-container" id="{{ $customize->id }}-cheeses-{{ $customize->name }}">
                                    <div class="row">
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                                <div class="col-1 text-center">
                                                    <input name="topping-name" class="form-check-input default-check cheese-checked topping-c" type="checkbox" value="{{ $customize->name }}" id="{{ $customize->name }}cheeses{{ $customize->id }}"
                                                    @foreach($product->customizes as $pro_cu)
                                                        @if($pro_cu->id == $customize->id)
                                                            checked
                                                            @endif
                                                        @endforeach>
                                                    @foreach($product->customizes as $pro_cu)
                                                        @if($pro_cu->id == $customize->id)
                                                            <input type="hidden" id="noTopping{{ $customize->name }}" name="noTopping[]" value="">
                                                            <input type="hidden" name="noToppingId[]" value="{{ $customize->id }}">
                                                        @endif
                                                    @endforeach
                                                    <span class="checkmark" onclick="clickInput(this),changeTotalPrice()"></span>
                                                </div>

                                                <div class="col-5 text-left">
                                                    <label class="form-check-label labela">{{ $customize->name }} <span class="cena current_cena" @foreach($product->customizes as $pro_cu) @if($pro_cu->id == $customize->id) style="display:none;" @endif @endforeach>
                                                            @if($size == 'small')
                                                                ${{ number_format($customize->customize_price,2) }}
                                                            @elseif($size == 'medium')
                                                                ${{ number_format($customize->medium_price,2) }}
                                                            @elseif($size == 'large')
                                                                ${{ number_format($customize->large_price,2) }}
                                                            @elseif($size == 'xlg')
                                                                ${{ number_format($customize->xlg_price,2) }}
                                                            @endif</span></label>
                                                </div>

                                                <div class="col-xs-4 offset-sm-2 col-sm-4 offset-md-2 col-md-4 offset-lg-2 col-lg-4 text-center">
                                                    <span class="customize">Customize<span class="plus-minus">+</span></span> <!-- echo u customize isti kao i ID dropId -->
                                                </div>
                                                <input class="counter" type="hidden" value="0">
                                            </div>
                                        </div>
                                    </div> <!-- zatvara se veliko row -->

                                    <div class="row"> <!--BROJ IZ BAZE, BROJ TOPINGA -->
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center drop">
                                                <div style="padding-top: 20px;" class="form-group">
                                                    <span class="plain-select"></span>
                                                    <select class="form-control sel1" name="cheeses_name[]" disabled="" id="{{ $customize->name }}">
                                                        <option value="{{ $customize->name }} (Full)">Full Pizza</option>
                                                        <option value="{{ $customize->name }} (Right)">Right Half</option>
                                                        <option value="{{ $customize->name }} (Left)">Left Half</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($customize->customize_category == 'Cheeses' and $customize->regular_premium == 'premium')
                                <div class="element-container" id="{{ $customize->id }}-cheeses-{{ $customize->name }}">
                                    <div class="row">
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                                <div class="col-1 text-center">
                                                    <input name="topping-name" class="form-check-input default-check cheese-checked topping-p" type="checkbox" value="{{ $customize->name }}" id="{{ $customize->name }}cheeses{{ $customize->id }}"
                                                    @foreach($product->customizes as $pro_cu)
                                                        @if($pro_cu->id == $customize->id)
                                                            checked
                                                            @endif
                                                        @endforeach>
                                                    @foreach($product->customizes as $pro_cu)
                                                        @if($pro_cu->id == $customize->id)
                                                            <input type="hidden" id="noTopping{{ $customize->name }}" name="noTopping[]" value="">
                                                            <input type="hidden" name="noToppingId[]" value="{{ $customize->id }}">
                                                        @endif
                                                    @endforeach
                                                    <span class="checkmark" onclick="clickInput(this),changeTotalPrice()"></span>
                                                </div>

                                                <div class="col-5 text-left">
                                                    <label class="form-check-label labela">{{ $customize->name }} <span class="cena premium_cena" @foreach($product->customizes as $pro_cu) @if($pro_cu->id == $customize->id) style="display:none;" @endif @endforeach>
                                                            @if($size == 'small')
                                                                ${{ number_format($customize->customize_price,2) }}
                                                            @elseif($size == 'medium')
                                                                ${{ number_format($customize->medium_price,2) }}
                                                            @elseif($size == 'large')
                                                                ${{ number_format($customize->large_price,2) }}
                                                            @elseif($size == 'xlg')
                                                                ${{ number_format($customize->xlg_price,2) }}
                                                            @endif</span></label>
                                                </div>

                                                <div class="col-xs-4 offset-sm-2 col-sm-4 offset-md-2 col-md-4 offset-lg-2 col-lg-4 text-center">
                                                    <span class="customize">Customize<span class="plus-minus">+</span></span> <!-- echo u customize isti kao i ID dropId -->
                                                </div>
                                                <input class="counter" type="hidden" value="0">
                                            </div>
                                        </div>
                                    </div> <!-- zatvara se veliko row -->

                                    <div class="row"> <!--BROJ IZ BAZE, BROJ TOPINGA -->
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center drop">
                                                <div style="padding-top: 20px;" class="form-group">
                                                    <span class="plain-select"></span>
                                                    <select class="form-control sel1" name="cheeses_name[]" disabled="" id="{{ $customize->name }}">
                                                        <option value="{{ $customize->name }} (Full)">Full Pizza</option>
                                                        <option value="{{ $customize->name }} (Right)">Right Half</option>
                                                        <option value="{{ $customize->name }} (Left)">Left Half</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>


                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center" id="middle-line1">
                            </div>
                        </div>
                    </div>
                    <!-- /SIREVI TOPINZI -->
                    <!-- MESA TOPINZI -->

                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8" >
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 hoveref" onclick="openMeat()">
                                <h3 class="text-left orange-text">MEATS<span id="open-close-plus1">+</span></h3>
                            </div>
                        </div>
                    </div>

                    <div id="meat-category">
                        @foreach($customizes as $customize)
                            @if($customize->customize_category == 'Meats' and $customize->regular_premium == 'regular')
                                <div class="element-container" id="{{ $customize->id }}-meats-{{ $customize->name }}">
                                    <div class="row">
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                                <div class="col-1 text-center">
                                                    <input name="topping-name" class="form-check-input default-check topping-c" type="checkbox" value="{{ $customize->name }}" id="{{ $customize->name }}meats{{ $customize->id }}"
                                                           @foreach($product->customizes as $pro_cu)
                                                            @if($pro_cu->id == $customize->id)
                                                            checked
                                                            @endif
                                                            @endforeach>
                                                    <span class="checkmark" onclick="clickInput(this),changeTotalPrice()"></span>
                                                    @foreach($product->customizes as $pro_cu)
                                                        @if($pro_cu->id == $customize->id)
                                                            <input type="hidden" id="noTopping{{ $customize->name }}" name="noTopping[]" value="">
                                                            <input type="hidden" name="noToppingId[]" value="{{ $customize->id }}">
                                                        @endif
                                                    @endforeach
                                                </div>

                                                <div class="col-5 text-left">
                                                    <label class="form-check-label labela">{{ $customize->name }} <span class="cena current_cena" @foreach($product->customizes as $pro_cu) @if($pro_cu->id == $customize->id) style="display:none;" @endif @endforeach>
                                                            @if($size == 'small')
                                                                ${{ number_format($customize->customize_price,2) }}
                                                            @elseif($size == 'medium')
                                                                ${{ number_format($customize->medium_price,2) }}
                                                            @elseif($size == 'large')
                                                                ${{ number_format($customize->large_price,2) }}
                                                            @elseif($size == 'xlg')
                                                                ${{ number_format($customize->xlg_price,2) }}
                                                            @endif</span></label>
                                                </div>

                                                <div class="col-xs-4 offset-sm-2 col-sm-4 offset-md-2 col-md-4 offset-lg-2 col-lg-4 text-center">
                                                    <span class="customize">Customize<span class="plus-minus">+</span></span> <!-- echo u customize isti kao i ID dropId -->
                                                </div>
                                                <input class="counter" type="hidden" value="0">
                                            </div>
                                        </div>
                                    </div> <!-- zatvara se veliko row -->

                                    <div class="row"> <!--BROJ IZ BAZE, BROJ TOPINGA -->
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center drop">
                                                <div style="padding-top: 20px;" class="form-group">
                                                    <span class="plain-select"></span>
                                                    <select class="form-control sel1" name="meats_name[]" disabled="" id="{{ $customize->name }}">
                                                        <option value="{{ $customize->name }} (Full)">Full Pizza</option>
                                                        <option value="{{ $customize->name }} (Right)">Right Half</option>
                                                        <option value="{{ $customize->name }} (Left)">Left Half</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($customize->customize_category == 'Meats' and $customize->regular_premium == 'premium')
                                <div class="element-container" id="{{ $customize->id }}-meats-{{ $customize->name }}">
                                    <div class="row">
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                                <div class="col-1 text-center">
                                                    <input name="topping-name" class="form-check-input default-check topping-p" type="checkbox" value="{{ $customize->name }}" id="{{ $customize->name }}meats{{ $customize->id }}"
                                                           @foreach($product->customizes as $pro_cu)
                                                            @if($pro_cu->id == $customize->id)
                                                            checked
                                                            @endif
                                                            @endforeach>
                                                    <span class="checkmark" onclick="clickInput(this),changeTotalPrice()"></span>
                                                    @foreach($product->customizes as $pro_cu)
                                                        @if($pro_cu->id == $customize->id)
                                                            <input type="hidden" id="noTopping{{ $customize->name }}" name="noTopping[]" value="">
                                                            <input type="hidden" name="noToppingId[]" value="{{ $customize->id }}">
                                                        @endif
                                                    @endforeach
                                                </div>

                                                <div class="col-5 text-left">
                                                    <label class="form-check-label labela">{{ $customize->name }} <span class="cena premium_cena" @foreach($product->customizes as $pro_cu) @if($pro_cu->id == $customize->id) style="display:none;" @endif @endforeach>
                                                            @if($size == 'small')
                                                                ${{ number_format($customize->customize_price,2) }}
                                                            @elseif($size == 'medium')
                                                                ${{ number_format($customize->medium_price,2) }}
                                                            @elseif($size == 'large')
                                                                ${{ number_format($customize->large_price,2) }}
                                                            @elseif($size == 'xlg')
                                                                ${{ number_format($customize->xlg_price,2) }}
                                                            @endif</span></label>
                                                </div>

                                                <div class="col-xs-4 offset-sm-2 col-sm-4 offset-md-2 col-md-4 offset-lg-2 col-lg-4 text-center">
                                                    <span class="customize">Customize<span class="plus-minus">+</span></span> <!-- echo u customize isti kao i ID dropId -->
                                                </div>
                                                <input class="counter" type="hidden" value="0">
                                            </div>
                                        </div>
                                    </div> <!-- zatvara se veliko row -->

                                    <div class="row"> <!--BROJ IZ BAZE, BROJ TOPINGA -->
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center drop">
                                                <div style="padding-top: 20px;" class="form-group">
                                                    <span class="plain-select"></span>
                                                    <select class="form-control sel1" name="meats_name[]" disabled="" id="{{ $customize->name }}">
                                                        <option value="{{ $customize->name }} (Full)">Full Pizza</option>
                                                        <option value="{{ $customize->name }} (Right)">Right Half</option>
                                                        <option value="{{ $customize->name }} (Left)">Left Half</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                    </div>

                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center" id="middle-line2">
                            </div>
                        </div>
                    </div>
                <!-- /MESA TOPINZI -->
                <!-- POVRCE TOPINZI -->

                    <div class="row">
                        <div class="col-12 offset-md-2 col-md-8">
                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 hoveref" onclick="openVeggie()">
                                <h3 class="text-left orange-text">VEGGIES<span id="open-close-plus2">+</span></h3>
                            </div>
                        </div>
                    </div>

                    <div id="veggie-category">
                        @foreach($customizes as $customize)
                            @if($customize->customize_category == 'Veggies' and $customize->regular_premium == 'regular')
                                <div class="element-container" id="{{ $customize->id }}-veggies-{{ $customize->name }}">
                                    <div class="row">
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                                <div class="col-1 text-center">
                                                    <input name="topping-name" class="form-check-input default-check topping-c" type="checkbox" value="{{ $customize->name }}" id="{{ $customize->name }}veggies{{ $customize->id }}"
                                                           @foreach($product->customizes as $pro_cu)
                                                           @if($pro_cu->id == $customize->id)
                                                           checked
                                                            @endif
                                                            @endforeach>
                                                    <span class="checkmark" onclick="clickInput(this),changeTotalPrice()"></span>

                                                    @foreach($product->customizes as $pro_cu)
                                                        @if($pro_cu->id == $customize->id)
                                                            <input type="hidden" id="noTopping{{ $customize->name }}" name="noTopping[]" value="">
                                                            <input type="hidden" name="noToppingId[]" value="{{ $customize->id }}">
                                                        @endif
                                                    @endforeach
                                                </div>

                                                <div class="col-5 text-left">
                                                    <label class="form-check-label labela">{{ $customize->name }} <span class="cena current_cena" @foreach($product->customizes as $pro_cu) @if($pro_cu->id == $customize->id) style="display:none;" @endif @endforeach>
                                                            @if($size == 'small')
                                                                ${{ number_format($customize->customize_price,2) }}
                                                            @elseif($size == 'medium')
                                                                ${{ number_format($customize->medium_price,2) }}
                                                            @elseif($size == 'large')
                                                                ${{ number_format($customize->large_price,2) }}
                                                            @elseif($size == 'xlg')
                                                                ${{ number_format($customize->xlg_price,2) }}
                                                            @endif</span></label>
                                                </div>

                                                <div class="col-xs-4 offset-sm-2 col-sm-4 offset-md-2 col-md-4 offset-lg-2 col-lg-4 text-center">
                                                    <span class="customize">Customize<span class="plus-minus">+</span></span> <!-- echo u customize isti kao i ID dropId -->
                                                </div>
                                                <input class="counter" type="hidden" value="0">
                                            </div>
                                        </div>
                                    </div> <!-- zatvara se veliko row -->

                                    <div class="row"> <!--BROJ IZ BAZE, BROJ TOPINGA -->
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center drop">
                                                <div style="padding-top: 20px;" class="form-group">
                                                    <span class="plain-select"></span>
                                                    <select class="form-control sel1" name="veggies_name[]" disabled="" id="{{ $customize->name }}">
                                                        <option value="{{ $customize->name }} (Full)">Full Pizza</option>
                                                        <option value="{{ $customize->name }} (Right)">Right Half</option>
                                                        <option value="{{ $customize->name }} (Left)">Left Half</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($customize->customize_category == 'Veggies' and $customize->regular_premium == 'premium')
                                <div class="element-container" id="{{ $customize->id }}-veggies-{{ $customize->name }}">
                                    <div class="row">
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center primary">
                                                <div class="col-1 text-center">
                                                    <input name="topping-name" class="form-check-input default-check topping-p" type="checkbox" value="{{ $customize->name }}" id="{{ $customize->name }}veggies{{ $customize->id }}"
                                                           @foreach($product->customizes as $pro_cu)
                                                           @if($pro_cu->id == $customize->id)
                                                           checked
                                                            @endif
                                                            @endforeach>
                                                    <span class="checkmark" onclick="clickInput(this),changeTotalPrice()"></span>

                                                    @foreach($product->customizes as $pro_cu)
                                                        @if($pro_cu->id == $customize->id)
                                                            <input type="hidden" id="noTopping{{ $customize->name }}" name="noTopping[]" value="">
                                                            <input type="hidden" name="noToppingId[]" value="{{ $customize->id }}">
                                                        @endif
                                                    @endforeach
                                                </div>

                                                <div class="col-5 text-left">
                                                    <label class="form-check-label labela">{{ $customize->name }} <span class="cena premium_cena" @foreach($product->customizes as $pro_cu) @if($pro_cu->id == $customize->id) style="display:none;" @endif @endforeach>
                                                            @if($size == 'small')
                                                                ${{ number_format($customize->customize_price,2) }}
                                                            @elseif($size == 'medium')
                                                                ${{ number_format($customize->medium_price,2) }}
                                                            @elseif($size == 'large')
                                                                ${{ number_format($customize->large_price,2) }}
                                                            @elseif($size == 'xlg')
                                                                ${{ number_format($customize->xlg_price,2) }}
                                                            @endif</span></label>
                                                </div>

                                                <div class="col-xs-4 offset-sm-2 col-sm-4 offset-md-2 col-md-4 offset-lg-2 col-lg-4 text-center">
                                                    <span class="customize">Customize<span class="plus-minus">+</span></span> <!-- echo u customize isti kao i ID dropId -->
                                                </div>
                                                <input class="counter" type="hidden" value="0">
                                            </div>
                                        </div>
                                    </div> <!-- zatvara se veliko row -->

                                    <div class="row"> <!--BROJ IZ BAZE, BROJ TOPINGA -->
                                        <div class="col-12 offset-md-2 col-md-8">
                                            <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center drop">
                                                <div style="padding-top: 20px;" class="form-group">
                                                    <span class="plain-select"></span>
                                                    <select class="form-control sel1" name="veggies_name[]" disabled="" id="{{ $customize->name }}">
                                                        <option value="{{ $customize->name }} (Full)">Full Pizza</option>
                                                        <option value="{{ $customize->name }} (Right)">Right Half</option>
                                                        <option value="{{ $customize->name }} (Left)">Left Half</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                <div class="row">
                    <div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8" id="line-carry">
                        <div style="padding: -10px;" class="col-xs-12 col-sm-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                            <div style="margin-top: 5px;" id="bottom-line" class="text-center"></div>
                        </div>
                    </div>
                </div>

                <!-- POVRCE TOPINZI -->
                <!-- TOPINZI KRAJ -->

                <div class="row">
                    <div class="col-12 offset-md-2 col-md-8">
                        <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10">
                            <h3 class="text-left orange-text kek">SPECIAL INSTRUCTIONS</h3>
                        </div>
                    </div>
                </div>

                <div id="special-category">
                    <div class="element-container" id="one-special">
                        <div class="row">
                            <div class="col-12 offset-md-2 col-md-8">
                                <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10">
                                    <p>This section is for cooking & preparation instructions (like 'well-done'), it is not for adding toppings or sides to your order (like 'extra cheese').<span id="max"> (maximum 80 characters)</span></p>
                                </div>
                                <div class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10">
                                    <div class="form-group">
                                        <textarea name="special_need" class="form-control" id="textarea" rows="3" maxlength="80"></textarea>
                                    </div>
                                </div>
                                <input class="counter" type="hidden" value="0">
                            </div>
                        </div> <!-- zatvara se veliko row -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8" id="line-carry">
                        <div style="padding: -10px;" class="col-xs-12 col-sm-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                            <div style="margin-top: 5px;" id="bottom-line" class="text-center"></div>
                        </div>
                    </div>
                </div>


                <div class="row" style="padding-bottom: 20px;">
                    <div class="col-12 offset-md-2 col-md-8">
                        <div id="add-to-cart" class="col-xs-12 col-md-8 col-md-12 offset-lg-1 col-lg-10 align-items-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 text-right col-sm-3 text-sm-left col-md-3 text-md-center">
                                        <span style="color:white;">Quantity:</span>
                                    </div>
                                    <div class="col-6 text-left col-sm-3 col-md-3 text-md-left">
                                        <input id="quant" onchange="changeTotalPrice()" type="number" name="quantity" min="1" max="10" value="{{ $qty }}">
                                    </div>
                                    <div id="final-price" class="col-12 text-center col-sm-6 text-sm-right col-md-6 text-md-right">
                                        <span style="color:white" id="total_price_t">Current Price: ${{ number_format($qty * $price,2) }} </span>
                                    </div>
                                    <div class="offset-2 col-8  offset-sm-0 col-sm-12" style="padding:7.5px; border-bottom:1px solid white;">
                                    </div>
                                    <div class="col-12 text-center col-sm-6 text-sm-right col-md-6 text-md-left">
                                        <button id="add" type="button" onclick="addToCart()" class="btn btn-default">Add to Your Order<i class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- zatvara se veliko row -->
            </form>
        </div>
    </div>
    @csrf

</div>

@include('user.layouts.footer')

@include('user.layouts.script')

    <script type="text/javascript">
        $(document).ready(function () {

            $("input[name='topping-name']").each( function () {

                if($(this).is(':checked')){
                    var id = $(this).attr('id');
                    var fullId = "#" + id;
                    $(fullId).click();
                    $(fullId).click();

                    var val = $(this).attr('value');

                    $("select[id="+val+"]").prop('disabled', false);

                    var mainDivName = $(this).parents('.element-container').attr('id');
                    var fullmainDivName = "#" + mainDivName;

                    $(fullmainDivName+ ' .primary').css('background-color', '#01181E');
                    $(fullmainDivName+ ' .customize').css('display', 'block');
                    $(fullmainDivName+ ' .labela').css('color','white');
                }

                $(fullmainDivName+ ' .customize').click(function(){

                    var counter = $(fullmainDivName+ ' .counter');

                    var parsedValue = parseInt(counter.attr('value'));

                    if(parsedValue%2==0){
                        $(fullmainDivName+ ' .drop').css('display', 'flex');
                        $(fullmainDivName+ ' .plus-minus').text("-");
                    }

                    else{
                        $(fullmainDivName+ ' .drop').css('display','none');
                        $(fullmainDivName+ ' .plus-minus').text("+");
                    }
                    parsedValue++;

                    $(counter).val(parsedValue);

                });
            });

            $("input[name='size_radio']").each( function () {

                if($(this).is(':checked')){
                    var id = $(this).attr('id');
                    var fullId = "#" + id;
                    $(fullId).click();
                    $(fullId).click();

                    var mainDivName = $(this).parents('.element-container').attr('id');
                    var fullmainDivName = "#" + mainDivName;

                    $(fullmainDivName+ ' .primary').css('background-color', '#01181E');
                    $(fullmainDivName+ ' .customize').css('display', 'block');
                    $(fullmainDivName+ ' .labela').css('color','white');
                }

                if($('#size2').is(':checked')){
                    $('#glutenfree').css('display','block');
                }
            });
        });
    </script>

    <script>

        function clickInputSauce(div){
            var link = $(div).closest(":has(div input)").find('input');
            var value = ($(link).attr("value"));
            console.log(link);

            var id = ($(link).attr("id"));
            var fullId = "#" + id;

            var mainDivName = $(div).parents('.element-container').attr('id');
            var fullmainDivName = "#" + mainDivName;


            if (!($(fullId).is(':checked'))) {
                $(fullId).click();
                console.log("cekirano" + value);
                $(fullmainDivName+ ' .primary').css('background-color', '#01181E');
                $(fullmainDivName+ ' .customize').css('display', 'block');
                $(fullmainDivName+ ' .labela').css('color','white');
            }
            else if($(fullId).is(':checked')){
                $(fullId).click();
                console.log("odcekirano" + value);
                $(fullmainDivName+ ' .primary').css('background-color', 'white');
                $(fullmainDivName+ ' .customize').css('display', 'none');
                $(fullmainDivName+ ' .labela').css('color','#01181E');
            }
        }


        function clickInput(div){
            var link = $(div).closest(":has(div input)").find('input');
            var value = ($(link).attr("value"));
            console.log(link);

            var id = ($(link).attr("id"));
            var fullId = "#" + id;

            var mainDivName = $(div).parents('.element-container').attr('id');
            var fullmainDivName = "#" + mainDivName;


            if (!($(fullId).is(':checked'))) {
                $(fullId).click();
                console.log("cekirano" + value);
                $("#noTopping"+ value).val("");
                $(fullmainDivName+ ' .primary').css('background-color', '#01181E');
                $(fullmainDivName+ ' .customize').css('display', 'block');
                $(fullmainDivName+ ' .labela').css('color','white');
                $("select[id="+value+"]").prop('disabled', false);
            }
            else if($(fullId).is(':checked')){
                $(fullId).click();
                console.log("odcekirano" + value);
                $("#noTopping"+ value).val("NO "+value);
                $(fullmainDivName+ ' .primary').css('background', 'white');
                $(fullmainDivName+ ' .customize').css('display', 'none');
                $(fullmainDivName+ ' .labela').css('color','#01181E');
                $(fullmainDivName+ ' .drop').css('display','none');
                $(fullmainDivName+ ' .plus-minus').text("+");
                $("select[id="+value+"]").prop('disabled', 'disabled');
            }

            $(fullmainDivName+ ' .customize').click(function(){

                var counter = $(fullmainDivName+ ' .counter');

                var parsedValue = parseInt(counter.attr('value'));

                if(parsedValue%2==0){
                    $(fullmainDivName+ ' .drop').css('display', 'flex');
                    $(fullmainDivName+ ' .plus-minus').text("-");
                }

                else{
                    $(fullmainDivName+ ' .drop').css('display','none');
                    $(fullmainDivName+ ' .plus-minus').text("+");
                }
                parsedValue++;

                $(counter).val(parsedValue);

            });
        }

        function clickRadio(div){
            var link = $(div).closest(":has(div input)").find('input');
            var value = ($(link).attr("value"));
            console.log(link);

            var id = ($(link).attr("id"));
            var fullId = "#" + id;


            if (!($(fullId).is(':checked'))) {
                $(fullId).click();

            }
            else if($(fullId).is(':checked')){
                $(fullId).click();
            }

            if($('#size1').is(":checked")){
                $('#size1').closest(":has(div label)").find('label').css('color','white');
                $('#size1').parents('.primary').css('background-color','#01181E');
                $('#size2').parents('.primary').css('background','white');
                $('#size3').parents('.primary').css('background','white');
                $('#size4').parents('.primary').css('background','white');
                $('#size2').closest(":has(div label)").find('label').css('color','#01181E');
                $('#size3').closest(":has(div label)").find('label').css('color','#01181E');
                $('#size4').closest(":has(div label)").find('label').css('color','#01181E');
            }
            else if($('#size2').is(":checked")){
                $('#size2').parents('.primary').css('background-color', '#01181E');
                $('#size2').closest(":has(div label)").find('label').css('color','white');
                $('#size1').parents('.primary').css('background','white');
                $('#size3').parents('.primary').css('background','white');
                $('#size4').parents('.primary').css('background','white');
                $('#size1').closest(":has(div label)").find('label').css('color','#01181E');
                $('#size3').closest(":has(div label)").find('label').css('color','#01181E');
                $('#size4').closest(":has(div label)").find('label').css('color','#01181E');
            }
            else if($('#size3').is(":checked")){
                $('#size3').parents('.primary').css('background-color', '#01181E');
                $('#size3').closest(":has(div label)").find('label').css('color','white');
                $('#size1').parents('.primary').css('background','white');
                $('#size2').parents('.primary').css('background','white');
                $('#size4').parents('.primary').css('background','white');
                $('#size2').closest(":has(div label)").find('label').css('color','#01181E');
                $('#size1').closest(":has(div label)").find('label').css('color','#01181E');
                $('#size4').closest(":has(div label)").find('label').css('color','#01181E');
            }
            else if($('#size4').is(":checked")){
                $('#size4').parents('.primary').css('background-color', '#01181E');
                $('#size4').closest(":has(div label)").find('label').css('color','white');
                $('#size1').parents('.primary').css('background','white');
                $('#size3').parents('.primary').css('background','white');
                $('#size2').parents('.primary').css('background','white');
                $('#size2').closest(":has(div label)").find('label').css('color','#01181E');
                $('#size3').closest(":has(div label)").find('label').css('color','#01181E');
                $('#size1').closest(":has(div label)").find('label').css('color','#01181E');
            }

            var neededDiv = $('#crust-type1').closest(":has(div span)").find('.checkmark');

            if($('#size2').is(':checked')){
                $('#glutenfree').css('display','block');
            }
            else if(!($('#size2').is(':checked')) && ($('#crust-type3').is(':checked'))){
                $('#glutenfree').css('display','none');
                $(neededDiv).click();
            }
            else if(!($('#size2').is(':checked'))){
                $('#glutenfree').css('display','none');
                $(fullId).click();
            }
        }

        function clickRadioCrust(div){
            var link = $(div).closest(":has(div input)").find('input');
            var value = ($(link).attr("value"));
            console.log(link);

            var id = ($(link).attr("id"));
            var fullId = "#" + id;

            if (!($(fullId).is(':checked'))) {
                $(fullId).click();
            }
            else if($(fullId).is(':checked')){
                $(fullId).click();
            }

            if($('#crust-type1').is(":checked")){
                $('#crust-type1').parents('.primary').css('background','#01181E');
                $('#crust-type1').closest(":has(div label)").find('label').css('color','white');
                $('#crust-type2').parents('.primary').css('background','white');
                $('#crust-type3').parents('.primary').css('background','white');
                $('#crust-type2').closest(":has(div label)").find('label').css('color','#01181E');
                $('#crust-type3').closest(":has(div label)").find('label').css('color','#01181E');
            }
            else if($('#crust-type2').is(":checked")){
                $('#crust-type2').parents('.primary').css('background','#01181E');
                $('#crust-type2').closest(":has(div label)").find('label').css('color','white');
                $('#crust-type1').parents('.primary').css('background','white');
                $('#crust-type3').parents('.primary').css('background','white');
                $('#crust-type1').closest(":has(div label)").find('label').css('color','#01181E');
                $('#crust-type3').closest(":has(div label)").find('label').css('color','#01181E');
            }
            else if($('#crust-type3').is(":checked")){
                $('#crust-type3').parents('.primary').css('background','#01181E');
                $('#crust-type3').closest(":has(div label)").find('label').css('color','white');
                $('#crust-type1').parents('.primary').css('background','white');
                $('#crust-type2').parents('.primary').css('background','white');
                $('#crust-type2').closest(":has(div label)").find('label').css('color','#01181E');
                $('#crust-type1').closest(":has(div label)").find('label').css('color','#01181E');
            }
        }

        function clickRadioCrustt(div){
            var link = $(div).closest(":has(div input)").find('input');
            var value = ($(link).attr("value"));
            console.log(link);

            var id = ($(link).attr("id"));
            var fullId = "#" + id;

            if (!($(fullId).is(':checked'))) {
                $(fullId).click();
            }
            else if($(fullId).is(':checked')){
                $(fullId).click();
            }

            if($('#crustt1').is(":checked")){
                $('#crustt1').parents('.primary').css('background','#01181E');
                $('#crustt1').closest(":has(div label)").find('label').css('color','white');
                $('#crustt2').closest(":has(div label)").find('label').css('color','#01181E');
                $('#crustt2').parents('.primary').css('background','white');
            }
            else if($('#crustt2').is(":checked")){
                $('#crustt2').parents('.primary').css('background','#01181E');
                $('#crustt2').closest(":has(div label)").find('label').css('color','white');
                $('#crustt1').closest(":has(div label)").find('label').css('color','#01181E');
                $('#crustt1').parents('.primary').css('background','white');
            }
        }

        var counter1 = 0;
        var counter2 = 0;
        var counter3 = 0;
        var counter4 = 0;
        var counter5 = 0;


        function openCheese(){
            if(counter1%2==0){
                $('#cheese-category').css('display','block');
                $('#middle-line1').css('display','block');
                $('#open-close-plus').text("-");
            }
            else{
                $('#cheese-category').css('display','none');
                $('#middle-line1').css('display','none');
                $('#open-close-plus').text("+");
            }

            counter1++;
        }

        function openMeat(){
            if(counter2%2==0){
                $('#meat-category').css('display','block');
                $('#middle-line2').css('display','block');
                $('#open-close-plus1').text("-");
            }
            else{
                $('#meat-category').css('display','none');
                $('#middle-line2').css('display','none');
                $('#open-close-plus1').text("+");
            }

            counter2++;
        }

        function openVeggie(){
            if(counter3%2==0){
                $('#veggie-category').css('display','block');
                $('#middle-line3').css('display','block');
                $('#open-close-plus2').text("-");
                $('#open-close-plus2').css('font-size','30px');
            }
            else{
                $('#veggie-category').css('display','none');
                $('#middle-line3').css('display','none');
                $('#open-close-plus2').text("+");
            }

            counter3++;
        }

        function openSauces(){
            if(counter4%2==0){
                $('#sauces-category').css('display','block');
                $('#open-close-plus3').text("-");
                $('#open-close-plus3').css('font-size','30px');
            }
            else{
                $('#sauces-category').css('display','none');
                $('#open-close-plus3').text("+");
            }

            counter4++;
        }


        function openSpecial(){
            if(counter5%2==0){
                $('#special-category').css('display','block');
                $('#open-close-plus4').text("-");
                $('#open-close-plus4').css('font-size','30px');
            }
            else{
                $('#special-category').css('display','none');
                $('#open-close-plus4').text("+");
            }

            counter5++;
        }




        function changePrice(size) {

            var regular_topping = $("#regular_"+ size).val();
            var premium_topping = $("#premium_"+ size).val();
            $(".current_cena").each(function () {
                $(this).html('$'+parseFloat(regular_topping).toFixed(2));
            });
            $(".premium_cena").each(function () {
                $(this).html('$'+parseFloat(premium_topping).toFixed(2));
            });
        }
        
        function changeTotalPrice() {
            //broj sireva
            var x = $(".cheese-checked:checked").length;
            //broj cekiranih regular topping
            var z = $(".topping-c:checked").length;
            //broj cekiranih premium topping
            var p = $(".topping-p:checked").length;
            //broj cekiranih regular toppinga na pocetku
            var y = $("#topping_num").val();
            //broj cekiranih premium toppinga na pocetku
            var p_checked = $("#premium_num").val();


            var size = $(".size-checked:checked").val();
            var price = $(".size-checked:checked").next().val();

            var regular_topping = $("#regular_"+ size).val();
            var premium_topping = $("#premium_"+ size).val();

            $("#current_cena").text(regular_topping);
            $("#premium_cena").text(premium_topping);

            if (z <= parseInt(y)) {
                var totalPrice1 = 0;
            } else {
                var p_regular = z - parseInt(y);
                var totalPrice1 = parseFloat(regular_topping) * parseInt(p_regular);
            }

            if (p <= parseInt(p_checked)) {
                var totalPrice2 = 0;
            }else {
                var p_premium = p - parseInt(p_checked);
                var totalPrice2 = parseFloat(premium_topping) * parseInt(p_premium);
            }

            var totalPrice = parseFloat(totalPrice1) + parseFloat(totalPrice2) + parseFloat(price);

            var qty = $("#quant").val();

            var FinishPrice = qty * totalPrice;

            $("#total_price_t").text('Current Price: $' +parseFloat(FinishPrice).toFixed(2));
        }

        function addToCart() {
            //broj sireva
            var x = $(".cheese-checked:checked").length;
            //broj cekiranih regular topping
            var z = $(".topping-c:checked").length;
            //broj cekiranih premium topping
            var p = $(".topping-p:checked").length;
            //broj cekiranih regular toppinga na pocetku
            var y = $("#topping_num").val();
            //broj cekiranih premium toppinga na pocetku
            var p_checked = $("#premium_num").val();

            //console.log(parseInt(z));

            var size = $(".size-checked:checked").val();
            var price = $(".size-checked:checked").next().val();

            if (x == 0) {
                alert('Pizza must contain one cheese!');
                return false;
            } else if (z + p > 10) {
                alert('Pizza can contain up to ten toppings!');
                return false;
            }

            var regular_topping = $("#regular_"+ size).val();
            var premium_topping = $("#premium_"+ size).val();

            $("#current_cena").text(regular_topping);
            $("#premium_cena").text(premium_topping);

            if (z <= parseInt(y)) {
                var totalPrice1 = 0;
            } else {
                var p_regular = z - parseInt(y);
                var totalPrice1 = parseFloat(regular_topping) * parseInt(p_regular);
            }

            if (p <= parseInt(p_checked)) {
                var totalPrice2 = 0;
            }else {
                var p_premium = p - parseInt(p_checked);
                var totalPrice2 = parseFloat(premium_topping) * parseInt(p_premium);
            }

            var totalPrice = parseFloat(totalPrice1) + parseFloat(totalPrice2) + parseFloat(price);

            $("#total_price").val(totalPrice);

            var qty = $("#quant").val();

            if (qty > 10) {
                alert('The quantity can not be higher than 10!');
                return false;
            } else if (qty < 1) {
                alert('The quantity can not be less than 1!');
                return false;
            }

            $("#form-customize").submit();
        }

    </script>