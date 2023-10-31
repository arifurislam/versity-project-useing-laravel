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
                <h2>Visit Our Video Gallary</h2>
            </div>
            <div class="col-lg-3 mb-4 item student">
                <div class="video-content">
                    <img class="img-fluid" src="{{asset('website/video-gallery/video-thmbnill.png')}}" alt="">
                    <a class="btn-custom video-play my-video-links" data-autoplay="true" data-vbtype="video"
                    href="https://www.youtube.com/watch?v=OiZl7P7NMoE&t=8s&ab_channel=KanonVlogs">Watch Now
                        <span><i class="fa fa-play-circle"></i></span></a>
                </div>
            </div>
            <div class="col-lg-3 mb-4 item student">
                <div class="video-content">
                    <img class="img-fluid" src="{{asset('website/video-gallery/video-thmbnill.png')}}" alt="">
                    <a class="btn-custom video-play my-video-links" data-autoplay="true" data-vbtype="video"
                    href="https://www.youtube.com/watch?v=OiZl7P7NMoE&t=8s&ab_channel=KanonVlogs">Watch Now
                        <span><i class="fa fa-play-circle"></i></span></a>
                </div>
            </div>
            <div class="col-lg-3 mb-4 item student">
                <div class="video-content">
                    <img class="img-fluid" src="{{asset('website/video-gallery/video-thmbnill.png')}}" alt="">
                    <a class="btn-custom video-play my-video-links" data-autoplay="true" data-vbtype="video"
                    href="https://www.youtube.com/watch?v=OiZl7P7NMoE&t=8s&ab_channel=KanonVlogs">Watch Now
                        <span><i class="fa fa-play-circle"></i></span></a>
                </div>
            </div>
            <div class="col-lg-3 mb-4 item student">
                <div class="video-content">
                    <img class="img-fluid" src="{{asset('website/video-gallery/video-thmbnill.png')}}" alt="">
                    <a class="btn-custom video-play my-video-links" data-autoplay="true" data-vbtype="video"
                    href="https://www.youtube.com/watch?v=OiZl7P7NMoE&t=8s&ab_channel=KanonVlogs">Watch Now
                        <span><i class="fa fa-play-circle"></i></span></a>
                </div>
            </div>
            <div class="col-lg-3 mb-3 item student">
                <div class="video-content">
                    <img class="img-fluid" src="{{asset('website/video-gallery/video-thmbnill.png')}}" alt="">
                    <a class="btn-custom video-play my-video-links" data-autoplay="true" data-vbtype="video"
                    href="https://www.youtube.com/watch?v=OiZl7P7NMoE&t=8s&ab_channel=KanonVlogs">Watch Now
                        <span><i class="fa fa-play-circle"></i></span></a>
                </div>
            </div>
            <div class="col-lg-3 mb-3 item student">
                <div class="video-content">
                    <img class="img-fluid" src="{{asset('website/video-gallery/video-thmbnill.png')}}" alt="">
                    <a class="btn-custom video-play my-video-links" data-autoplay="true" data-vbtype="video"
                    href="https://www.youtube.com/watch?v=OiZl7P7NMoE&t=8s&ab_channel=KanonVlogs">Watch Now
                        <span><i class="fa fa-play-circle"></i></span></a>
                </div>
            </div>
            <div class="col-lg-3 mb-3 item student">
                <div class="video-content">
                    <img class="img-fluid" src="{{asset('website/video-gallery/video-thmbnill.png')}}" alt="">
                    <a class="btn-custom video-play my-video-links" data-autoplay="true" data-vbtype="video"
                    href="https://www.youtube.com/watch?v=OiZl7P7NMoE&t=8s&ab_channel=KanonVlogs">Watch Now
                        <span><i class="fa fa-play-circle"></i></span></a>
                </div>
            </div>
            <div class="col-lg-3 mb-3 item student">
                <div class="video-content">
                    <img class="img-fluid" src="{{asset('website/video-gallery/video-thmbnill.png')}}" alt="">
                    <a class="btn-custom video-play my-video-links" data-autoplay="true" data-vbtype="video"
                    href="https://www.youtube.com/watch?v=OiZl7P7NMoE&t=8s&ab_channel=KanonVlogs">Watch Now
                        <span><i class="fa fa-play-circle"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
{{-- <a class="my-video-links" > --}}

@push('js')
<script src="{{asset('website/venobox/venobox.min.js')}}"></script>
<script>
    new VenoBox({
        selector: '.my-video-links',
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
