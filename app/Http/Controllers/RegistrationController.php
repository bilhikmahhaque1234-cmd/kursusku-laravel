<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Participant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    // Halaman form pendaftaran: daftar kursus diambil dari database
    public function create()
    {
        $courses = Course::where('status', 'open')
            ->orderBy('name')
            ->get();

        return view('register', compact('courses'));
    }

    // Endpoint kuota (dipanggil fetch di halaman pendaftaran)
    public function availability(Request $request): JsonResponse
    {
        $course = Course::withCount('enrollments')->find($request->query('course'));

        if (! $course) {
            return response()->json(['message' => 'Kursus tidak ditemukan.'], 404);
        }

        return response()->json([
            'course'    => $course->name,
            'quota'     => $course->quota,
            'remaining' => max($course->quota - $course->enrollments_count, 0),
        ]);
    }

    // Simpan pendaftaran: buat/ambil participant, lalu buat enrollment
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'nama'   => ['required', 'string', 'max:100'],
                'email'  => ['required', 'email', 'max:120'],
                'kursus' => ['required', 'exists:courses,id'],
            ],
            [
                'nama.required'   => 'Nama lengkap wajib diisi.',
                'email.required'  => 'Alamat email wajib diisi.',
                'email.email'     => 'Format email tidak valid.',
                'kursus.required' => 'Silakan pilih kursus.',
                'kursus.exists'   => 'Kursus tidak ditemukan.',
            ]
        );

        $course = Course::withCount('enrollments')->findOrFail($data['kursus']);

        if ($course->status !== 'open') {
            return back()->withInput()->withErrors(['kursus' => 'Pendaftaran kursus ini sedang ditutup.']);
        }

        if ($course->enrollments_count >= $course->quota) {
            return back()->withInput()->withErrors(['kursus' => 'Kuota kursus ini sudah penuh.']);
        }

        $participant = Participant::firstOrCreate(
            ['email' => $data['email']],
            ['name'  => $data['nama']]
        );

        if ($participant->enrollments()->where('course_id', $course->id)->exists()) {
            return back()->withInput()->withErrors(['kursus' => 'Email ini sudah terdaftar pada kursus tersebut.']);
        }

        $participant->enrollments()->create([
            'course_id' => $course->id,
            'status'    => 'registered',
        ]);

        return redirect()->route('enrollments.index')
            ->with('success', 'Pendaftaran berhasil! ' . $participant->name . ' terdaftar di ' . $course->name . '.');
    }
}
