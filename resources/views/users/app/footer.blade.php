    <div class="dashboard-footer">
        <div class="copyright-area">
            <p>Copyright 2023 <a href="#">Triprex</a> | Design By <a href="#">Egens Lab</a></p>
        </div>
        <ul class="footer-menu-list">
            <li>
                <a href="#">About Us</a>
            </li>
            <li>
                <a href="#">Reviews</a>
            </li>
            <li>
                <a href="#">Terms & Conditions</a>
            </li>
        </ul>
    </div>
</div>
<!-- End dashboard section -->


<!--  Main jQuery  -->
<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/daterangepicker.min.js')}}"></script>
<!-- Popper and Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- Swiper slider JS -->
<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/slick.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<!-- Counterup JS -->
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<!-- Isotope  JS -->
<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
<!-- Magnific-popup  JS -->
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Marquee  JS -->
<script src="{{asset('assets/js/jquery.marquee.min.js')}}"></script>
<!-- Select2  JS -->
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<!-- Select2  JS -->
<script src="{{asset('assets/js/select2.min.js')}}"></script>

<script src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('assets/js/custom.js')}}"></script>

<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-auth-compat.js"></script>
<script>
    // Firebase web config
    const firebaseConfig = {
        apiKey: "AIzaSyBRV-zkZj_af0xQG2nnlbDfso4uaw7a4G8",
        authDomain: "zulu-s-retreat.firebaseapp.com",
        projectId: "zulu-s-retreat",
        storageBucket: "zulu-s-retreat.firebasestorage.app",
        messagingSenderId: "737897520989",
        appId: "1:737897520989:web:8a58d4b57f5314f53fd2b4",
        measurementId: "G-JM6JHCFYWW"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    $('#logoutBtn').on('click', function(e) {
        e.preventDefault();

        // Sign out from Firebase (clears client state)
        firebase.auth().signOut().finally(function() {
            $.ajax({
                url: "{{ route('user.login.firebase.logout') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                }
            })
            .done(function(res) {
                if (res.redirect) {
                    window.location.href = res.redirect;
                } else {
                    console.log('Logged out successfully');
                }
            })
            .fail(function(xhr) {
                console.error('Logout failed', xhr.responseText);
                alert("Logout failed: " + (xhr.responseJSON?.message || "Unexpected error"));
            });
        });
    });
</script>

</body>

</html>