<div class="col-md-4">
	<aside class="sidebar">
		<!-- widget advertisement -->
		<div class="widget-container widget_tag_cloud">
			<h4 class="section-title"><a href="http://news.telkom.co.id/index.php?act=news&cat_id=34&id=44661">HOT NEWS</a></h4>
			{{--<img src="{{asset('images/ads.jpeg')}}" href="http://news.telkom.co.id/index.php?act=news&cat_id=34&id=44661" alt="" /> <br>--}}
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<h5>SOCIO DIGI LEADERS </h5>
							<img src="{{asset('images/ads.jpeg')}}" alt="Socio Digi Leaders" style="width:300px;">
						</div>

						<div class="item">
							<h5>INDIHOME FRONTLINER </h5>
							<img id="myImg" src="{{asset('images/indi.jpg')}}" alt="IndiHome Frontliner" style="width:300px;">
						</div>

						<div class="item">
							<h5>HR HELPDESK </h5>
							<img id="myImg" src="{{asset('images/ee.jpg')}}" alt="HR Helpdesk" style="width:300px;">
						</div>
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			<!-- The Modal -->
			<div id="myModal" class="modal">
				<span class="close">&times;</span>
				<img class="modal-content" id="img01">
				<div id="caption"></div>
			</div>

			<script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById('myImg');
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function(){
                    modal.style.display = "block";
                    modalImg.src = this.src;
                    captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }
			</script>
		</div>
		<!-- end widget advertisement -->
		<!-- widget articles section -->
		<div class="widget-container">
			<h4 class="section-title"><span>Most Viewed Post</span>Popular News</h4>
			<!-- article post -->
			<article class="widget-post">
				<div class="post-image">
					<a href="blog"><img src="{{asset('images/demo/1200x800-10.jpg')}}" alt=""></a>
				</div>
				<div class="post-body">
					<h2><a href="blog">Make Stories Come Alive with Jodi Harvey-Brown</a></h2>
				</div>
			</article>
			<!-- end article item -->
			<!-- article post -->
			<article class="widget-post">
				<div class="post-image">
					<a href="blog"><img src="{{asset('images/demo/1200x800-11.jpg')}}" alt=""></a>
				</div>
				<div class="post-body">
					<h2><span class="hot">Hot <i class="fa fa-bolt"></i></span><a href="blog">The View From a Peaceful Villa I Visited</a></h2>
				</div>
			</article>
			<!-- end article item -->
			<!-- article post -->
			<article class="widget-post">
				<div class="post-image">
					<a href="blog"><img src="{{asset('images/demo/1200x800-9.jpg')}}" alt=""></a>
				</div>
				<div class="post-body">
					<h2><a href="blog">Is This Outfit a Relationship Deal-Breaker?</a></h2>
				</div>
			</article>
			<!-- end article item -->
			<!-- article post -->
			<article class="widget-post">
				<div class="post-image">
					<a href="blog"><img src="{{asset('images/demo/1200x800-12.jpg')}}" alt=""></a>
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
			<h4 class="section-title" id="demo">By Year</h4>
				<form role="form" method="get" action="{{url('blog/searchdate')}}">
				  <!-- {{csrf_field()}} -->
				  <!-- select -->
				  <div class="form-group">
				    <label>Search Year: </label>
				    <div class="tag_item">
				    	<select class="styled-select slate" id="year" onchange="myFunction()" name="select_year"></select>
				    </div>
				    <div class="tag_item">
				    	<button type="submit" class="btn-default btn-submit">Search</button>
				    </div>
				  </div>
				</form>


		</div>

	</aside>
</div>
<!-- col-md-4 -->