<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Pricing page</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('subcription/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('subcription/css/color_skins.css') }}">
</head>
<body class="theme-cyan">

    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>


<section class="">
    <div class="">
        <div class="">
           
            <div class="">
                <div class="pricing pricing-palden row">
                    @foreach($all as $package)
                        <div class="pricing-item col-sm-12 col-md-4 col-lg-4 me-1">
                            <div class="pricing-deco pricing-deco l-blush ">
                                <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                    <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                    <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                    <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                    <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                </svg>
                                
                                <div class="pricing-price"><span class="pricing-currency">$</span>{{ $package->price }}
                                <span class="pricing-period">{{$package->interval_count}}/{{$package->billing_method}}</span>
                                </div>
                                <h3 class="pricing-title">{{strtoupper($package->name)}}</h3>
                            </div>
                            <ul class="feature-list">
                                <li>Channels: 50+</li>
                                <li>Video Quality: High Definition(HD)</li>
                                <li>Trial: 7-day free trial</li>
                                <li>Fully Support</li>
                            </ul>

                            <a href="{{ route('plans.checkout', $package->plan_id) }}" class="pricing-action l-amber">Choose plan</a>
                        </div>
                        @endforeach
                </div>
            </div>
           
        </div>
    </div>
</section>
<script src="{{ asset('subcription/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('subcription/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->

<script src="{{ asset('subcription/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->

</body>
</html>





{{-- 
@extends('backend.layout.main')
@section('content')
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif

@section('content')
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('subcription/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('subcription/css/color_skins.css') }}">
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="pricing pricing-palden">
                    @if ($basic)
                        <div class="pricing-item">
                            <div class="pricing-deco l-slategray">
                                <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                </svg>
                                <div class="pricing-price"><span class="pricing-currency">£</span>{{ $basic->price/100 }}
                                <span class="pricing-period">/ mo</span>
                                </div>
                                <h3 class="pricing-title">BASIC</h3>
                            </div>
                            <ul class="feature-list">
                                <li>5GB Disk Space</li>
                                <li>10 Domain Names</li>
                                <li>5 E-Mail Address</li>
                                <li>Fully Support</li>
                            </ul>

                            <a href="{{ route('plans.checkout', $basic->plan_id) }}" class="pricing-action l-amber">Choose plan</a>
                        </div>
                    @endif

                    @if ($professional)
                        <div class="pricing-item pricing__item--featured">
                            <div class="pricing-deco l-blush">
                                <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                </svg>
                                <div class="pricing-price"><span class="pricing-currency">£</span>{{ $professional->price/100 }}
                                <span class="pricing-period">/ mo</span>
                                </div>
                                <h3 class="pricing-title">PROFESSIONAL</h3>
                            </div>
                            <ul class="feature-list">
                                <li>10GB Disk Space</li>
                                <li>20 Domain Names</li>
                                <li>10 E-Mail Address</li>
                                <li>Fully Support</li>
                            </ul>
                            <a href="{{ route('plans.checkout', $professional->plan_id) }}" class="pricing-action l-amber">Choose plan</a>
                        </div>
                    @endif

                    @if ($enterprise)
                        <div class="pricing-item">
                            <div class="pricing-deco l-slategray">
                                <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                </svg>
                                <div class="pricing-price"><span class="pricing-currency">£</span>{{ $enterprise->price/100 }}
                                <span class="pricing-period">/ mo</span>
                                </div>
                                <h3 class="pricing-title">ENTERPRISE</h3>
                            </div>
                            <ul class="feature-list">
                                <li>50GB Disk Space</li>
                                <li>50 Domain Names</li>
                                <li>20 E-Mail Address</li>
                                <li>Fully Support</li>
                            </ul>
                            <a href="{{ route('plans.checkout', $enterprise->plan_id) }}" class="pricing-action l-amber">Choose plan</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<!-- Jquery Core Js -->
<script src="{{ asset('subcription/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('subcription/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->

<script src="{{ asset('subcription/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->


@endpush --}}
