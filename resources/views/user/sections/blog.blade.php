<!-- Newsletter Section -->
<section id="newsletter" class="services section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Newsletter</h2>
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
              <p>{{ Str::limit($newsletter->description, 300) }}</p>
              <a href="#" class="btn btn-success stretched-link">Read More</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
