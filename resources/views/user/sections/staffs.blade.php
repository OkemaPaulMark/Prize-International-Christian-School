<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Prize International Christian School</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    .form-control:focus {
  border-color: #198754 !important; /* Bootstrap's success green */
  box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25) !important;
}

  </style>

</head>



  <main class="main">

    @include('user/sections.header')

    <!-- Contents of the FAQs -->
    <div class="container py-5">
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Lovely Staff Members</h2>
            <p>Meet our dedicated team of teachers and staff who work tirelessly to create a nurturing, supportive, and inspiring learning environment for every student.</p>
        </div>

                <div class="container">
                <div class="row gy-4">

                  @forelse ($staff as $member)
                      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                          <div class="team-member border rounded shadow-sm w-100 p-2">
                              <div class="member-img" style="height: 250px; overflow: hidden;">
                                  <img src="{{ asset($member->image) }}" 
                                      class="img-fluid" 
                                      alt="{{ $member->name }}" 
                                      style="object-fit: cover; height: 100%; width: 100%;">
                              </div>
                              <div class="member-info text-center mt-3">
                                  <h4>{{ $member->name }}</h4>
                                  <span>{{ $member->title }}</span>
                              </div>
                          </div>
                      </div>
                  @empty
                      <div class="col-12 text-center">
                          <p class="text-muted">There are currently no staff members.</p>
                      </div>
                  @endforelse


                </div>
                </div>


    </div>



    @include('user/sections.contact')

    @include('user/sections.footer')



</main><!-- End #main -->


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>