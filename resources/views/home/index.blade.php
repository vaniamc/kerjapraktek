@extends('layouts.index')

@section('content')
	<!-- main content -->
	<!-- main content -->
	<section class="ot-section-a">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="ot-module">
						<!-- classic grid posts section -->
						<h4 class="section-title"><span>Telkom Corporate University</span>Latest News</h4>
						<div class="row">
							<div class="col-md-12">
								@foreach($blog as $key => $row)
								<!-- start list post item -->
								<div class="list-post">
									<div class="list-post-container">
										<a href="blog">
											@if($row->blog_picture == NULL)
											<img src="{{asset('images/blog/none.jpg')}}" alt="your image" class="img-responsive" />
											@else
											<img src="{{asset('images/blog/'.$row->blog_picture)}}" alt="your image" class="img-responsive" />
											@endif
										</a>
										<div class="post-cat2"><span style="background-color: #d00b06">Transport</span></div>
									</div>
									<div class="list-post-body">
										<h2><a href="{{url('blog',$row->blog_id)}}">{{$row->blog_title}}</a></h2>
										<div class="post-meta">
											<?php
                                                $y = substr($row->created_at, 0, 4);
                                                $m = substr($row->created_at, 5, 2);
                                                $d = substr($row->created_at, 8, 2);
                                            ?>
                                            <span>{{$d}}/{{$m}}/{{$y}}</span>
										</div>
										<p>
											<?php
                                                $text = strip_tags($row->blog_content);
                                                $edited = str_limit($text, 100);
                                                echo $edited;
                                            ?>
										</p>
										<div class="read-more pull-right"><a href="{{url('blog',$row->blog_id)}}" class="btn btn-default btn-secondary">read more</a></div>
									</div>

								</div>
								<!-- end list post item -->
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<aside class="sidebar">
						<!-- widget articles section -->
						<div class="widget-container">
							<h4 class="section-title"><span>Most Viewed Post</span>Popular News</h4>
							<!-- article post -->
							<article class="widget-post">
								<div class="post-image">
									<a href="blog"><img src="images/demo/1200x800-10.jpg" alt=""></a>
								</div>
								<div class="post-body">
									<h2><a href="blog">Make Stories Come Alive with Jodi Harvey-Brown</a></h2>
								</div>
							</article>
							<!-- end article item -->
							<!-- article post -->
							<article class="widget-post">
								<div class="post-image">
									<a href="blog"><img src="images/demo/1200x800-11.jpg" alt=""></a>
								</div>
								<div class="post-body">
									<h2><span class="hot">Hot <i class="fa fa-bolt"></i></span><a href="blog">The View From a Peaceful Villa I Visited</a></h2>
								</div>
							</article>
							<!-- end article item -->
							<!-- article post -->
							<article class="widget-post">
								<div class="post-image">
									<a href="blog"><img src="images/demo/1200x800-9.jpg" alt=""></a>
								</div>
								<div class="post-body">
									<h2><a href="blog">Is This Outfit a Relationship Deal-Breaker?</a></h2>
								</div>
							</article>
							<!-- end article item -->
							<!-- article post -->
							<article class="widget-post">
								<div class="post-image">
									<a href="blog"><img src="images/demo/1200x800-12.jpg" alt=""></a>
								</div>
								<div class="post-body">
									<h2><a href="blog">The View From a Peaceful Villa I Visited</a></h2>
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
						<!-- widget advertisement -->
						<div class="widget-container widget_tag_cloud">
							<h4 class="section-title"><a href="http://news.telkom.co.id/index.php?act=news&cat_id=34&id=44661">Socio Digi Leaders</a></h4>
							<img src="{{asset('images/ads.jpeg')}}" href="http://news.telkom.co.id/index.php?act=news&cat_id=34&id=44661" alt="" /> <br>

						</div>
						<!-- end widget advertisement -->
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
