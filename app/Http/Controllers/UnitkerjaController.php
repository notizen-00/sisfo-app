<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\UnitKerja;
class UnitkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('UnitKerja/index',[
            'data'=>UnitKerja::get()
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
        $validator = $request->validate([
            'pagu'=>'required|integer',
            'nama_unit'=>'required'
        ],
            [
                'required' => 'Wajib di isi',    
            ]
        );
    
       $unit_kerja = UnitKerja::create($validator);

        if($unit_kerja)
        {
            return to_route('unitkerja.index')->with('message','Data Berhasil di tambahkan');

        }else{

            return to_route('unitkerja.create')->with('message','Data gagal di tambahkan');

        }
    
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
}
