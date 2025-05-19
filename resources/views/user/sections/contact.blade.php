    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>If you have any questions or need more information, feel free to reach out to us. We're here to help!</p>
      </div><!-- End Section Title -->


      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6 ">
            <div class="row gy-4">

              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Seeta, 200 Meters off Bajjo Road</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>0757674467</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>prizeintl@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>

          <div class="col-lg-6">

{{-- Laravel Flash Messages (Styled like UI's .sent-message) --}}
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

{{-- Contact Form (removed php-email-form and JS loading/error divs) --}}
<form action="{{ route('feedback.store') }}" method="POST" data-aos="fade-up" data-aos-delay="500">
  @csrf
  <div class="row gy-4">

    <div class="col-md-6">
      <input type="text" name="name" class="form-control" placeholder="Your Name" required>
    </div>

    <div class="col-md-6">
      <input type="email" class="form-control" name="email" placeholder="Your Email" required>
    </div>

    <div class="col-md-12">
      <input type="text" class="form-control" name="subject" placeholder="Subject" required>
    </div>

    <div class="col-md-12">
      <textarea class="form-control" name="message" rows="4" placeholder="Message" required></textarea>
    </div>

    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-success">Send Message</button>
    </div>

  </div>
</form>
</div><!-- End Contact Form -->





        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>