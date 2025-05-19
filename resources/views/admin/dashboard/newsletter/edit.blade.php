@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5>Edit Newsletter</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('newsletter.update', $newsletter->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title Row -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Title*</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $newsletter->title) }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Description Row -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Description*</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                                      rows="5" required>{{ old('description', $newsletter->description) }}</textarea>
                            @error('description')
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
                            <label class="font-weight-bold">Image</label>
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
                                <a href="{{ asset($newsletter->image) }}" target="_blank">View</a>
                                (Leave blank to keep current)
                            </small>
                        </div>
                    </div>
                </div>
                
                <!-- Current Image Preview -->
                <div class="row mb-3">
                    <div class="col-12 text-center">
                        <img src="{{ asset($newsletter->image) }}" id="imagePreview" class="img-thumbnail" style="max-height: 200px;">
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update Newsletter
                        </button>
                        <a href="{{ route('newsletter.index') }}" class="btn btn-secondary ml-2">
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
    // Update file input label
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("customFile").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });

    // Image preview
    document.getElementById('customFile').addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endpush
@endsection