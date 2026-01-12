<?php

namespace App\Http\Controllers\admin;

use App\Models\KontakKami;
use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    //
    public function admin()
    {
        $patient_amount = User::where('role', '2')->count();
        $doctor_amount = User::where('role', '1')->count();
        return view('admin.dashboard', compact('patient_amount', 'doctor_amount'));
    }

    // manage dokter
    public function manageDokter()
    {
        $doctors = User::where('role', '1')->get();

        return view('admin.manage.manage_dokter', compact('doctors'));
    }

    // view tambah dokter
    public function tambahDokter()
    {
        return view('admin.manage.tambah_dokter');
    }

    // tambah dokter
    public function storeDokter(Request $request)
    {
        // validasi input data dokter
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'specialization' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file foto
            'consultaion_fee' => 'required|numeric|min:0',
        ]);

        // buat data di tabel user
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => '1', // role 1 untuk dokter
            ]);

            // upload foto jika ada
            $photoUrl = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('doctor_photos', 'public');
                $photoUrl = asset('storage/' . $photoPath);
            }

            //  buat data di tabel dokter
            Dokter::create([
                'user_id' => $user->id,
                'specialization' => $request->specialization,
                'biography' => $request->biography,
                'photo_url' => $photoUrl, // Pastikan nama kolom di database benar
                'consultaion_fee' => $request->consultaion_fee,
            ]);

            DB::commit();

            return redirect()->route('admin.manage.dokter')->with('success', 'Dokter berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan dokter: ' . $e->getMessage())->withInput();
        }

    }

    // edit dokter
    public function editDokter($id)
    {
        $doctor = Dokter::where('user_id', $id)->with('user')->firstOrFail();

       return view('admin.manage.edit_dokter', compact('doctor'));
    }

    // update dokter
    public function updateDokter(Request $request, $id)
    {

        // validasi input data dokter
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'specialization' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'consultaion_fee' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $doctor = Dokter::where('user_id', $id)->firstOrFail();

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            $photoUrl = $doctor->photo_url;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('doctor_photos', 'public');
                $photoUrl = asset('storage/' . $photoPath);
            }

            $doctor->update([
                'specialization' => $request->specialization,
                'biography' => $request->biography,
                'photo_url' => $photoUrl,
                'consultaion_fee' => $request->consultaion_fee,
            ]);

            DB::commit();

            return redirect()->route('admin.manage.dokter')->with('success', 'Data dokter berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data dokter: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteDokter($id)
    {
        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            // Hapus data dokter terkait
            $user->dokter()->delete();
            // Hapus data user
            $user->delete();

            DB::commit();

            return redirect()->route('admin.manage.dokter')->with('success', 'Dokter berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus dokter: ' . $e->getMessage());
        }
    }

    // manage pasien
    public function managePasien()
    {

        return view('admin.manage.manage_pasien');
    }

    public function deletePasien($id)
    {
        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            // Hapus data pasien terkait
            $user->pasien()->delete();
            // Hapus data user
            $user->delete();

            DB::commit();

            return redirect()->route('admin.manage.pasien')->with('success', 'Pasien berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus pasien: ' . $e->getMessage());
        }
    }

    // manage janji temu
    public function manageJanjitemu()
    {
        // Inisialisasi variabel $appointments, contoh:
        $appointments = []; // atau query ke database
        return view('admin.manage.manage_janjitemu', compact('appointments')); // Variabel sudah didefinisikan
    }

    // manage pertanyaan user 
    public function questionUser()
    {
        $messages = KontakKami::latest()->paginate(10);
        return view('admin.quest_user', compact('messages'));
    }

    // laporan & analitik
    public function laporanAnalitik()
    {
        return view('admin.laporan');
    }

    // setting
    public function setting()
    {
        return view('admin.settings');
    }
}
