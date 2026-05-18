@extends('layouts.profile')

@section('title', 'Profile')

@section('header')
    <div>
        <h1 class="page-title">Profile</h1>
        <p class="page-subtitle">Update your account details and password.</p>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        <div class="p-0">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-0">
            @include('profile.partials.update-password-form')
        </div>

        <div class="p-0">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
