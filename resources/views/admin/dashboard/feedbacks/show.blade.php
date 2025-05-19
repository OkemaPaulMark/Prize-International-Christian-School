@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5>Feedback Details</h5>
        </div>
        <div class="card-body">
            <!-- Name Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Name:</label>
                        <p class="form-control-plaintext border-bottom pb-2">{{ $feedback->name }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Email Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Email:</label>
                        <p class="form-control-plaintext border-bottom pb-2">{{ $feedback->email }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Subject Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Subject:</label>
                        <p class="form-control-plaintext border-bottom pb-2">{{ $feedback->subject }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Message Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Message:</label>
                        <div class="card">
                            <div class="card-body">
                                <p class="form-control-plaintext">{{ $feedback->message }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Dates Row -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="font-weight-bold">Submitted At:</label>
                        <p class="form-control-plaintext border-bottom pb-2">
                            {{ $feedback->created_at->format('F j, Y \a\t g:i a') }}
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Back Button -->
            <div class="row mt-4">
                <div class="col-12">
                    <a href="{{ route('feedbacks.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection