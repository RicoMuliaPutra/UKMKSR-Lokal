<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tentang;
use App\Models\Sejarah;
use App\Models\Info;
use App\Models\VisiMisi;



class tentangSeeder extends Seeder
{

    public function run(): void{
        tentang::create([
            'deskripsi_ksr' => 'Lambang UKM KSR PMI Politeknik Negeri Jember sebagai relawan PMI adalah berbentuk perisai dengan delapan sudut lancip yang berlandasan prinsip dasar pertama kali yang dicetuskan di Indonesia, serta prinsip tambahan yang dimaksud yaitu Ketuhanan. Didalamnya terdapat warna putih yang melambangkan kenetralan dan diatasnya tertulis “KSR PMI” yang merupakan identitas Relawan, lambang intisari POLIJE dan tulisan POLIJE dibawahnya sebagai identitas lembaga yang menaungi UKM KSR PMI Politeknik Negeri Jember.'
        ]);

        sejarah::create([
            'deskripsi_ksr' => 'UKM KSR PMI Politeknik Negeri Jember didirikan pada tanggal 04 April 2009 di Politeknik Negeri Jember.UKM KSR PMI ini bertempat di Politeknik Negeri Jember sebagai salah satu Unit Kegiatan Mahasiswa.UKM KSR PMI Politeknik Negeri Jember ini berasaskan Pancasila, Tri Dharma Perguruan Tinggi dan Prinsip Dasar Gerakan Internasional Palang Merah dan Bulan Sabit Merah sebagai suatu organisasi kemanusiaan. UKM KSR PMI Politeknik Negeri Jember berfungsi sebagai salah satu wadah untuk merencanakan, melaksanakan dan mengembangkan kapasitas anggota melalui kegiatan kepalangmerahan dan pengabdian kepada masyarakat'
        ]);

        visimisi::create([
            'deskripsi_visi_misi_ksr' => '
            <h3>Visi</h3>
            <p>Terwujudnya UKM KSR PMI Politeknik Negeri Jember sebagai organisasi kemanusiaan yang beranggota dengan akhlak, profesional, dan solidaritas.</p>

            <h3>Misi</h3>
            <ol>
                <li>Mengutamakan adab daripada ilmu</li>
                <li>Mengembangkan ilmu kepalangmerahan anggota</li>
                <li>Meningkatkan kerjasama dan kedisiplinan anggota</li>
                <li>Menjunjung tinggi loyalitas dalam berorganisasi</li>
                <li>Menumbuhkan kepekaan terhadap sesama</li>
            </ol>
        '
        ]);

        info::create([
            'link_yt_info_ksr' => 'https://youtube.com/@ksrpmipolije?si=ykRgf84OOGtyxFMu'
        ]);
    }
}
