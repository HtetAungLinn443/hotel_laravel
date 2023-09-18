<footer class="ftco-footer ftco-section img"
    style="background-image: url({{ asset('assets/frontend/images/bg_4.jpg') }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ getSiteSetting() !== null ? getSiteSetting()->name : '' }}</h2>

                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Useful Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('userRooms') }}" class="py-2 d-block">Rooms</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Privacy</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('userAbout') }}" class="py-2 d-block">About Us</a></li>
                        <li><a href="{{ route('userContact') }}" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span> <span class="text">Address</span>
                            </li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">
                                        {{ getSiteSetting() !== null ? getSiteSetting()->phone : '' }}
                                    </span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span>
                                    <span
                                        class="text">{{ getSiteSetting() !== null ? getSiteSetting()->email : '' }}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>

                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This
                    template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by
                    {{ getSiteSetting() !== null ? getSiteSetting()->name : '' }}
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.ui.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('assets/frontend/js/google-map.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
