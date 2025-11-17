@extends('layouts.master')
@section('title')
    Sub-Category List
@endsection
@section('css')
    @endsection
@section('content')

    <x-breadcrumb title="Sub-Category List" pagetitle="Products" />

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">All Sub-Categories</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('admin.subcategories.create') }}" class="btn btn-success">
                                <i class="bi bi-plus-lg me-1"></i> Add New Sub-Category
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Sub-Category Name</th>
                                    <th scope="col">Parent Category</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subCategories as $subCategory)
                                    <tr>
                                        <td>{{ $subCategory->name }}</td>
                                        <td>{{ $subCategory->category->name ?? 'N/A' }}</td>
                                        <td>{{ $subCategory->slug }}</td>
                                        <td>
                                            @if ($subCategory->status)
                                                <span class="badge bg-success-subtle text-success">Active</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-soft-primary">Edit</a>
                                            <button type."button" class="btn btn-sm btn-soft-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No sub-categories found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> @endsection @section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection