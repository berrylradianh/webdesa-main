<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        Template::create([
            'name' => 'Surat Keterangan Domisili',
            'file_path' => 'templates/aHxLg2NkDWBUxxyXyIIC1F5S07DOC2SKD3lypVpf.pdf',
            'description' => 'Untuk keterangan domisili warga desa',
            'created_by' => 1, // pastikan ada user dengan id=1
        ]);

        Template::create([
            'name' => 'Surat Pengantar KTP',
            'file_path' => 'templates/giRnSNGxnsDdViaaW2RGS3Oi46WMRU3bfUVHPJmJ.pdf',
            'description' => 'Pengantar untuk pembuatan e-KTP',
            'created_by' => 1,
        ]);

        Template::create([
            'name' => 'Surat Keterangan Usaha',
            'file_path' => 'templates/XQskqXykmqj5bYmvYwCxs4g6CHN9r6PYD6Pscbs9.pdf',
            'description' => 'Untuk keperluan administrasi usaha',
            'created_by' => 1,
        ]);

    }
}
