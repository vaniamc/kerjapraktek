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
				<div class="col-md-4">
					<aside class="sidebar">
						<!-- widget articles section -->
						<div class="widget-container">
							<h4 class="section-title"><span>Most Viewed Post</span>Popular News</h4>
							<!-- article post -->
							<article class="widget-post">
								<div class="post-image">
									<a href="post.html"><img src="images/demo/1200x800-10.jpg" alt=""></a>
								</div>
								<div class="post-body">
									<h2><a href="post.html">Make Stories Come Alive with Jodi Harvey-Brown</a></h2>
								</div>
							</article>
							<!-- end article item -->
							<!-- article post -->
							<article class="widget-post">
								<div class="post-image">
									<a href="post.html"><img src="images/demo/1200x800-11.jpg" alt=""></a>
								</div>
								<div class="post-body">
									<h2><span class="hot">Hot <i class="fa fa-bolt"></i></span><a href="post.html">The View From a Peaceful Villa I Visited</a></h2>
								</div>
							</article>
							<!-- end article item -->
							<!-- article post -->
							<article class="widget-post">
								<div class="post-image">
									<a href="post.html"><img src="images/demo/1200x800-9.jpg" alt=""></a>
								</div>
								<div class="post-body">
									<h2><a href="post.html">Is This Outfit a Relationship Deal-Breaker?</a></h2>
								</div>
							</article>
							<!-- end article item -->
							<!-- article post -->
							<article class="widget-post">
								<div class="post-image">
									<a href="post.html"><img src="images/demo/1200x800-12.jpg" alt=""></a>
								</div>
								<div class="post-body">
									<h2><a href="post.html">The View From a Peaceful Villa I Visited</a></h2>
								</div>
							</article>
							<!-- end article item -->
						</div>
						<!-- end widget articles section -->
						<!-- widget tag cloud -->
						<div class="widget-container widget_tag_cloud">
							<h4 class="section-title">Category</h4>
							<div class="tag_item"><a href='category.html' title='Fashion'>HCM</a><span>34</span></div>
							<div class="tag_item"><a href='category.html' title='Fashion'>LO</a><span>54</span></div>
							<div class="tag_item"><a href='category.html' title='Fashion'>KCMS</a><span>2</span></div>
						</div>
						<!-- end widget tag cloud -->
						<div class="widget-container widget_tag_cloud">
							<h4 class="section-title">By Year</h4>
							<div class="tag_item"><a data-toggle="collapse" href="#collapse1">2016</a><span>34</span></div>
							<div id="collapse1" class="panel-collapse collapse">
								<ul class="list-group">
									<li class="tag_item"><a href="#">January</a><span>3</span></li>
									<li class="tag_item"><a href="#">February</a><span>3</span></li>
									<li class="tag_item"><a href="#">March</a><span>3</span></li>
									<li class="tag_item"><a href="#">April</a><span>3</span></li>
									<li class="tag_item"><a href="#">May</a><span>3</span></li>
									<li class="tag_item"><a href="#">June</a><span>3</span></li>
									<li class="tag_item"><a href="#">July</a><span>3</span></li>
									<li class="tag_item"><a href="#">August</a><span>3</span></li>
									<li class="tag_item"><a href="#">September</a><span>3</span></li>
									<li class="tag_item"><a href="#">October</a><span>3</span></li>
									<li class="tag_item"><a href="#">November</a><span>3</span></li>
									<li class="tag_item"><a href="#">December</a><span>3</span></li>
								</ul>
							</div>
							<div class="tag_item"><a data-toggle="collapse" href="#collapse2">2017</a><span>34</span></div>
							<div id="collapse2" class="panel-collapse collapse">
								<ul class="list-group">
									<li class="tag_item"><a href="#">January</a><span>3</span></li>
									<li class="tag_item"><a href="#">February</a><span>3</span></li>
									<li class="tag_item"><a href="#">March</a><span>3</span></li>
									<li class="tag_item"><a href="#">April</a><span>3</span></li>
									<li class="tag_item"><a href="#">May</a><span>3</span></li>
									<li class="tag_item"><a href="#">June</a><span>3</span></li>
									<li class="tag_item"><a href="#">July</a><span>3</span></li>
									<li class="tag_item"><a href="#">August</a><span>3</span></li>
									<li class="tag_item"><a href="#">September</a><span>3</span></li>
									<li class="tag_item"><a href="#">October</a><span>3</span></li>
									<li class="tag_item"><a href="#">November</a><span>3</span></li>
									<li class="tag_item"><a href="#">December</a><span>3</span></li>
								</ul>
							</div>

						</div>
						{{--<!-- widget advertisement -->--}}
						{{--<div class="widget-container widget_tag_cloud">--}}
							{{--<h4 class="section-title"><a href="http://news.telkom.co.id/index.php?act=news&cat_id=34&id=44661">Socio Digi Leaders</a></h4>--}}
							{{--<img src="images/ads.jpeg" href="http://news.telkom.co.id/index.php?act=news&cat_id=34&id=44661" alt="" /> <br>--}}

						{{--</div>--}}
						{{--<!-- end widget advertisement -->--}}
					</aside>
				</div>
				<!-- col-md-4 -->
			</div>
			<!-- row -->
			<!-- end main content -->
		</div>
		<!-- container -->
	</section>
	<!-- end ot-section-a -->
@stop
