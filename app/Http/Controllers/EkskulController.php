<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use App\Models\User;

class EkskulController extends Controller
{
    public function index()
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        $ekskulList = Ekstrakurikuler::with('pembina')->get();
        return view('ekstrakurikuler.index', compact('ekskulList'));
    }

    public function create()
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        $pembinas = User::where('role', 'pembina')->get();
        return view('ekstrakurikuler.create', compact('pembinas'));
    }

    public function store(Request $request)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'nama' => 'required|string|max:255|unique:ekstrakurikuler',
            'deskripsi' => 'nullable|string',
            'pembina_id' => 'required|exists:users,id',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:5120',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'pembina_id']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/ekskul'), $filename);
            $data['foto'] = $filename;
        }

        Ekstrakurikuler::create($data);

        return redirect()->route('ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        $pembinas = User::where('role', 'pembina')->get();
        return view('ekstrakurikuler.edit', compact('ekstrakurikuler', 'pembinas'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'nama' => 'required|string|max:255|unique:ekstrakurikuler,nama,' . $ekstrakurikuler->id,
            'deskripsi' => 'nullable|string',
            'pembina_id' => 'required|exists:users,id',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:5120',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'pembina_id']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/ekskul'), $filename);
            $data['foto'] = $filename;
        }

        $ekstrakurikuler->update($data);

        return redirect()->route('ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        $ekstrakurikuler->delete();
        return redirect()->route('ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus');
    }

    public function pilihanEkskul()
    {
        $ekskulList = Ekstrakurikuler::all();
        return view('pilihan-ekskul-siswa', compact('ekskulList'));
    }

    public function editKuota()
    {
        $user = auth()->user();
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        $ekskul = Ekstrakurikuler::where('pembina_id', $user->id)->first();
        if (!$ekskul) {
            return redirect()->route('dashboard-pembina')->with('error', 'Ekstrakurikuler tidak ditemukan');
        }

        return view('ekstrakurikuler.edit-kuota', compact('ekskul'));
    }

    public function updateKuota(Request $request)
    {
        $user = auth()->user();
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        $ekskul = Ekstrakurikuler::where('pembina_id', $user->id)->first();
        if (!$ekskul) {
            return redirect()->route('dashboard-pembina')->with('error', 'Ekstrakurikuler tidak ditemukan');
        }

        $request->validate([
            'kuota' => 'required|integer|min:0|max:1000',
        ]);

        $ekskul->update([
            'kuota' => $request->kuota,
        ]);

        return redirect()->route('dashboard-pembina')->with('success', 'Kuota ekstrakurikuler berhasil diperbarui');
    }
}
