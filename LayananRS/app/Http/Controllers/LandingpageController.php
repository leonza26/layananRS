<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Faq;

use App\Models\User;
use Carbon\CarbonPeriod;
use App\Models\KontakKami;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DoctorSchedule;
use App\Http\Controllers\Controller;

class LandingpageController extends Controller
{
    //
    // home page
    public function home()
    {
        return view('Landing.welcome');
    }

    // daftar dokter page
    public function daftarDokter()
    {
        $dokters = User::where('role', '1')->get();
        return view('Landing.daftar_dokter', compact('dokters'));
    }

    // jadwal dokter page
    public function jadwalDokter($id)
    {
            // 1. $id di sini adalah User ID
        $userDokter = User::with('dokter')->where('role', '1')->findOrFail($id);

        // Ambil ID dari tabel 'doctors', bukan tabel 'users'
        $realDoctorId = $userDokter->dokter->id;

        Carbon::setLocale('id');
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // 2. Gunakan nama kolom yang sesuai di DB (dokter_id) dan ID yang benar ($realDoctorId)
        $schedules = DoctorSchedule::where('dokter_id', $realDoctorId)
            ->whereBetween('date', [$startOfWeek->format('Y-m-d'), $endOfWeek->format('Y-m-d')])
            ->get()
            ->keyBy('date');

        // 3. Pastikan pencarian appointment juga menggunakan $realDoctorId
        $appointments = Appointment::where('doctor_id', $realDoctorId)
            ->whereBetween('appointment_time', [$startOfWeek, $endOfWeek])
            ->get()
            ->pluck('appointment_time')
            ->map(function ($item) {
                return $item->format('Y-m-d H:i');
            })
            ->toArray();

        $weeklySchedule = [];
        $currentDate = $startOfWeek->copy();

        for ($i = 0; $i < 7; $i++) {
            $dateKey = $currentDate->format('Y-m-d');
            $dayName = $currentDate->translatedFormat('l');
            $formattedDate = $currentDate->format('d M');

            $dayInfo = [
                'dayName' => $dayName,
                'date' => $formattedDate,
                'date_raw' => $dateKey,
                'slots' => [],
                'status' => 'Tidak Berpraktik'
            ];

            if (isset($schedules[$dateKey]) && $schedules[$dateKey]->is_active) {
                $schedule = $schedules[$dateKey];
                $startTime = Carbon::parse($schedule->start_time);
                $endTime = Carbon::parse($schedule->end_time);

                // Membuat slot per 30 menit
                $period = CarbonPeriod::create($startTime, '30 minutes', $endTime->copy()->subMinutes(30));

                $availableSlots = [];
                foreach ($period as $slot) {
                    $slotDateTime = $currentDate->copy()->setTimeFrom($slot)->format('Y-m-d H:i');
                    if (!in_array($slotDateTime, $appointments)) {
                        $availableSlots[] = $slot->format('H:i');
                    }
                }

                if (!empty($availableSlots)) {
                    $dayInfo['slots'] = $availableSlots;
                    $dayInfo['status'] = 'Tersedia';
                } else {
                    $dayInfo['status'] = 'Jadwal Penuh';
                }
            }

            $weeklySchedule[] = $dayInfo;
            $currentDate->addDay();
        }

        $weekRange = $startOfWeek->format('d M') . ' - ' . $endOfWeek->format('d M Y');

        return view('Landing.jadwal_dokter', [
            'dokters' => $userDokter,
            'weeklySchedule' => $weeklySchedule,
            'weekRange' => $weekRange
        ]);
    }

    // riwayat page
    public function riwayat()
    {
        return view('Landing.riwayat');
    }

    // booking dokter page
    public function bookingDokter()
    {
        return view('Landing.booking_dokter');
    }

    public function faq()
    {
        $faqs = Faq::latest()->paginate(10);
        return view('Landing.faq', compact('faqs'));
    }

    public function kontakKami()
    {
        return view('Landing.kontak');
    }

    // Menyimpan pesan ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        KontakKami::create($request->all());

        return redirect()->route('contact')->with('success', 'Pesan Anda telah terkirim! Tim kami akan segera menghubungi Anda.');
    }

    public function kebijakanPrivasi()
    {
        return view('Landing.keb_privasi');
    }

}
