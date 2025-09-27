<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    /**
     * List semua template
     */
    public function index()
    {
        $templates = Template::with('creator')->latest()->paginate(10);
        return view('backend.admin.templates.index', compact('templates'));
    }

    /**
     * Form tambah template
     */
    public function create()
    {
        return view('backend.admin.templates.create');
    }

    /**
     * Simpan template baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
            'description' => 'nullable|string',
        ]);

        $filePath = $request->file('file')->store('templates', 'public');

        Template::create([
            'name' => $request->name,
            'file_path' => $filePath,
            'description' => $request->description,
            'created_by' => session('user_id'),
        ]);

        return redirect()->route('templates.index')->with('success', 'Template berhasil ditambahkan!');
    }

    /**
     * Edit template
     */
    public function edit(Template $template)
    {
        return view('backend.admin.templates.edit', compact('template'));
    }

    /**
     * Update template
     */
    public function update(Request $request, Template $template)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'description' => 'nullable|string',
        ]);

        $filePath = $template->file_path;

        if ($request->hasFile('file')) {
            Storage::delete($template->file_path);
            $filePath = $request->file('file')->store('templates', 'public');
        }

        $template->update([
            'name' => $request->name,
            'file_path' => $filePath,
            'description' => $request->description,
        ]);

        return redirect()->route('templates.index')->with('success', 'Template berhasil diperbarui!');
    }

    /**
     * Hapus template
     */
    public function destroy(Template $template)
    {
        Storage::delete($template->file_path);
        $template->delete();

        return redirect()->route('templates.index')->with('success', 'Template berhasil dihapus!');
    }
}
