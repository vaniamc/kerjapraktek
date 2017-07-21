@extends('layouts.index')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/magnific-popup.css')}}">
@stop

@section('content')
	<!-- main content -->
	<!-- main content -->
	<section class="ot-section-a">
		<div class="jumbotron jumbotron-billboard">
		  <div class="img"></div>
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
						<h2 class="section-title-header">Telkom Corporate University News Center</h2>

		                <!-- <p>
		                    Lorem ipsum is the best
		                </p> -->
		            </div>
		        </div>
		    </div>
		</div>

	</section>



	<section class="ot-section-b">
		<!-- container -->
		<div class="container">
			<!-- latest posts section -->
			<h1 class="section-title"><span><a href="{{url('gallery')}}"><i class="fa fa-reply"></i> Back</a></span><i class="fa fa-folder-open"></i>{{$album->album_name}} </h1>
			<div class="ot-slider-b">
				<div class="row row-slider-gutter popup-gallery">
					@foreach($gallery as $key => $row)
					<div class="col-md-4 slider-item-small">
						<figure class="thumbnail-image">
							<a href="{{asset('images/gallery/'.$row->gallery_path)}}"><img src="{{asset('images/gallery/'.$row->gallery_path)}}" alt="" id="myImg" style="object-fit: cover;"></a>
						</figure>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- /.container -->
	</section>

	<!-- end ot-section-a -->

@stop

@section('js')
<script type="text/javascript" src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script>
	$(document).ready(function() {
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});
});
</script>
@stop