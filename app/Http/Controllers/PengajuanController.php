<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Validator;
class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Pengajuan $pengajuan)
    {   

        $role = auth()->user()->roles[0]->name;


        if($role == 'admin'){
            return Inertia::render('Pengajuan/index',[
                'pengajuan'=>$pengajuan::with('users')->get()
            ]);
        }else if($role == 'pengusul')
        {
            $pengusul_id = auth()->user()->id;
            return Inertia::render('Pengajuan/index',[  
                'pengajuan'=>$pengajuan::with('users')->where('users_id',$pengusul_id)->get()
            ]);
        }
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Pengajuan/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'users_id'=>'required|integer',
            'kode_mak' => 'required',
            'pjk' => 'required',
            'pagu'=>'required',
            'output'=>'required',
            'iku_id'=>'required',
            'nama_pengajuan' => 'required',
            'lokasi' => 'required',
            'tanggal_pelaksanaan' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_pelaksanaan',
            'file_rab'=>'required|mimes:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf',
            'file_tor'=>'required|mimes:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf'
        ],
            [
                'required' => 'Wajib di isi',    
                'after_or_equal' => 'Harus setelah tanggal pelaksanaan',
                'mimes' => 'Harus bertipe pdf,xlsx,csv'
            ]
        );
    
        $data = $validator + [
            'status_pengajuan' => '1'
        ];
       $pengajuan = Pengajuan::create($data);

        if($pengajuan)
        {
            if ($request->hasFile('file_rab')) {
                $fileRab = $request->file('file_rab');
                $filenameRab = 'file_rab_' . time() . '.' . $fileRab->getClientOriginalExtension();
                $pathRab = $fileRab->storeAs('public/files', $filenameRab);
                $pengajuan->update(['file_rab' => $filenameRab]);
            }
    
            if ($request->hasFile('file_tor')) {
                $fileTor = $request->file('file_tor');
                $filenameTor = 'file_tor_' . time() . '.' . $fileTor->getClientOriginalExtension();
                $pathTor = $fileTor->storeAs('public/files', $filenameTor);
                $pengajuan->update(['file_tor' => $filenameTor]);
            }
            return to_route('pengajuan.index');

        }else{

            return to_route('users.create');

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
