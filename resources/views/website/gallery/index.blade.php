@extends('layouts.website')
@section('title','gallery-photos')
@push('css')
<link rel="stylesheet" href="{{asset('website/venobox/venobox.min.css')}}">
@endpush
@section('contents')


<div class="offcanvas-overly"></div>

<main>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 my-4">
                <h2>Visit Our Gallary</h2>
            </div>
            <div class="col-lg-12 mb-5">
                <ul class="photo-gallary">
                    <li data-filter="*" class="active">Show All</li>
                    <li data-filter=".academic">Academic-Gallery</li>
                    <li data-filter=".student">Student-Gallery</li>
                    <li data-filter=".campus">Campus</li>
                </ul>
            </div>
        </div>
        <div class="item-details mb-5 row">
            <div class="col-lg-3 mb-3 item student">
                <a class="my-image-links" data-gall="gallery01"
                    href="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/1.jpeg')}}">
                    <img class="img-fluid"
                        src="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/1.jpeg')}}"
                        alt="student-1">
                </a>
            </div>
            <div class="col-lg-3 mb-3 item student">
                <a class="my-image-links" data-gall="gallery01"
                    href="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/2.jpeg')}}">
                    <img class="img-fluid"
                        src="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/2.jpeg')}}"
                        alt="student-2">
                </a>
            </div>
            <div class="col-lg-3 mb-3 item student">
                <a class="my-image-links" data-gall="gallery01"
                    href="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/3.jpeg')}}">
                    <img class="img-fluid"
                        src="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/3.jpeg')}}"
                        alt="student-3">
                </a>
            </div>
            <div class="col-lg-3 mb-3 item student">
                <a class="my-image-links" data-gall="gallery01"
                    href="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/4.jpg')}}">
                    <img class="img-fluid"
                        src="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/4.jpg')}}"
                        alt="student-4">
                </a>
            </div>
            {{-- end of student --}}
            <div class="col-lg-3 mb-3 item campus">
                <a class="my-image-links" data-gall="gallery01"
                    href="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/3-Campus/1.jpg')}}">
                    <img class="img-fluid" src="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/3-Campus/1.jpg')}}"
                        alt="student-4" alt="campus-1">
                </a>
            </div>
            <div class="col-lg-3 mb-3 item campus">
                <a class="my-image-links" data-gall="gallery01"
                    href="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/3-Campus/2.jpg')}}">
                    <img class="img-fluid" src="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/3-Campus/2.jpg')}}"
                        alt="student-4" alt="campus-2">
                </a>
            </div>
            <div class="col-lg-3 mb-3 item campus">
                <a class="my-image-links" data-gall="gallery01"
                    href="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/3-Campus/3.jpg')}}">
                    <img class="img-fluid" src="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/3-Campus/3.jpg')}}"
                        alt="student-4" alt="campus-3">
                </a>
            </div>
            <div class="col-lg-3 mb-3 item campus">
                <a class="my-image-links" data-gall="gallery01"
                    href="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/3-Campus/4.jpg')}}">
                    <img class="img-fluid" src="{{asset('website/src/7-Gallery/1-Photos/GALLERY LIST/3-Campus/4.jpg')}}"
                        alt="student-4" alt="campus-4">
                </a>
            </div>
        </div>
    </div>
    </div>
</main>


@push('js')
<script src="{{asset('website/venobox/venobox.min.js')}}"></script>
<script>
    new VenoBox({
        selector: '.my-image-links',
        numeration: true,
        infinigall: true,
        share: true,
        spinner: 'rotating-plane'
    });

    // init Isotope
    var $grid = $('.item-details').isotope({
        // options
    });
    // filter items on button click
    $('.photo-gallary').on('click', 'li', function () {
        var filterValue = $(this).attr('data-filter');
        $('.photo-gallary li').removeClass('active');
        $(this).addClass('active');
        $grid.isotope({
            filter: filterValue
        });
    });

</script>
@endpush
@endsection
