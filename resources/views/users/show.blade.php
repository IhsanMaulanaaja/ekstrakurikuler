@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Detail Pengguna</h1>
                <p class="mt-2 text-gray-600">Informasi lengkap pengguna</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('users.edit', $user->id) }}" class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    Edit
                </a>
                <a href="{{ route('users.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-gray-700 hover:bg-gray-50">
                    Kembali
                </a>
            </div>
        </div>

        <!-- User Details -->
        <div class="mx-auto max-w-2xl rounded-lg bg-white p-8 shadow">
            <div class="grid gap-6">
                <!-- Name -->
                <div class="border-b pb-4">
                    <p class="text-sm font-medium text-gray-600">Nama Lengkap</p>
                    <p class="mt-2 text-lg text-gray-900">{{ $user->name }}</p>
                </div>

                <!-- Email -->
                <div class="border-b pb-4">
                    <p class="text-sm font-medium text-gray-600">Email</p>
                    <p class="mt-2 text-lg text-gray-900">{{ $user->email }}</p>
                </div>

                <!-- Role -->
                <div class="border-b pb-4">
                    <p class="text-sm font-medium text-gray-600">Role</p>
                    <div class="mt-2">
                        @php
                            $badgeClass = match($user->role) {
                                'admin' => 'bg-red-100 text-red-800',
                                'pembina' => 'bg-yellow-100 text-yellow-800',
                                'siswa' => 'bg-blue-100 text-blue-800',
                                default => 'bg-gray-100 text-gray-800'
                            };
                        @endphp
                        <span class="inline-block rounded-full px-4 py-2 font-semibold uppercase {{ $badgeClass }}">
                            {{ $user->role }}
                        </span>
                    </div>
                </div>

                <!-- Nomor Telepon -->
                <div class="border-b pb-4">
                    <p class="text-sm font-medium text-gray-600">Nomor Telepon</p>
                    <p class="mt-2 text-lg text-gray-900">{{ $user->nomor_telepon ?? '-' }}</p>
                </div>

                <!-- Alamat -->
                <div class="border-b pb-4">
                    <p class="text-sm font-medium text-gray-600">Alamat</p>
                    <p class="mt-2 text-gray-900">{{ $user->alamat ?? '-' }}</p>
                </div>

                <!-- Jurusan -->
                <div class="border-b pb-4">
                    <p class="text-sm font-medium text-gray-600">Jurusan</p>
                    <p class="mt-2 text-lg text-gray-900">{{ $user->jurusan ?? '-' }}</p>
                </div>

                <!-- Kelas -->
                <div class="border-b pb-4">
                    <p class="text-sm font-medium text-gray-600">Kelas</p>
                    <p class="mt-2 text-lg text-gray-900">{{ $user->kelas ?? '-' }}</p>
                </div>

                <!-- Created At -->
                <div class="border-b pb-4">
                    <p class="text-sm font-medium text-gray-600">Dibuat Pada</p>
                    <p class="mt-2 text-lg text-gray-900">{{ $user->created_at->format('d M Y H:i') }}</p>
                </div>

                <!-- Updated At -->
                <div>
                    <p class="text-sm font-medium text-gray-600">Diperbarui Pada</p>
                    <p class="mt-2 text-lg text-gray-900">{{ $user->updated_at->format('d M Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
