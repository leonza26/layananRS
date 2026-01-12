<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\KontakKami;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    // Menampilkan daftar FAQ
    public function index()
    {
        $faqs = Faq::latest()->paginate(10);
        return view('admin.faq.faq', compact('faqs'));
    }

    // Menampilkan form tambah
    public function createFaq()
    {
        return view('admin.faq.create_faq');
    }

    // Menyimpan FAQ baru
    public function storeFaq(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'is_active' => true,
        ]);

        return redirect()->route('admin.manage.faq')->with('success', 'FAQ berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function editFaq($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    // Mengupdate FAQ
    public function updateFaq(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('admin.manage.faq')->with('success', 'FAQ berhasil diperbarui.');
    }

    // Menghapus FAQ
    public function deleteFaq($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.delete.faq')->with('success', 'FAQ berhasil dihapus.');
    }



    

    // menampilkan pertanyaan user 
    public function showQuestions()
    {
        // Urutkan dari yang terbaru
        $messages = KontakKami::latest()->paginate(10);
        return view('admin.quest_user', compact('messages'));
    }

    // Menghapus pesan
    public function destroy($id)
    {
        $message = KontakKami::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contact_messages.destroy')->with('success', 'Pesan berhasil dihapus.');
    }
    
    // Opsional: Menandai pesan sudah dibaca (bisa dikembangkan nanti)
    public function markAsRead($id)
    {
        $message = KontakKami::findOrFail($id);
        $message->update(['is_read' => true]);
        return back();
    }
}
