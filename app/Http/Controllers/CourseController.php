<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|min:3',
            'email'  => 'required|email',
            'kursus' => 'required'
        ]);

        return back()->with('success', 'Pendaftaran kursus berhasil dikirim!');
    }

    // Method Ajax untuk Cek Sisa Kursi
    public function checkAvailability(Request $request)
    {
        $data = [
            'Laravel Framework'       => 4,
            'PHP Native Fundamentals' => 8,
            'Web Design & UI/UX'      => 12
        ];

        $kursus = $request->get('course');
        $remaining = $data[$kursus] ?? 0;

        return response()->json([
            'course'    => $kursus,
            'remaining' => $remaining,
            'status'    => 'open'
        ]);
    }
}