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
						<h4 class="section-title"><span>Telkom Corporate University</span>News with Content: "{{$text}}"</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="widget-container widget_tag_cloud">
									<form role="form" method="get" action="{{url('/search')}}">
									  <!-- {{csrf_field()}} -->
									  <!-- select -->
									  <div class="form-group">
									    <label>Search Content : </label>
									    <div class="tag_item">
									    	<input type="search" class="form-control slate" placeholder="Type to search" name="search_input" id="s">
									    </div>
									    <div class="tag_item">
									    	<button type="submit" class="btn-default btn-submit">Search <i class="fa fa-search"></i></button>
									    </div>
									  </div>
									</form>
								</div>
								@if(count($blog) < 1)
									<center><h4 style="color: #B81D1D">There are no posts</h4></center>
								@else
									@foreach($blog as $key => $row)
									<!-- start list post item -->
									<div class="list-post">
										<div class="list-post-container">
											<a href="{{url('blog',$row->blog_id)}}">
												@if($row->blog_picture == NULL)
												<img src="{{asset('images/blog/none.jpg')}}" alt="your image" class="img-responsive" />
												@else
												<img src="{{asset('images/blog/'.$row->blog_picture)}}" alt="your image" class="img-responsive" />
												@endif
											</a>
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
