<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

use App\Models\Appointment;
use App\Models\DoctorSchedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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
        $dokter = User::with('dokter')->where('role', '1')->findOrFail($id);

        // Set locale Carbon ke bahasa Indonesia
        Carbon::setLocale('id');

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Ambil semua jadwal dokter untuk rentang tanggal minggu ini
        $schedules = DoctorSchedule::where('dokter_id', $dokter->id)
            ->whereBetween('date', [$startOfWeek->format('Y-m-d'), $endOfWeek->format('Y-m-d')])
            ->get()
            ->keyBy('date'); // Gunakan tanggal sebagai kunci

        $appointments = Appointment::where('dokter_id', $dokter->id)
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
                'slots' => [],
                'status' => 'Tidak Berpraktik'
            ];

            // Cek jika ada jadwal untuk tanggal ini dan aktif
            if (isset($schedules[$dateKey]) && $schedules[$dateKey]->is_active) {
                $schedule = $schedules[$dateKey];
                $startTime = Carbon::parse($schedule->start_time);
                $endTime = Carbon::parse($schedule->end_time);

                $period = CarbonPeriod::create($startTime, '30 minutes', $endTime->subMinutes(30));

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
            'dokters' => $dokter,
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
        return view('Landing.faq');
    }

    public function kontakKami()
    {
        return view('Landing.kontak');
    }

    public function kebijakanPrivasi()
    {
        return view('Landing.keb_privasi');
    }

}
