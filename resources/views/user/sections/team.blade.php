<!-- Team Section -->
<section id="team" class="team section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Board Members</h2>
    <p>Our Board Members bring a wealth of experience and leadership, guiding the school towards continued success and growth.</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">

      @foreach($members as $index => $member)
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
        <div class="team-member">
          <div class="member-img" style="height: 250px; overflow: hidden;">
            <img src="{{ asset($member->image) }}" class="img-fluid" alt="{{ $member->name }}" style="object-fit: cover; height: 100%; width: 100%;">
          </div>
          <div class="member-info">
            <h4>{{ $member->name }}</h4>
            <span>{{ $member->title }}</span>
            <p>{{ $member->phone_number }}</p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>

</section><!-- /Team Section -->
