<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\DataNilai;
use Illuminate\Support\Facades\Http;

class ClusteringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = DataNilai::getDataNilai();

        return view('admin.clustering.index', [
            'title'=>'Cluster',
            'anggotas'=> $anggotas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cluster(){
        $anggota = DataNilai::getAnggotaForClusters();
        $response = Http::post('http://127.0.0.1:5000/cluster', $anggota);
    
        if ($response->failed()) {
            dd('Error connecting to Python server', $response->body());
        }
        $clusterData = $response->json();
    
        if (is_array($clusterData)) {
            foreach ($clusterData as $data) {
                if (isset($data['anggota_id'], $data['cluster'])) {
                    DataNilai::where('anggota_id', $data['anggota_id'])->update([
                        'cluster' => $data['cluster']
                    ]);
                }
            }
        } else {
            dd('Data dari server tidak valid:', $response->body());
        }
    
        $anggotas = DataNilai::whereNotNull('cluster')->orderby('cluster', 'asc' )->paginate(10);

        $title = 'Cluster';
    
        return view('admin.clustering.cluster_anggota', compact('anggotas', 'title'));
    }
}
