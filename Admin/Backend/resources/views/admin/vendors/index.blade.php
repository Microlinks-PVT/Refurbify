@extends('layouts.master')
@section('title')
    Vendor List
@endsection
@section('css')
    @endsection
@section('content')

    <x-breadcrumb title="Vendor List" pagetitle="Vendors" />

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
                                            <a href="#" class="btn btn-sm btn-soft-primary">Edit</a>
                                            <a href="#" class="btn btn-sm btn-soft-danger">Delete</a>
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
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection