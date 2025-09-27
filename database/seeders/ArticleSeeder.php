<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'judul' => 'Selamat Datang di Desa Kita',
                'konten' => 'Desa kita kini lebih modern dengan layanan online terbaru...',
                'gambar' => 'berita1.jpg',
                'author_id' => 1,
                'status' => 'published',
            ],
            [
                'judul' => 'Kegiatan Gotong Royong',
                'konten' => 'Warga desa bersama-sama melakukan kegiatan gotong royong...',
                'gambar' => 'berita2.jpg',
                'author_id' => 1,
                'status' => 'draft',
            ],
            [
                'judul' => 'Informasi Layanan Publik',
                'konten' => 'Layanan publik desa dapat diakses secara online melalui portal...',
                'gambar' => null,
                'author_id' => 2,
                'status' => 'published',
            ],
        ];

        foreach ($articles as $article) {
            Article::create([
                ...$article,
                'slug' => Str::slug($article['judul']),
            ]);
        }
    }
}
