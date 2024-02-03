@extends('layouts.master')
@section('title', 'ETA')
@section('content')
    <header class="slider-main">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('images/slider-01.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Welcome to Lawn Care</h3>
                        <p>A Great Theme For Garden Lawn Care</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('images/slider-02.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Beautiful </h3>
                        <p>A Great Theme For Garden Lawn Care</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('images/slider-03.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Welcome to N & LW Lawn Care</h3>
                        <p>A Great Theme For Garden Lawn Care</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>
    <br  id="OurVision">
    <br><br><br><br>
    <div class="about-main">
        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid rounded mb-4" src="images/about-img.jpg" alt="" />
            </div>
            <div class="col-lg-6">
                <h2>About Modern Business</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
            </div>
        </div>
        <!-- /.row -->
    </div> 
    <br  id="boxes">
    <div class="container">

		<div class="pricing-box">
		<!-- Content Row -->
			<div class="row">
				<div class="col-lg-4 mb-4">
					<div class="card h-100">
						<h3 class="card-header">Basic</h3>
						<div class="card-body">
							<div class="display-4">$19.99</div>
							<div class="font-italic">per month</div>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Cras justo odio</li>
							<li class="list-group-item">Dapibus ac facilisis in</li>
							<li class="list-group-item">Vestibulum at eros</li>
							<li class="list-group-item">
							<a href="#" class="btn btn-primary">Sign Up!</a>
						  </li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card card-outline-primary h-100">
						<h3 class="card-header text-white">
							Plus
							<span class="most_popular">Most Popular</span>
						</h3>
						<div class="card-body">
							<div class="display-4">$39.99</div>
							<div class="font-italic">per month</div>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Cras justo odio</li>
							<li class="list-group-item">Dapibus ac facilisis in</li>
							<li class="list-group-item">Vestibulum at eros</li>
							<li class="list-group-item">
							<a href="#" class="btn btn-primary">Sign Up!</a>
						  </li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card h-100">
						<h3 class="card-header">Ultra</h3>
						<div class="card-body">
							<div class="display-4">$159.99</div>
							<div class="font-italic">per month</div>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Cras justo odio</li>
							<li class="list-group-item">Dapibus ac facilisis in</li>
							<li class="list-group-item">Vestibulum at eros</li>
							<li class="list-group-item">
							<a href="#" class="btn btn-primary">Sign Up!</a>
						  </li>
						</ul>
					</div>
				</div>
			</div>
		<!-- /.row -->
		</div>
    </div>
<br><br><br><br>
<br  id="contactUs">
<br><br><br><br>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 mb-4 contact-left">
          <h3>Send us a Message</h3>
          
    @if(session('success'))
    <p>{{ session('success') }}</p>
@endif
          <form action="{{ route('contact.submit') }}" method="post" name="sentMessage" id="contactForm" novalidate>
            @csrf

            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" name="phone" id="phone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                <textarea rows="5" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
          </form>
        </div>

      </div>
    </div>
   
@endsection
