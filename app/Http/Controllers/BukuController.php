<?php

namespace App\Http\Controllers;

use App\Exports\BukuExport;
use App\Models\Buku;
use App\Http\Requests\BukuRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bukus = Buku::latest();

        if ($request->has('search')) {
            $bukus = $bukus->where('kode', 'like', '%' . $request->search . '%')
                ->orWhere('isbn', 'like', '%' . $request->search . '%')
                ->orWhere('nama_buku', 'like', '%' . $request->search . '%')
                ->orWhere('pengarang', 'like', '%' . $request->search . '%')
                ->orWhere('penerbit', 'like', '%' . $request->search . '%')
                ->orWhere('tahun_terbit', 'like', '%' . $request->search . '%')
                ->orWhere('deskripsi', 'like', '%' . $request->search . '%')
                ->orWhere('status', 'like', '%' . $request->search . '%');
        }
        return view('buku.buku', [
            'bukus' => $bukus->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BukuRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('images');
        }
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('files');
        }
        Buku::create($data);
        return redirect('/buku')->with('alert', [
            'type' => 'success',
            'message' => 'Data Buku berhasil ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.form', [
            'buku' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BukuRequest $request, Buku $buku)
    {
        $form = $request->validated();

        if ($request->hasFile('cover')) {
            if ($buku->cover) {
                Storage::delete($buku->cover);
            }
            $form['cover'] = $request->file('cover')->store('images');
        }
        if ($request->hasFile('file')) {
            if ($buku->file) {
                Storage::delete($buku->file);
            }
            $form['file'] = $request->file('file')->store('files');
        }
        $buku->update($form);
        return redirect('/buku')->with('alert', [
            'type' => 'success',
            'message' => 'Data Buku berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect('/buku')->with('alert', [
            'type' => 'success',
            'message' => 'Data Buku berhasil dihapus'
        ]);
    }

    public function export($type)
    {
        switch ($type) {
            case 'pdf':
                $bukus = Buku::latest()->get();
                $pdf = Pdf::loadView('buku.print', ['bukus' => $bukus]);
                return $pdf->download('Laporan Buku.pdf');
            case 'excel':
                return Excel::download(new BukuExport, 'Laporan Buku.xlsx');
            default:
                abort(404);
        }
    }
}
