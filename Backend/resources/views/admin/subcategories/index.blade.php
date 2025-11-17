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
                                @forelse ($subCategories as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->category->name ?? 'N/A' }}</td>
                                        <td>{{ $subcategory->slug }}</td>
                                        <td>
                                            @if ($subcategory->status)
                                                <span class="badge bg-success-subtle text-success">Active</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-soft-primary">Edit</a>
                                            
                                            <button type="button" class="btn btn-sm btn-soft-danger" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteModal" 
                                                    data-id="{{ $subcategory->id }}"> Delete
                                            </button>
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
    </div> <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Sub-Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this sub-category? This cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection @section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var subCategoryId = button.getAttribute('data-id');
                var deleteUrl = "{{ route('admin.subcategories.destroy', ':id') }}";
                deleteUrl = deleteUrl.replace(':id', subCategoryId);
                var deleteForm = document.getElementById('deleteForm');
                deleteForm.setAttribute('action', deleteUrl);
            });
        });
    </script>
@endsection