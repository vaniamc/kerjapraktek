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
						<h4 class="section-title-header">WEEKLY SCHEDULE</h4>
						@if($schedule_week->schedule_link == NULL)
						<iframe style="align-content: center"
								width="1080" height="550" src="https://www.youtube.com/embed/j4NRyWwVtPE?autoplay=1" frameborder="5" allowfullscreen autoplay loop>

						</iframe>
						@else
						<video controls style="width: 100%; height: auto;" autoplay loop>
				        	<source src="{{asset('video/weekly/'.$schedule_week->schedule_link)}}" type="video/mp4">
				        </video>
				        @endif
						<!-- <p>
                            Lorem ipsum is the best
                        </p> -->
					</div>
				</div>
			</div>
		</div>
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="ot-module">
						<!-- classic grid posts section -->
						<h4 class="section-title"><span>Telkom Corporate University</span>MONTHLY SCHEDULE</h4>
						<div class="row">
							<div class="col-md-12">
								@if($schedule_month->schedule_link == NULL)
								<iframe width="720" height="550" src="https://www.youtube.com/embed/nZNOBXBybxg" frameborder="0" allowfullscreen></iframe>
								@else
								<video style="width: 100%; height: auto;" controls>
						        	<source src="{{asset('video/monthly/'.$schedule_month->schedule_link)}}" type="video/mp4">
						        </video>
						        @endif
							</div>

						</div>
					</div>
				</div>
				@include('layouts.sidebar')
			</div>
			<!-- row -->
			<!-- end main content -->
		</div>
		<!-- container -->
	</section>
	<!-- end ot-section-a -->

@stop
