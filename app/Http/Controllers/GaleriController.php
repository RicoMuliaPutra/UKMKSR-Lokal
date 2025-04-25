<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index()
    {
        $tipe = request()->query('tipe', 'semua');

        $galeri = [];
        
        if ($tipe === 'semua' || $tipe === 'foto') {
            $gambarPath = public_path('layanan');
            if (File::exists($gambarPath)) {
                foreach (File::files($gambarPath) as $file) {
                    $ext = strtolower($file->getExtension());
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                        $galeri[] = [
                            'tipe' => 'gambar',
                            'path' => asset('layanan/' . $file->getFilename())
                        ];
                    }
                }
            }
        }

        if ($tipe === 'semua' || $tipe === 'video') {
            $videoPath = public_path('img');
            if (File::exists($videoPath)) {
                foreach (File::files($videoPath) as $file) {
                    $ext = strtolower($file->getExtension());
                    if ($ext === 'mp4') {
                        $galeri[] = [
                            'tipe' => 'video',
                            'path' => asset('img/' . $file->getFilename())
                        ];
                    }
                }
            }
        }

        return view('admin.galeri.index', compact('galeri', 'tipe'));
    }
}
