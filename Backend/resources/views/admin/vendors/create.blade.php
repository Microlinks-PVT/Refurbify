@extends('layouts.master')
@section('title')
    Create Vendor
@endsection
@section('css')
    @endsection
@section('content')
    
    <x-breadcrumb title="Create Vendor" pagetitle="Vendors" />

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p><strong>Whoops!</strong> There were some problems with your input.</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <form action="{{ route('admin.vendors.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                        <i class="bi bi-person-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-1">Vendor Login Details</h5>
                                <p class="text-muted mb-0">Fill all information for the vendor's account.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="first_name-input">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name-input"
                                        placeholder="Enter vendor's first name" value="{{ old('first_name') }}" required>
                                    <div class="invalid-feedback">Please enter a first name.</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="last_name-input">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name-input"
                                        placeholder="Enter vendor's last name" value="{{ old('last_name') }}" required>
                                    <div class="invalid-feedback">Please enter a last name.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="email-input">Email</label>
                                    <input type="email" class="form-control" name="email" id="email-input"
                                        placeholder="Enter vendor's email" value="{{ old('email') }}" required>
                                    <div class="invalid-feedback">Please enter a valid email.</div>
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="password-input">Password</label>
                                    <input type="password" class="form-control" name="password" id="password-input"
                                        placeholder="Enter a strong password" required>
                                    <div class="invalid-feedback">Please enter a password.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                        <i class="bi bi-shop"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-1">Shop Details</h5>
                                <p class="text-muted mb-0">Fill all information for the vendor's shop.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="shop_name-input">Shop Name</label>
                                    <input type="text" class="form-control" name="shop_name" id="shop_name-input"
                                        placeholder="Enter shop name" value="{{ old('shop_name') }}" required>
                                    <div class="invalid-feedback">Please enter a shop name.</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="phone-input">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone-input"
                                        placeholder="Enter phone number" value="{{ old('phone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address-input">Address</label>
                            <textarea class="form-control" name="address" id="address-input" 
                                placeholder="Enter full shop address" rows="3">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-success w-sm">Create Vendor</button>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish Status</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Set the vendor's account status. They can only log in if "Active".</p>
                        <div class="mb-3">
                            <label for="status-input" class="form-label">Status</label>
                            <select class="form-select" id="status-input" name="status" data-choices data-choices-search-false>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="text-muted">
                            <p>An 'Inactive' vendor cannot log in to their account.</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection