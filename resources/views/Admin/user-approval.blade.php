@extends('layouts.admin')

@section('title', 'Persetujuan Akun')

@section('content')
<div class="content-card">
    <div class="content-header">
        <div>
            <h1>Manajemen Persetujuan Akun Siswa</h1>
            <p>Kelola pendaftaran dan persetujuan akun siswa baru.</p>
        </div>
    </div>

    <style>
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .user-approval-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .user-approval-table th,
        .user-approval-table td {
            padding: 12px 14px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 14px;
        }

       .user-approval-table th {
    background: #f8fafc;
    color: #475569;
    font-weight: 700;
    text-align: left;
}

.user-approval-table th:last-child,
.user-approval-table td:last-child {
    text-align: center;
}

        .user-approval-table tbody tr:hover {
            background: #f9fafb;
        }

        .user-approval-table th:nth-child(1),
        .user-approval-table td:nth-child(1) {
            width: 22%;
        }

        .user-approval-table th:nth-child(2),
        .user-approval-table td:nth-child(2) {
            width: 18%;
        }

        .user-approval-table th:nth-child(3),
        .user-approval-table td:nth-child(3) {
            width: 22%;
        }

        .user-approval-table th:nth-child(4),
        .user-approval-table td:nth-child(4) {
            width: 14%;
        }

        .user-approval-table th:nth-child(5),
        .user-approval-table td:nth-child(5) {
            width: 14%;
        }

        .user-approval-table th:nth-child(6),
        .user-approval-table td:nth-child(6) {
            width: 20%;
            text-align: center;
        }

        .btn-list {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-success,
        .btn-danger,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 7px 12px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            color: white;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-primary {
            background: #3b82f6;
        }

        .btn-success {
            background: #10b981;
        }

        .btn-danger {
            background: #ef4444;
        }

        .btn-secondary {
            background: #6b7280;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .btn-success:hover {
            background: #059669;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 0 0;
            margin-top: 16px;
            border-top: 1px solid #e5e7eb;
        }

        .pagination-info {
            font-size: 13px;
            color: #6b7280;
            font-weight: 600;
        }

        .pagination-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pagination-links a,
        .pagination-links span {
            min-width: 34px;
            height: 34px;
            padding: 0 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            color: #111827;
            background: white;
        }

        .pagination-links a:hover {
            border-color: #3b82f6;
            color: #3b82f6;
        }

        .pagination-links .active {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .pagination-links .disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .section-card {
            margin-bottom: 24px;
            border-radius: 18px;
            overflow: hidden;
            background: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .section-header {
            padding: 18px 24px;
            color: white;
        }

        .section-header h2 {
            font-size: 20px;
            font-weight: 800;
        }
    </style>

    <div style="padding:24px;">

        @if ($message = Session::get('success'))
            <div style="background:#ecfdf5; border:1px solid #34d399; color:#065f46; padding:16px; border-radius:12px; margin-bottom:18px;">
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div style="background:#fee2e2; border:1px solid #f87171; color:#991b1b; padding:16px; border-radius:12px; margin-bottom:18px;">
                {{ $message }}
            </div>
        @endif

        {{-- PENDING --}}
        <div class="section-card">
            <div class="section-header" style="background:#f59e0b;">
                <h2>Akun Menunggu Persetujuan ({{ $pendingUsers->total() }})</h2>
            </div>

            <div style="padding:20px;">
                <div class="table-responsive">
                    <table class="user-approval-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Email</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pendingUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->nisn ?? '-' }}</td>
                                <td>{{ $user->email }}</td>
                                @php
                                    $displayKelas = $user->kelas ?? '';
                                    if ($user->jurusan) {
                                        // only append jurusan if it's not already present in kelas
                                        if (stripos($displayKelas, $user->jurusan) === false) {
                                            $displayKelas = trim($displayKelas . ' ' . $user->jurusan);
                                        }
                                    }
                                @endphp
                                <td>{{ $displayKelas ?: '-' }}</td>
                                <td>{{ $user->created_at->translatedFormat('d M Y H:i') }}</td>

                                <td>
                                    <div class="btn-list">

                                        <a href="{{ route('user-approval.show', $user->id) }}" class="btn-primary">
                                            <i class="fas fa-eye"></i>
                                            Lihat
                                        </a>

                                        <form action="{{ route('user-approval.approve', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                onclick="return confirm('Setujui akun ini?')"
                                                class="btn-success">

                                                <i class="fas fa-check"></i>
                                                Setujui
                                            </button>
                                        </form>

                                        <form action="{{ route('user-approval.reject', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                onclick="return confirm('Tolak akun ini?')"
                                                class="btn-danger">

                                                <i class="fas fa-times"></i>
                                                Tolak
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Showing {{ $pendingUsers->firstItem() ?? 0 }}
                        to {{ $pendingUsers->lastItem() ?? 0 }}
                        of {{ $pendingUsers->total() }} results
                    </div>

                    <div class="pagination-links">

    @if ($pendingUsers->onFirstPage())
        <span class="disabled">‹</span>
    @else
        <a href="{{ $pendingUsers->previousPageUrl() }}">‹</a>
    @endif

    @for ($i = 1; $i <= $pendingUsers->lastPage(); $i++)
        @if ($i == $pendingUsers->currentPage())
            <span class="active">{{ $i }}</span>
        @else
            <a href="{{ $pendingUsers->url($i) }}">{{ $i }}</a>
        @endif
    @endfor

    @if ($pendingUsers->hasMorePages())
        <a href="{{ $pendingUsers->nextPageUrl() }}">›</a>
    @else
        <span class="disabled">›</span>
    @endif

</div>
                </div>
            </div>
        </div>

        {{-- APPROVED --}}
        <div class="section-card">
            <div class="section-header" style="background:#10b981;">
                <h2>Akun Disetujui ({{ $approvedUsers->total() }})</h2>
            </div>

            <div style="padding:20px;">
                <div class="table-responsive">
                    <table class="user-approval-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Kelas</th>
                                <th>Disetujui</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($approvedUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @php
                                    $displayKelas = $user->kelas ?? '';
                                    if ($user->jurusan) {
                                        if (stripos($displayKelas, $user->jurusan) === false) {
                                            $displayKelas = trim($displayKelas . ' ' . $user->jurusan);
                                        }
                                    }
                                @endphp
                                <td>{{ $displayKelas ?: '-' }}</td>
                                <td>{{ $user->updated_at->translatedFormat('d M Y') }}</td>

                               <td>
                                    <a href="{{ route('user-approval.show', $user->id) }}" class="btn-primary">
                                        <i class="fas fa-eye"></i>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Showing {{ $approvedUsers->firstItem() ?? 0 }}
                        to {{ $approvedUsers->lastItem() ?? 0 }}
                        of {{ $approvedUsers->total() }} results
                    </div>

                    <div class="pagination-links">

    @if ($approvedUsers->onFirstPage())
        <span class="disabled">‹</span>
    @else
        <a href="{{ $approvedUsers->previousPageUrl() }}">‹</a>
    @endif

    @for ($i = 1; $i <= $approvedUsers->lastPage(); $i++)
        @if ($i == $approvedUsers->currentPage())
            <span class="active">{{ $i }}</span>
        @else
            <a href="{{ $approvedUsers->url($i) }}">{{ $i }}</a>
        @endif
    @endfor

    @if ($approvedUsers->hasMorePages())
        <a href="{{ $approvedUsers->nextPageUrl() }}">›</a>
    @else
        <span class="disabled">›</span>
    @endif

</div>
                </div>
            </div>
        </div>

        {{-- REJECTED --}}
        <div class="section-card">
            <div class="section-header" style="background:#ef4444;">
                <h2>Akun Ditolak ({{ $rejectedUsers->total() }})</h2>
            </div>

            <div style="padding:20px;">
                <div class="table-responsive">
                    <table class="user-approval-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Kelas</th>
                                <th>Ditolak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($rejectedUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->kelas ?? '-' }}</td>
                                <td>{{ $user->updated_at->translatedFormat('d M Y') }}</td>

                                <td style="text-align:center;">
                                    <form action="{{ route('user-approval.delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Hapus akun ini?')"
                                            class="btn-secondary">

                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Showing {{ $rejectedUsers->firstItem() ?? 0 }}
                        to {{ $rejectedUsers->lastItem() ?? 0 }}
                        of {{ $rejectedUsers->total() }} results
                    </div>

                   <div class="pagination-links">

    @if ($rejectedUsers->onFirstPage())
        <span class="disabled">‹</span>
    @else
        <a href="{{ $rejectedUsers->previousPageUrl() }}">‹</a>
    @endif

    @for ($i = 1; $i <= $rejectedUsers->lastPage(); $i++)
        @if ($i == $rejectedUsers->currentPage())
            <span class="active">{{ $i }}</span>
        @else
            <a href="{{ $rejectedUsers->url($i) }}">{{ $i }}</a>
        @endif
    @endfor

    @if ($rejectedUsers->hasMorePages())
        <a href="{{ $rejectedUsers->nextPageUrl() }}">›</a>
    @else
        <span class="disabled">›</span>
    @endif

</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection