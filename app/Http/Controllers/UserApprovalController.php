<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserApprovalController extends Controller
{
    /**
     * Display a listing of pending users.
     */
    public function index(): View
    {
        $pendingUsers = User::where('role', 'siswa')
                            ->where('status', 'pending')
                            ->orderBy('created_at', 'desc')
                            ->paginate(15);
        
        $approvedUsers = User::where('role', 'siswa')
                             ->where('status', 'approved')
                             ->orderBy('created_at', 'desc')
                             ->paginate(15);
        
        $rejectedUsers = User::where('role', 'siswa')
                             ->where('status', 'rejected')
                             ->orderBy('created_at', 'desc')
                             ->paginate(15);

        return view('Admin.user-approval', compact('pendingUsers', 'approvedUsers', 'rejectedUsers'));
    }

    /**
     * Approve a user account.
     */
    public function approve(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        
        if ($user->role !== 'siswa') {
            return back()->with('error', 'Hanya akun siswa yang dapat disetujui.');
        }

        $user->update(['status' => 'approved']);

        return back()->with('success', "Akun {$user->name} telah disetujui.");
    }

    /**
     * Reject a user account.
     */
    public function reject(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        
        if ($user->role !== 'siswa') {
            return back()->with('error', 'Hanya akun siswa yang dapat ditolak.');
        }

        $user->update(['status' => 'rejected']);

        return back()->with('success', "Akun {$user->name} telah ditolak.");
    }

    /**
     * Delete a rejected user account.
     */
    public function delete(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        
        if ($user->status !== 'rejected') {
            return back()->with('error', 'Hanya akun yang ditolak yang dapat dihapus.');
        }

        $userName = $user->name;
        $user->delete();

        return back()->with('success', "Akun {$userName} telah dihapus.");
    }

    /**
     * Show detail of a user.
     */
    public function show(string $id): View
    {
        $user = User::findOrFail($id);
        
        if ($user->role !== 'siswa') {
            abort(403);
        }

        return view('Admin.user-detail', compact('user'));
    }
}
