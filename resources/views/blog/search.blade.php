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
						<h4 class="section-title"><span>Telkom Corporate University</span>News within {{$month or null}} {{$year}}</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="widget-container widget_tag_cloud">
									<form role="form" method="get" action="{{url('blog/search')}}">
									  <!-- {{csrf_field()}} -->
									  <!-- select -->
									  <div class="form-group">
									    <label>Search Year: </label>
									    <div class="tag_item">
									    	<select class="styled-select slate" id="year1" name="select_year"></select>
									    </div>
									    <label>Search Month: </label>
									    <div class="tag_item">
									    	<select class="styled-select slate" name="select_month">
									    		<option value="01">January</option>
									    		<option value="02">February</option>
									    		<option value="03">March</option>
									    		<option value="04">April</option>
									    		<option value="05">May</option>
									    		<option value="06">June</option>
									    		<option value="07">July</option>
									    		<option value="08">August</option>
									    		<option value="09">September</option>
									    		<option value="10">October</option>
									    		<option value="11">November</option>
									    		<option value="12">December</option>
									    	</select>
									    </div>
									    <div class="tag_item">
									    	<button type="submit" class="btn-default btn-submit">Search</button>
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
											<a href="blog">
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
