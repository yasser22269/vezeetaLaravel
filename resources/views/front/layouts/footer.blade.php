<!-- footer Start -->
<footer class="footer section gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<div class="logo mb-4">
						<img src="{{asset('/front/')}}/images/logo.png" alt="" class="img-fluid">
					</div>
					<p>{{$setting->about_me}}</p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item"><a href="{{$setting->facebook}}"><i class="icofont-facebook"></i></a></li>
						<li class="list-inline-item"><a href="{{$setting->twitter}}"><i class="icofont-twitter"></i></a></li>
						<li class="list-inline-item"><a href="{{$setting->insta}}"><i class="icofont-instagram"></i></a></li>
					</ul>
				</div>
			</div>


{{--
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Support</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="#">Terms & Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Company Support </a></li>
						<li><a href="#">FAQuestions</a></li>
						<li><a href="#">Company Licence</a></li>
					</ul>
				</div>
			</div> --}}

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget widget-contact mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">ابقى على تواصل</h4>
					<div class="divider mb-4"></div>

					<div class="footer-contact-block mb-4">
						<div class="icon d-flex align-items-center">
							<i class="icofont-email mr-3"></i>
							<span class="h6 mb-0">متاح النواصل معنا على </span>
						</div>
						<h4 class="mt-2"><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></h4>
					</div>

					<div class="footer-contact-block">
						<div class="icon d-flex align-items-center">
							<i class="icofont-support mr-3"></i>
							<span class="h6 mb-0">من الاتنين الى الجمعة: 8.00 - 18:00</span>
						</div>
						<h4 class="mt-2"><a href="tel:{{$setting->phone}}">{{$setting->phone}}</a></h4>
					</div>
				</div>
			</div>
		</div>

        <hr>
	</div>
</footer>



    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{asset('/front/')}}/plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="{{asset('/front/')}}/plugins/bootstrap/js/popper.js"></script>
    <script src="{{asset('/front/')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('/front/')}}/plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="{{asset('/front/')}}/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="{{asset('/front/')}}/plugins/counterup/jquery.waypoints.min.js"></script>

    <script src="{{asset('/front/')}}/plugins/shuffle/shuffle.min.js"></script>
    <script src="{{asset('/front/')}}/plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="{{asset('/front/')}}/plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

    <script src="{{asset('/front/')}}/js/script.js"></script>
    <script src="{{asset('/front/')}}/js/contact.js"></script>

  </body>
</html>
