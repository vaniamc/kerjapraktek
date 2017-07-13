@extends('layouts.index')

@section('content')
	<!-- main content -->
	<section class="ot-section-a">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="content ot-article">
						<h3>Telkom Corporate University</h3>

						<h5>Alamat : Jalan Gegerkalong Hilir no 47, Bandung, 40152<br>
						Lat/Long : -6.871316, 107.589773<br>
						E-mail : helpdesk.learning@telkom.co.id<br>
							Phone : 022 2014508<br>
						Website : https://corpu.telkom.co.id/</h5>

						{{--<div class="ot-social-button">--}}
							{{--<a href="#"><img src="images/line.png" alt=""></a>--}}
							{{--<div class="ot-social-details">--}}
								{{--<div class="ot-social-count">Line</div>--}}
								{{--<div class="ot-social-type">@happytripkorea</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="ot-social-button">--}}
							{{--<a href="https://www.instagram.com/happytripkorea/"><img src="images/instagram.png" alt=""></a>--}}
							{{--<div class="ot-social-details">--}}
								{{--<div class="ot-social-count">Instagram</div>--}}
								{{--<div class="ot-social-type">@happytripkorea</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="ot-social-button">--}}
							{{--<a href="#"><img src="images/whatsapp.png" alt=""></a>--}}
							{{--<div class="ot-social-details">--}}
								{{--<div class="ot-social-count">WA</div>--}}
								{{--<div class="ot-social-type">081936561526 - Jakarta</div>--}}
								{{--<div class="ot-social-type"> WA 081916641251 - Bali</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="ot-social-button">--}}
							{{--<a href="https://www.facebook.com/happytripkorea/"><img src="images/facebook.png" alt=""></a>--}}
							{{--<div class="ot-social-details">--}}
								{{--<div class="ot-social-count">Facebook</div>--}}
								{{--<div class="ot-social-type">Happy Trip Korea</div>--}}
							{{--</div>--}}
						{{--</div>--}}

						<div class="clearfix"></div>
						<h3 class="section-title"><span>Maps</span></h3>
						<div class="iframe-rwd embed-container  maps">
							<div style="width: 100%">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1730632668086!2d107.58787531407462!3d-6.869855669123673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e696f6739b33%3A0x9bdfd35354d28c5a!2sTelkom+Corporate+University%2CJl.Gegerkalong+Hilir!5e0!3m2!1sen!2sid!4v1499767005065" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div><br />
						</div>
					</div>
					<!-- end content -->
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
