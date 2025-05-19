<!-- File: resources/views/admin/dashboard/list.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <!-- Display error if present -->
    @if (isset($error))
        <div class="alert alert-danger">{{ $error }}</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a> -->
    </div>

    <!-- Content Row -->
    <div class="row">
      <div class="container-fluid py-4">
        <div class="row min-vh-80 h-100">
          <div class="col-12">
            <div class="row">
              <!-- Registered Users -->
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <i class="fas fa-users-cog fa-2x text-primary"></i>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-primary">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h5 class="text-muted font-weight-normal">Registered Users</h5>
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">{{ $userCount }}</h3>
                    </div>
                    <p>All users registered to the website.</p>
                  </div>
                </div>
              </div>

              <!-- Feedbacks -->
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <i class="fas fa-comments fa-2x text-success"></i>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h5 class="text-muted font-weight-normal">Feedbacks</h5>
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">{{ $feedbackCount }}</h3>
                    </div>
                    <p>Feedback submitted by students or parents.</p>
                  </div>
                </div>
              </div>

              <!-- Newsletter Subscribers -->
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <i class="fas fa-envelope-open-text fa-2x text-warning"></i>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-warning">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h5 class="text-muted font-weight-normal">Newsletter</h5>
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">{{ $newsletterCount }}</h3>
                    </div>
                    <p>Newsletters added by the admin.</p>
                  </div>
                </div>
              </div>

              <!-- Board Members -->
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <i class="fas fa-user-tie fa-2x text-danger"></i>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h5 class="text-muted font-weight-normal">Board Members</h5>
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">{{ $boardMemberCount }}</h3>
                    </div>
                    <p>Registered school board members.</p>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div>
        </div>
      </div>
    </div>


@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endpush
