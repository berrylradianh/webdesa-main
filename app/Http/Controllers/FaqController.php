<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    // Tampilkan semua FAQ
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();
        return view('backend.admin.faqsop.faq.index', compact('faqs'));
    }

    // Form tambah FAQ
    public function create()
    {
        return view('backend.admin.faqsop.faq.create');
    }

    // Simpan FAQ baru
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'user_id' => session('user_id'), // ambil dari session manual
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil ditambahkan.');
    }


    // Form edit FAQ
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('backend.admin.faqsop.faq.edit', compact('faq'));
    }

    // Update FAQ
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ berhasil diupdate.');
    }

    // Hapus FAQ
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
