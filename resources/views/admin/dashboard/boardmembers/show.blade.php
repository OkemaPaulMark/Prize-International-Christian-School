@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5>Board Member Details</h5>
        </div>
        <div class="card-body">
            <!-- Name Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Full Name:</label>
                        <p class="form-control-plaintext border-bottom pb-2">{{ $member->name }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Title Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Title/Position:</label>
                        <p class="form-control-plaintext border-bottom pb-2">{{ $member->title }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Phone Number Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Phone Number:</label>
                        <p class="form-control-plaintext border-bottom pb-2">{{ $member->phone_number }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Image Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Profile Image:</label>
                        <div class="text-center">
                            <img src="{{ asset($member->image) }}" class="img-fluid rounded" style="max-height: 150px;">
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
                            {{ $member->created_at->format('F j, Y \a\t g:i a') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="font-weight-bold">Last Updated:</label>
                        <p class="form-control-plaintext border-bottom pb-2">
                            {{ $member->updated_at->format('F j, Y \a\t g:i a') }}
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="row mt-4">
                <div class="col-12">
                    <a href="{{ route('boardmembers.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection