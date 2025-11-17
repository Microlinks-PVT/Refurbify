@extends('layouts.master')
@section('title')
    Vendor Dashboard
@endsection
@section('content')
    <x-breadcrumb title="Dashboard" pagetitle="Vendor" />
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3>Welcome, {{ auth()->user()->first_name }}!</h3>
                    <p>This is your vendor dashboard.</p>
                </div>
            </div>
        </div>
    </div>
@endsection