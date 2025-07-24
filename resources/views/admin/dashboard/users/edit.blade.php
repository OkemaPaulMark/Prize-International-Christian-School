@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5>Edit User</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Name*</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Email*</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Role -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Role*</label>
                            <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>admin</option>
                                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>user</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <!-- Buttons -->
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update User
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
