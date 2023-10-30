@extends('layouts.website')
@section('title','contact')
@push('css')
<link rel="stylesheet" href="{{asset('website/sweet-alert/sweet-alert.min.css')}}">
<script src="{{asset('website/sweet-alert/sweetalert.min.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> --}}
@endpush
@section('contents')

<div class="offcanvas-overly"></div>
<!-- offcanvas-end -->
<!-- main-area -->
<main>
    <section class="breadcrumb-area d-flex  p-relative align-items-center"
        style="background-image:url({{asset('website')}}/img//bg/Untitled.png)">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-left">
                        <div class="breadcrumb-title">
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-wrap2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- services-area -->
    <section id="services" class="services-area pt-120 pb-90 fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50 wow fadeInDown animated" data-animation="fadeInDown"
                        data-delay=".4s">
                        <h5><i class="fal fa-graduation-cap"></i> Contact Info</h5>
                        <h2>
                            Get In Touch
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="services-box text-center">
                        <div class="services-icon">
                            <{{asset('website')}}/img/ src="{{asset('website')}}/img//bg/contact-icon01.png"
                                alt="image">
                        </div>
                        <div class="services-content2">
                            <h5><a href="tel:+88-02-41070712">+88-02-41070712</a></h5>
                            <p>Phone Support</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="services-box text-center active">
                        <div class="services-icon">
                            <{{asset('website')}}/img/ src="{{asset('website')}}/img//bg/contact-icon02.png"
                                alt="image">
                        </div>
                        <div class="services-content2">
                            <h5><a href="mailto:brightminds252@gmail.com">brightminds252@gmail.com</a></h5>
                            <p>Email Address</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <div class="services-box text-center">
                        <div class="services-icon">
                            <{{asset('website')}}/img/ src="{{asset('website')}}/img//bg/contact-icon03.png"
                                alt="image">
                        </div>
                        <div class="services-content2">
                            <h5>G.P.O.Box No.5,Dhaka,Bangladesh</h5>
                            <p>Office Address</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="mb-5">Contact With Us</h2>
                </div>
                <div class="col-lg-12">
                    @if(Session::has('success'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "We Will Take Care Of If.",
                            timer: 5000,
                            icon: "success",
                        });
                    </script>
                    @endif
        
                    @if(Session::has('error'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "Message failed.",
                            timer: 5000,
                            icon: "warning",
                        });
                    </script>
                    @endif
                </div>

            </div>

            <form class="row" method="post" action="{{url('/contact/store')}}">
                @csrf
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="mb-2 ms-3">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{old('name')}}"
                            class="form-control {{$errors->has('name')? 'has-error':''}}"
                            placeholder="Enter Your Name...">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback mb-0" role="alert">
                            {{ $errors->first('name') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="mb-2 ms-3">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{old('email')}}"
                            class="form-control {{$errors->has('email')? 'has-error':''}}"
                            placeholder="Enter Your Email Address...">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback mb-0" role="alert">
                            {{ $errors->first('email') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="form-group">
                        <label for="" class="mb-2 ms-3">Contat Number <span class="text-danger">*</span></label>
                        <input type="text" name="number" value="{{old('number')}}"
                            class="form-control {{$errors->has('number')? 'has-error':''}}"
                            placeholder="Enter Your Contact Number...">
                        @if ($errors->has('number'))
                        <span class="invalid-feedback mb-0" role="alert">
                            {{ $errors->first('number') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="form-group">
                        <label for="" class="mb-2 ms-3">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" value="{{old('address')}}"
                            class="form-control {{$errors->has('address')? 'has-error':''}}"
                            placeholder="Enter Your Addres...">
                        @if ($errors->has('address'))
                        <span class="invalid-feedback mb-0" role="alert">
                            {{ $errors->first('address') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="form-group">
                        <label for="" class="mb-2 ms-3">Your Message <span class="text-danger">*</span></label>
                        <textarea name="message"
                            class="form-control textarea-control {{$errors->has('message')? 'has-error':''}}"
                            placeholder="Your Message"></textarea>
                        @if ($errors->has('message'))
                        <span class="invalid-feedback mb-0" role="alert">
                            {{ $errors->first('message') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <div>
                        <button type="submit" class="btn btn-sm btn-success">Submit Now</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    </div>
</main>

@push('js')

@endpush
@endsection
