<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use App\Models\Employees;
use App\Models\EmployeesPositions;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::with([
            'jabatan',
            'agama',
            'position.jabatan',
            'position.unitKerja',
        ])->paginate(10);

        // Tambahkan ini
        $unit = UnitKerja::all();

        return view('employee.index', compact('employees', 'unit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create', [
            'agama' => Agama::all(),
            'jabatan' => Jabatan::all(),
            'unitKerja' => UnitKerja::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:employees',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama_id' => 'required',
            'jabatan_id' => 'required',
            'tempat_tugas' => 'required',
            'unit_kerja_id' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_pegawai', 'public');
        }

        // Insert ke tabel employees
        $employee = Employees::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat_tugas' => $request->tempat_tugas,
            'agama_id' => $request->agama_id,
            'no_hp' => $request->no_hp,
            'npwp' => $request->npwp,
            'foto' => $fotoPath,
        ]);

        // Insert ke tabel employee_positions
        EmployeesPositions::create([
            'employee_id' => $employee->id,
            'jabatan_id' => $request->jabatan_id,
            'unit_kerja_id' => $request->unit_kerja_id,
            'tempat_tugas' => $request->tempat_tugas,
        ]);

        return redirect()->route('employees.create')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function byUnit($id)
    {
        $employees = Employees::whereHas('position', function ($q) use ($id) {
            $q->where('unit_kerja_id', $id);
        })->get();

        return view('employee.by-unit', compact('employees'));
    }

    public function print()
    {
        $employees = Employees::with([
            'jabatan',
            'agama',
            'position.jabatan',
            'position.unitKerja',
        ])->get();

        return view('employee.print', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employees::with(['position', 'agama'])->findOrFail($id);
        $agama = Agama::all();
        $jabatan = Jabatan::all();
        $unit_kerja = UnitKerja::all();

        return view('employee.edit', compact('employee', 'agama', 'jabatan', 'unit_kerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama_id' => 'required',
            'jabatan_id' => 'required',
            'unit_kerja_id' => 'required',
            'tempat_tugas' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $employee = Employees::findOrFail($id);

        // Update foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto_pegawai', 'public');
            $employee->foto = $foto;
        }

        // Update tabel employees
        $employee->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama_id' => $request->agama_id,
            'no_hp' => $request->no_hp,
            'npwp' => $request->npwp,
        ]);

        // Update tabel employee_positions
        EmployeesPositions::where('employee_id', $id)->update([
            'jabatan_id' => $request->jabatan_id,
            'unit_kerja_id' => $request->unit_kerja_id,
            'tempat_tugas' => $request->tempat_tugas,
        ]);

        return redirect()->route('employees.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        EmployeesPositions::where('employee_id', $id)->delete();
        Employees::findOrFail($id)->delete();

        return redirect()->route('employees.index')->with('success', 'Data berhasil dihapus');
    }
}
