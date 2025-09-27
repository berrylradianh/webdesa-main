<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyOption;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::with('questions.options')->orderBy('id', 'desc')->get();
        return view('backend.admin.surveys.index', compact('surveys'));
    }

    public function create()
    {
        return view('backend.admin.surveys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pertanyaan' => 'required|array',
            'tipe' => 'required|array',
        ]);

        $survey = Survey::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'user_id' => session('user_id'),
        ]);

        // Simpan pertanyaan & opsi
        foreach ($request->pertanyaan as $index => $pertanyaan) {
            $tipe = $request->tipe[$index];

            $question = SurveyQuestion::create([
                'survey_id' => $survey->id,
                'pertanyaan' => $pertanyaan,
                'tipe' => $tipe,
            ]);

            // kalau tipe pilihan, simpan opsi
            if ($tipe === 'pilihan' && isset($request->opsi[$index])) {
                foreach ($request->opsi[$index] as $opsi) {
                    if (!empty($opsi)) {
                        SurveyOption::create([
                            'question_id' => $question->id,
                            'opsi' => $opsi,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('surveys.index')->with('success', 'Survei berhasil dibuat.');
    }

    public function show($id)
    {
        $survey = Survey::with([
            'questions.options.answers',
            'questions.answers'
        ])->findOrFail($id);

        return view('backend.admin.surveys.show', compact('survey'));
    }

    public function edit($id)
    {
        $survey = Survey::with('questions.options')->findOrFail($id);
        return view('backend.admin.surveys.edit', compact('survey'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pertanyaan' => 'required|array',
            'tipe' => 'required|array',
        ]);

        $survey = Survey::findOrFail($id);
        $survey->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // Hapus pertanyaan lama → lalu buat ulang
        $survey->questions()->delete();

        foreach ($request->pertanyaan as $index => $pertanyaan) {
            $tipe = $request->tipe[$index];

            $question = SurveyQuestion::create([
                'survey_id' => $survey->id,
                'pertanyaan' => $pertanyaan,
                'tipe' => $tipe,
            ]);

            if ($tipe === 'pilihan' && isset($request->opsi[$index])) {
                foreach ($request->opsi[$index] as $opsi) {
                    if (!empty($opsi)) {
                        SurveyOption::create([
                            'question_id' => $question->id,
                            'opsi' => $opsi,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('surveys.index', $survey->id)->with('success', 'Survei berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->delete();
        return redirect()->route('surveys.index')->with('success', 'Survei berhasil dihapus.');
    }

    // ✅ Tambah Pertanyaan
    public function storeQuestion(Request $request, $surveyId)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'tipe' => 'required|in:pilihan,skala',
        ]);

        $question = SurveyQuestion::create([
            'survey_id' => $surveyId,
            'pertanyaan' => $request->pertanyaan,
            'tipe' => $request->tipe,
        ]);

        // kalau tipe pilihan → simpan opsi
        if ($request->tipe === 'pilihan' && $request->has('opsi')) {
            foreach ($request->opsi as $opsi) {
                if (!empty($opsi)) {
                    SurveyOption::create([
                        'question_id' => $question->id,
                        'opsi' => $opsi,
                    ]);
                }
            }
        }

        return back()->with('success', 'Pertanyaan berhasil ditambahkan.');
    }
}
