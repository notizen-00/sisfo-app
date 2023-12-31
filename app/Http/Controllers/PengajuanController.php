<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
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
        else if($role == 'pimpinan')
        {
            return Inertia::render('Pengajuan/index',[
                'pengajuan'=>$pengajuan::with('users')->get()
            ]);
        }
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $iku = Pengajuan::select('nama_pengajuan','id')->get();

        return Inertia::render('Pengajuan/create',[
                'iku'=>$iku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $iku = serialize($request->iku_id);
        $role = auth()->user()->roles[0]->name;

        $validator = $request->validate([
            'users_id'=>'required|integer',
            'kode_mak' => 'required',
            'pjk' => 'required',
            'pagu'=>'required',
            'output'=>'required',
            'iku_id'=>'required|array',
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
                'mimes' => 'Harus bertipe pdf,xlsx,csv',
                'iku_id.array'=>'Format Tidak Valid'
            ]
        );
    
        $data = $validator + [
            'status_pengajuan' => '1',
            'iku' => $iku,
            'updated_by'=>$role
        ];
        unset($data['iku_id']);
        
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

        $detail = Pengajuan::where('id',$id)->get();

        return Inertia::render('Pengajuan/detail',[
            'detail'=>$detail
        ]);
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detail = Pengajuan::with('users')->where('id',$id)->get();

        return Inertia::render('Pengajuan/edit',[
            'detail'=>$detail
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $role = auth()->user()->roles[0]->name;

        $iku = serialize($request->iku_id);
        $validator = $request->validate([
            'users_id' => 'required|integer',
            'kode_mak' => 'required',
            'pjk' => 'required',
            'pagu' => 'required',
            'output' => 'required',
            'iku_id' => 'required|array',
            'nama_pengajuan' => 'required',
            'lokasi' => 'required',
            'tanggal_pelaksanaan' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_pelaksanaan',
            'file_rab' => $request->hasFile('file_rab') ? 'nullable|mimes:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf' : '',
            'file_tor' => $request->hasFile('file_tor') ? 'nullable|mimes:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf' : '',
        ],
        [
            'required' => 'Wajib di isi',
            'after_or_equal' => 'Harus setelah tanggal pelaksanaan',
            'mimes' => 'Harus bertipe pdf,xlsx,csv'
        ]);
    
        $pengajuanData = $validator + [
            'status_pengajuan' => '1',
            'iku'=>$iku,
            'updated_by'=>$role
        ];
        unset($pengajuanData['iku_id']);

        $pengajuan = Pengajuan::find($id);
    
        if (!$pengajuan) {
            return redirect()->route('users.create');
        }
    
        $pengajuan->update($pengajuanData);
    
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
    
        return redirect()->route('pengajuan.index');
    }
    
       

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
