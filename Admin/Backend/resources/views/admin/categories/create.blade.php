@extends('layouts.master')
@section('title')
    Create Category
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    
    <!-- Breadcrumb -->
    <x-breadcrumb title="Create Category" pagetitle="Products" />

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p><strong>Whoops!</strong> There were some problems with your input.</p>
            <ul>
                <!-- === THIS IS THE FIX === -->
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach <!-- Was @endAll -->
                <!-- === END OF FIX === -->
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <!-- Left Column (Main Form) -->
            <div class="col-xl-9 col-lg-8">
                
                <!-- Card 1: Category Details -->
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                        <i class="bi bi-tags"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-1">Category Details</h5>
                                <p class="text-muted mb-0">Fill all information for the new category.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name-input">Category Name</label>
                            <input type="text" class="form-control" name="name" id="name-input"
                                placeholder="Enter category name" value="{{ old('name') }}" required>
                            <div class="invalid-feedback">Please enter a category name.</div>
                            <div class="form-text">The "slug" will be automatically generated from this name.</div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-success w-sm">Create Category</button>
                </div>
            </div>
            <!-- end col -->

            <!-- Right Sidebar Column -->
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish Status</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Set the category's status.</p>
                        <div class="mb-3">
                            <label for="status-input" class="form-label">Status</label>
                            <select class="form-select" id="status-input" name="status" data-choices data-choices-search-false>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </form>
@endsection
@section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection