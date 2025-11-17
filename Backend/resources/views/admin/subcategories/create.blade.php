@extends('layouts.master')
@section('title')
    Create Sub-Category
@endsection
@section('css')
    @endsection
@section('content')
    
    <x-breadcrumb title="Create Sub-Category" pagetitle="Products" />

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

    <form action="{{ route('admin.subcategories.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-1">Sub-Category Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="category-id-input">Parent Category</label>
                            <select class="form-select" name="category_id" id="category-id-input" data-choices data-choices-search-false required>
                                <option value="">Select a parent category...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a parent category.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="name-input">Sub-Category Name</label>
                            <input type="text" class="form-control" name="name" id="name-input"
                                placeholder="Enter sub-category name" value="{{ old('name') }}" required>
                            <div class="invalid-feedback">Please enter a sub-category name.</div>
                            <div class="form-text">The "slug" will be automatically generated from this name.</div>
                        </div>
                    </div>
                </div>
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-success w-sm">Create Sub-Category</button>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish Status</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Set the sub-category's status.</p>
                        <div class="mb-3">
                            <label for="status-input" class="form-label">Status</label>
                            <select class="form-select" id="status-input" name="status" data-choices data-choices-search-false>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
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