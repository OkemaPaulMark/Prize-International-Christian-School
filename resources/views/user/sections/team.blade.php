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
            <p>
              {{ \Illuminate\Support\Str::limit($member->bio, 100, '...') }}
              <a href="#" data-bs-toggle="modal" data-bs-target="#bioModal{{ $index }}">Read More</a>
            </p>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="bioModal{{ $index }}" tabindex="-1" aria-labelledby="bioModalLabel{{ $index }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="bioModalLabel{{ $index }}">{{ $member->name }} - {{ $member->title }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{ $member->bio }}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach


    </div><!-- End Team Member -->
    </div>
  </div>

</section><!-- /Team Section -->
