
@extends('guestlayout')

@section('content')
	
	<script>
  		var d=document.getElementById("homepageLink");
  		d.className = d.className + " active";
	</script>

	<br> </br>
	<div class="container">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			  </ol>
			 
			  <!-- Wrapper for slides -->
			  <div class="jumbotron"><b><center> <h1>e-UKMI BANDUNG</h1> </center></b></div>
			  <div class="carousel-inner">
			    <div class="item active">
			      <img src="images/ukm.jpg" alt="..." style=" width:110%" >
			      <div class="carousel-caption" style="color:#CCFFFF">
			          
			      </div>
			    </div>
			  </div>
			</div> <!-- Carousel -->
	</div>
@stop