@extends('layouts.index')

@section('css')
<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 9999; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
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
			<h4 class="section-title"><span>Telkom Corporate University</span>Album: {{$album->album_name}} </h4>
			<div class="ot-slider-b">
				<div class="row row-slider-gutter">
					@foreach($gallery as $key => $row)
					<div class="col-md-4 slider-item-small">
						<figure>
							<img src="{{asset('images/gallery/'.$row->gallery_path)}}" alt="" id="myImg">
						</figure>
						<!-- The Modal -->
						<div id="myModal" class="modal">
						  <span class="close">&times;</span>
						  <img class="modal-content" id="img01">
						  <div id="caption"></div>
						</div>
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
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}

</script>
@stop