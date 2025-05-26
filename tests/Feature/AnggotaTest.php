<?php

namespace Tests\Feature;

use App\Models\Anggota;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AnggotaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use DatabaseTransactions;

    public function test_user_dapat_melihat_halaman_utama_anggota(): void
    {
        $user = User::factory()->create([
            'role' => 'humas_ksr', 
        ]);

        Anggota::factory()->count(5)->create([
            'status' => 'aktif',
            'angkatan' => rand(11, 15),
            'tanggal_lahir' => now()->subYears(20),
        ]);

        $response = $this->actingAs($user)->get('/anggota');

        $response->assertStatus(200);

        $response->assertViewIs('admin.anggota.index');

        $response->assertViewHasAll(['anggotas', 'angkatanList']);
    }

    public function test_user_dapat_tambah_anggota(): void
    {
        $user = User::factory()->create([
            'role' => 'humas_ksr', 
        ]);

        $anggota = Anggota::factory()->make([
            'nim' => 'E12345678', 
            'nama' => 'Jane Doe', 
            'status' => 'Aktif',
        ]);

        $response = $this->actingAs($user)->post('/anggota', $anggota->toArray());

        $response->assertRedirect('/anggota');

        $this->assertDatabaseHas('anggota', [
            'nim' => 'E12345678',
            'nama' => 'Jane Doe',
            'status' => 'Aktif',
        ]);
    }

    public function test_user_dapat_update_anggota(): void
    {
        $user = User::factory()->create([
            'role' => 'humas_ksr',
        ]);

        $anggota = Anggota::factory()->create();

        $dataUpdate = $anggota->toArray();
        $dataUpdate['nama'] = 'Jane Smith';
        $dataUpdate['status'] = 'Inaktif'; 

        $response = $this->actingAs($user)->put("/anggota/{$anggota->id}", $dataUpdate);

        $response->assertRedirect('/anggota');

        $this->assertDatabaseHas('anggota', [
            'id' => $anggota->id,
            'nama' => 'Jane Smith',
            'status' => 'Inaktif',
        ]);
    }
    public function test_user_dapat_menghapus_anggota(): void
    {
        $user = User::factory()->create([
            'role' => 'humas_ksr',
        ]);

        $anggota = Anggota::factory()->create([
            'nim' => 'E99999999',
            'nama' => 'Delete Me',
            'status' => 'Aktif',
        ]);

        $response = $this->actingAs($user)->delete("/anggota/{$anggota->id}");

        $response->assertRedirect('/anggota');

        $this->assertDatabaseMissing('anggota', [
            'id' => $anggota->id,
            'nama' => 'Delete Me',
        ]);
    }

}
