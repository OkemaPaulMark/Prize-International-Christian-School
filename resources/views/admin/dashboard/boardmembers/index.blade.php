<!-- File: resources/views/admin/dashboard/list.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Board Members')

@section('content')
    <!-- Display error if present -->
    @if (isset($error))
        <div class="alert alert-danger">{{ $error }}</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Manage Board Members</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a> -->
    </div>

    <!-- Content Row -->
    <!-- Board Members Section -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBoardMemberModal">
            <i class="fas fa-plus"></i> Add Board Member
        </button>
    </div>
    <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Bio</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($members as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($member->bio, 90, '...') }}</td>
                        <td><img src="{{ asset($member->image) }}" class="img-thumbnail" width="80"></td>
                        <td>
                                <a href="{{ route('boardmembers.show', $member->id) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('boardmembers.edit', $member->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            <form action="{{ route('boardmembers.destroy', $member->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this board member?')">
                                    <i class="fas fa-trash-alt"></i> Delete
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

<!-- Add Board Member Modal -->
<div class="modal fade" id="addBoardMemberModal" tabindex="-1" role="dialog" aria-labelledby="addBoardMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <form action="{{ route('boardmembers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Board Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Full Name*</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Board Member Name" required>
                    </div>

                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="e.g. Chairperson" required>
                    </div>

                    <!-- Bio -->
                    <div class="form-group">
                        <label for="bio">Bio*</label>
                        <textarea id="bio" name="bio" class="form-control" rows="3" placeholder="Write a short bio..." required></textarea>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image">Image*</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Board Member</button>
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
