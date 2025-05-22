@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5>Edit Board Member</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('boardmembers.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name Row -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Full Name*</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $member->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Title Row -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Title/Position*</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $member->title) }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Bio Row -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Bio*</label>
                            <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" rows="4" required>{{ old('bio', $member->bio) }}</textarea>
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Image Row -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Profile Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" 
                                       id="customFile" accept="image/*">
                                <label class="custom-file-label" for="customFile">Choose new image (optional)</label>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                Current image:
                                <a href="{{ asset($member->image) }}" target="_blank">View</a>
                                (Leave blank to keep current)
                            </small>
                        </div>
                    </div>
                </div>
                
                <!-- Current Image Preview -->
                <div class="row mb-3">
                    <div class="col-12 text-center">
                        <img src="{{ asset($member->image) }}" class="img-thumbnail" style="max-height: 200px;">
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update Member
                        </button>
                        <a href="{{ route('boardmembers.index') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Update the custom file input label with the selected file name
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("customFile").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endpush
@endsection