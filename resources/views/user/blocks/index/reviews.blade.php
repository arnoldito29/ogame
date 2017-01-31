@if (count($reviews) > 0)
<section class="community">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="landing__h2">{{trans( 'index.Reviews title') }}</h2>
            </div>
            <div class="col-lg-12">
                <div id="myCarousel" class="carousel slide community__carousel" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                    @foreach ( $reviews as $key => $review )
                        @if ( !empty( $review["_name_"] ) && !empty( $review["_text_"] ) )
                        <div class="community__carousel-item item @if ( $key == 0 ) active @endif ">
                            <div class="col-lg-6 col-lg-offset-3 community__carousel-img">
                                <img src="/images/landing/1.png" alt="">
                            </div>
                            <div class="col-lg-6 col-lg-offset-3 community__carousel-name">
                                {{$review["_name_"]}}
                            </div>
                            <div class="col-lg-6 col-lg-offset-3 community__carousel-text">
                                {!!html_entity_decode( $review["_text_"])!!}
                            </div>
                        </div>
                        @endif
                    @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true">
                            <img src="/images/ui/arrow-left-big-green.png" alt="">
                        </span>
                        <span class="sr-only">{{trans( 'index.Previous') }}</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true">
                            <img src="/images/ui/arrow-right-big-green.png" alt="">
                        </span>
                        <span class="sr-only">{{trans( 'index.Next') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif