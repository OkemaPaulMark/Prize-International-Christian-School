@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5>Newsletter Details</h5>
        </div>
        <div class="card-body">
            <!-- Title Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Title:</label>
                        <p class="form-control-plaintext border-bottom pb-2">{{ $newsletter->title }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Description Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Description:</label>
                        <div class="card">
                            <div class="card-body">
                                <p class="form-control-plaintext">{{ $newsletter->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Image Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Image:</label>
                        <div class="text-center">
                            <img src="{{ asset($newsletter->image) }}" class="img-fluid rounded" style="max-height: 160px;">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Dates Row -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="font-weight-bold">Created At:</label>
                        <p class="form-control-plaintext border-bottom pb-2">
                            {{ $newsletter->created_at->format('F j, Y \a\t g:i a') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="font-weight-bold">Last Updated:</label>
                        <p class="form-control-plaintext border-bottom pb-2">
                            {{ $newsletter->updated_at->format('F j, Y \a\t g:i a') }}
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="row mt-4">
                <div class="col-12">
                    <a href="{{ route('newsletter.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection