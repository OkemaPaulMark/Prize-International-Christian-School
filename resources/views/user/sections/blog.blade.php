<!-- Newsletter Section -->
<section id="newsletter" class="services section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Blogs</h2>
    <p>Catch up on our most memorable events and celebrations that enrich the school experience and foster a strong sense of community and growth among our learners.</p>
  </div>

  <div class="container">
    <div class="row gy-4">
        @if ($newsletters->isEmpty())
          <div class="col-12">
            <p class="text-center">No newsletters available at the moment.</p>
          </div>
        @endif
        @foreach ($newsletters as $newsletter)
          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card position-relative">
              <div class="service-img">
                <img src="{{ asset($newsletter->image) }}" alt="{{ $newsletter->title }}" class="img-fluid">
              </div>
              <div class="service-content">
                <h3 class="text-success">{{ $newsletter->title }}</h3>
                <p>{{ Str::limit($newsletter->description, 300, '...') }}</p>
                <!-- Button to trigger modal -->
                <button type="button" class="btn stretched-link" style="background-color: #50C878; color: white;" data-bs-toggle="modal" data-bs-target="#newsletterModal{{ $newsletter->id }}">
                  Read More
                </button>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="newsletterModal{{ $newsletter->id }}" tabindex="-1" aria-labelledby="newsletterModalLabel{{ $newsletter->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header bg-success text-white">
                 <h5 class="modal-title text-white" id="newsletterModalLabel{{ $newsletter->id }}">{{ $newsletter->title }}</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img src="{{ asset($newsletter->image) }}" class="img-fluid mb-3" alt="{{ $newsletter->title }}">
                  <p>{{ $newsletter->description }}</p>
                </div>
              </div>
            </div>
          </div>
        @endforeach

    </div>
  </div>
</section>
