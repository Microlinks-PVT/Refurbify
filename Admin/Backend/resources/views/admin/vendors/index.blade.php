@extends('layouts.master')
@section('title')
    Vendor List
@endsection
@section('css')
    @endsection
@section('content')

    <x-breadcrumb title="Vendor List" pagetitle="Vendors" />

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
                            <h5 class="card-title mb-0">All Vendors</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('admin.vendors.create') }}" class="btn btn-success">
                                <i class="bi bi-plus-lg me-1"></i> Add New Vendor
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Shop Name</th>
                                    <th scope="col">Vendor Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vendors as $vendor)
                                    <tr>
                                        <td>{{ $vendor->shop_name }}</td>
                                        
                                        <td>{{ $vendor->user->first_name ?? '' }} {{ $vendor->user->last_name ?? '' }}</td>
                                        <td>{{ $vendor->user->email ?? 'No email' }}</td>
                                        
                                        <td>
                                            @if ($vendor->status)
                                                <span class="badge bg-success-subtle text-success">Active</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.vendors.edit', $vendor->id) }}" class="btn btn-sm btn-soft-primary">Edit</a>
                                            
                                            <button type="button" class="btn btn-sm btn-soft-danger" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteVendorModal" 
                                                    data-id="{{ $vendor->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No vendors found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <div class="modal fade" id="deleteVendorModal" tabindex="-1" aria-labelledby="deleteVendorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteVendorModalLabel">Delete Vendor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this vendor? This will also delete their login account and cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    
                    <form id="deleteVendorForm" action="" method="POST">
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
            var deleteModal = document.getElementById('deleteVendorModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                // Button that triggered the modal
                var button = event.relatedTarget;
                
                // Extract info from data-id attribute
                var vendorId = button.getAttribute('data-id');
                
                // Construct the delete URL
                var deleteUrl = "{{ route('admin.vendors.destroy', ':id') }}";
                deleteUrl = deleteUrl.replace(':id', vendorId);
                
                // Update the modal's form action
                var deleteForm = document.getElementById('deleteVendorForm');
                deleteForm.setAttribute('action', deleteUrl);
            });
        });
    </script>
@endsection