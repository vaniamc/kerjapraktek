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
										<a href="{{url('blog',$row->blog_id)}}">
											@if($row->blog_picture == NULL)
												<img src="{{asset('images/blog/none.jpg')}}" alt="your image" class="img-responsive" />
												<div class="post-cat2"><span style="background-color: #ff001e">Gadgets</span></div>
											@else
												<img src="{{asset('images/blog/'.$row->blog_picture)}}" alt="your image" class="img-responsive" />
												{{--<div class="post-cat2"><span style="background-color: #F0CE49">Gadgets</span></div>--}}
												<div class="post-cat2"><span style="background-color: #ff001e">Gadgets</span></div>
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
										<div class="read-more pull-right"><a href="{{url('blog',$row->blog_id)}}" class="btn btn-default btn-sm">read more</a></div>
									</div>

								</div>
								<!-- end list post item -->
								@endforeach
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
