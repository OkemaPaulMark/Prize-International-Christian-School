<!-- File: resources/views/admin/dashboard/list.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Newsletter')

@section('content')
    <!-- Display error if present -->
    @if (isset($error))
        <div class="alert alert-danger">{{ $error }}</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Manage Newsletter</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a> -->
    </div>

    <!-- Content Row -->
    <!-- Newsletter Section -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addNewsletterModal">
            <i class="fas fa-plus"></i> Add Newsletter
        </button>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
         @endif
         @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($newsletters as $index => $newsletter)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $newsletter->title }}</td>
                        <td>{{ Str::limit($newsletter->description, 90) }}</td>
                        <td><img src="{{ asset($newsletter->image) }}" class="img-thumbnail" width="80"></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm">View</a>
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('newsletter.destroy', $newsletter->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this newsletter?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Newsletter Modal -->
<div class="modal fade" id="addNewsletterModal" tabindex="-1" role="dialog" aria-labelledby="addNewsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <form action="{{ route('newsletter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Newsletter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Newsletter Title" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea id="description" name="description" class="form-control" rows="4" placeholder="Write newsletter details..." required></textarea>
                    </div>

                     <!-- Image -->
                    <div class="form-group">
                        <label for="image">Image*</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Newsletter</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </form>
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
