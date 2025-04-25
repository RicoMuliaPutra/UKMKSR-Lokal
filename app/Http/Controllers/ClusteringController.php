<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\Http;

class ClusteringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Anggota::where('status', 'aktif')->orderBy('angkatan', 'desc');
        $anggotas = $query->orderBy('angkatan', 'desc')->get();
        $title = 'Cluster';
        return view('admin.clustering.index', compact('anggotas', 'title'));
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
        $anggota = Anggota::getAnggotaForClusters();
        $response = Http::post('http://127.0.0.1:5000/cluster', $anggota);
    
        $clusterData = $response->json();
    
        if (is_array($clusterData)) {
            foreach ($clusterData as $data) {
                if (isset($data['id'], $data['cluster'])) {
                    Anggota::where('id', $data['id'])->update([
                        'cluster' => $data['cluster']
                    ]);
                }
            }
        } else {
            dd('Data dari server tidak valid:', $response->body());
        }
    
        $anggotas = Anggota::whereNotNull('cluster')->orderby('cluster', 'asc' )->get();

        $title = 'Cluster';
    
        return view('admin.clustering.cluster_anggota', compact('anggotas', 'title'));
    }
}
