<?php

namespace App\Http\Controllers;

use App\Models\GuestBook;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    // USER submit
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'message' => 'required|string|max:1000',
        ]);

        GuestBook::create($request->all());

        return back()->with('success_guestbook', 'Thank you for your message! It has been received.');
    }

    // ADMIN lihat
    public function adminIndex(Request $request)
    {
        $messages = GuestBook::latest()->get();
        return view('admin.guestbook', compact('messages'));
    }

    // ADMIN hapus
    public function destroy(Request $request, GuestBook $guestbook)
    {
        $guestbook->delete();
        return back()->with('success', 'Pesan buku tamu berhasil dihapus');
    }
}
