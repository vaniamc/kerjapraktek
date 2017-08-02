@extends('layouts.index')

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
			<!-- slaider -->
			<h4 class="section-title"><span>Telkom Corporate University</span>Gallery</h4>
			<div class="slider">
				<div class="row row-slider-gutter">
					@if(count($album) < 1)
						<center><h4 style="color: #B81D1D">There is no album</h4></center>
					@else
						@foreach($album as $key => $row)
						<div class="col-md-4 slider-item-small">
							<figure class="thumbnail-image">
								<a href="{{url('gallery',$row->album_id)}}">
									@if(count($row->gallery) < 1)
										<img src="{{asset('images/demo/720x720-2.jpg')}}" alt="" style="object-fit: cover;">
									@else
										<img src="{{asset('images/gallery/'.$row->gallery[0]->gallery_path)}}" alt="" style="object-fit: cover;">
									@endif
								</a>
								<figcaption>
									<h2><a href="{{url('gallery',$row->album_id)}}">{{$row->album_name}}</a></h2>
									<div class="post-meta">
										<?php
	                                        $y = substr($row->created_at, 0, 4);
	                                        $m = substr($row->created_at, 5, 2);
	                                        $d = substr($row->created_at, 8, 2);
	                                    ?>
										<span>{{$d}}/{{$m}}/{{$y}}</span>
									</div>
								</figcaption>
							</figure>
						</div>
						@endforeach
					@endif
				</div>

			</div>


			<!-- end slaider -->
		</div>

		<!-- end container -->
	</section>


	<!-- end ot-section-a -->

@stop
