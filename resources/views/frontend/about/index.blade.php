@extends('frontend.layouts.master')

@section('title', (getSiteSetting() !== null ? getSiteSetting()->name : '') . '::Room About Page')
@section('title_1')
<h2>More than a hotel... an experience</h2>
<h1 class="mb-3">Hotel for the whole family, all year round.</h1>
@endsection
@section('title_2')
<h2>Harbor Lights Hotel &amp; Resort</h2>
<h1 class="mb-3">It feels like staying in your own home.</h1>
@endsection
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Welcome to
                    {{ getSiteSetting() !== null ? getSiteSetting()->name :'' }}</span>
                <h2 class="mb-4">You'll Never Want To Leave</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-reception-bell"></span>
                        </div>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Friendly Service</h3>
                    </div>
                </div>
            </div>
            <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services active py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-serving-dish"></span>
                        </div>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Get Breakfast</h3>
                    </div>
                </div>
            </div>
            <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-car"></span>
                        </div>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Transfer Services</h3>
                    </div>
                </div>
            </div>
            <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-spa"></span>
                        </div>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Suits &amp; SPA</h3>
                    </div>
                </div>
            </div>
            <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="ion-ios-bed"></span>
                        </div>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Cozy Rooms</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.components.about')
@include('frontend.components.instagram')
@endsection
