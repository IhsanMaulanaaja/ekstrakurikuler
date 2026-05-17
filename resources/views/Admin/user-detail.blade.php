@extends('layouts.admin')

@section('title', 'Detail Akun Siswa')

@section('content')
    <div class="content-card">
        <div class="content-header" style="justify-content: space-between; gap: 16px;">
            <div>
                <h1>Detail Akun Siswa</h1>
                <p>Informasi lengkap dan status verifikasi akun siswa.</p>
            </div>
            <a href="{{ route('user-approval.index') }}" class="btn-primary" style="padding:10px 16px;">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="grid-3" style="padding: 24px; gap: 24px;">
            <div class="card" style="grid-column: span 2;">
                <div style="display:flex; align-items:center; gap:24px; margin-bottom:24px;">
                    <div style="width:72px; height:72px; border-radius:999px; background:#3b82f6; display:flex; align-items:center; justify-content:center; color:#fff; font-size:28px; font-weight:800;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <h2 style="font-size:28px; margin-bottom:8px; color:#111827;">{{ $user->name }}</h2>
                        <span class="status-pill status-{{ $user->status }}">{{ ucfirst($user->status) }}</span>
                    </div>
                </div>
                <div class="grid-2" style="gap: 24px;">
                    <div>
                        <h3 style="font-size:13px; font-weight:700; color:#6b7280; text-transform:uppercase; margin-bottom:8px;">Email</h3>
                        <p style="font-size:18px; color:#111827;">{{ $user->email }}</p>
                    </div>
                    <div>
                        <h3 style="font-size:13px; font-weight:700; color:#6b7280; text-transform:uppercase; margin-bottom:8px;">NISN</h3>
                        <p style="font-size:18px; color:#111827;">{{ $user->nisn ?? 'Tidak diisi' }}</p>
                    </div>
                    <div>
                        <h3 style="font-size:13px; font-weight:700; color:#6b7280; text-transform:uppercase; margin-bottom:8px;">Kelas</h3>
                        <p style="font-size:18px; color:#111827;">{{ $user->kelas ?? 'Tidak diisi' }}</p>
                    </div>
                    <div>
                        <h3 style="font-size:13px; font-weight:700; color:#6b7280; text-transform:uppercase; margin-bottom:8px;">No. Telepon</h3>
                        <p style="font-size:18px; color:#111827;">{{ $user->nomor_telepon ?? 'Tidak diisi' }}</p>
                    </div>
                    <div>
                        <h3 style="font-size:13px; font-weight:700; color:#6b7280; text-transform:uppercase; margin-bottom:8px;">Role</h3>
                        <p style="font-size:18px; color:#111827; text-transform:capitalize;">{{ $user->role }}</p>
                    </div>
                    <div style="grid-column: span 2;">
                        <h3 style="font-size:13px; font-weight:700; color:#6b7280; text-transform:uppercase; margin-bottom:8px;">Alamat</h3>
                        <p style="font-size:18px; color:#111827;">{{ $user->alamat ?? 'Tidak diisi' }}</p>
                    </div>
                    <div>
                        <h3 style="font-size:13px; font-weight:700; color:#6b7280; text-transform:uppercase; margin-bottom:8px;">Terdaftar Sejak</h3>
                        <p style="font-size:18px; color:#111827;">{{ $user->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <div>
                        <h3 style="font-size:13px; font-weight:700; color:#6b7280; text-transform:uppercase; margin-bottom:8px;">Update Terakhir</h3>
                        <p style="font-size:18px; color:#111827;">{{ $user->updated_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
            <div class="card">
                @if ($user->status === 'pending')
                    <div style="margin-bottom:24px;">
                        <h3 style="font-size:18px; font-weight:700; margin-bottom:16px; color:#111827;">Aksi Persetujuan</h3>
                        <form action="{{ route('user-approval.approve', $user->id) }}" method="POST" style="margin-bottom:12px;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" onclick="return confirm('Setujui akun ini?')" class="btn-success" style="width:100%;"> <i class="fas fa-check"></i> Setujui Akun</button>
                        </form>
                        <form action="{{ route('user-approval.reject', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" onclick="return confirm('Tolak akun ini?')" class="btn-danger" style="width:100%;"> <i class="fas fa-ban"></i> Tolak Akun</button>
                        </form>
                    </div>
                @elseif ($user->status === 'rejected')
                    <div style="background:#fee2e2; border-radius:16px; padding:20px; margin-bottom:24px;">
                        <p style="color:#991b1b; font-weight:700; margin-bottom:16px;"><i class="fas fa-exclamation-circle"></i> Akun ditolak</p>
                        <form action="{{ route('user-approval.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus akun ini secara permanen?')" class="btn-secondary" style="width:100%;"> <i class="fas fa-trash"></i> Hapus Akun</button>
                        </form>
                    </div>
                @else
                    <div style="background:#d1fae5; border-radius:16px; padding:20px; margin-bottom:24px;">
                        <p style="color:#064e3b; font-weight:700;"><i class="fas fa-check-circle"></i> Akun sudah disetujui</p>
                    </div>
                @endif

                <div class="info-box">
                    <h4><i class="fas fa-info-circle"></i> Info Persetujuan</h4>
                    <p>Periksa data siswa dengan teliti sebelum memberikan persetujuan.</p>
                    <ul>
                        <li>✓ Pastikan siswa dari sekolah yang benar</li>
                        <li>✓ Verifikasi data kelas dan jurusan</li>
                        <li>✓ Hubungi siswa jika ada data yang mencurigakan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
