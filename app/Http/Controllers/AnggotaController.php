<?php

namespace App\Http\Controllers;

use App\Exports\AnggotaExport;
use App\Models\Anggota;
use App\Http\Requests\AnggotaRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

use function Laravel\Prompts\form;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $anggota = Anggota::latest();

        if ($request->has('search')) {
            $anggota = $anggota->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('tempat_lahir', 'like', '%' . $request->search . '%')
                ->orWhere('tanggal_lahir', 'like', '%' . $request->search . '%')
                ->orWhere('alamat', 'like', '%' . $request->search . '%')
                ->orWhere('jenis_kelamin', 'like', '%' . $request->search . '%')
                ->orWhere('no_telp', 'like', '%' . $request->search . '%');
        }
        return view("anggota.anggota", [
            'anggotas' => $anggota->paginate(5)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnggotaRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images');
        }

        Anggota::create($data);
        return redirect('/anggota')->with('alert', [
            'type' => 'success',
            'message' => 'Data Anggota berhasil ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggotum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggotum)
    {
        return view('anggota.form', [
            'anggota' => $anggotum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnggotaRequest $request, Anggota $anggotum)
    {
        $form = $request->validated();
        if ($request->hasFile('foto')) {
            if ($anggotum->foto) {
                Storage::delete($anggotum->foto);
            }
            $form['foto'] = $request->file('foto')->store('images');
        }
        $anggotum->update($form);
        return redirect('/anggota')->with('alert', [
            'type' => 'success',
            'message' => 'Data Anggota berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggotum)
    {
        $anggotum->delete();

        return redirect('/anggota')->with('alert', [
            'type' => 'success',
            'message' => 'Data Anggota berhasil dihapus'
        ]);
    }
    public function export($type)
    {
        switch ($type) {
            case 'pdf':
                $anggotas = Anggota::latest()->get();
                $pdf = Pdf::loadView('anggota.print', ['anggotas' => $anggotas]);
                return $pdf->download('Laporan Anggota.pdf');
            case 'excel':
                return Excel::download(new AnggotaExport, 'Laporan Anggota.xlsx');
            default:
                abort(404);
        }
    }
}
