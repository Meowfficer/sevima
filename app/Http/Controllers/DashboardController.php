<?php

namespace App\Http\Controllers;

use App\Models\KelasMapel;
use App\Models\RoleKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:dashboard', ['only' => 'dashboard']);
    }

    public function dashboard()
    {
        $data['page_title'] = 'Dashboard';
        $data['breadcumb'] = 'Home';
        $data['kelases'] = RoleKelas::where('user_id', Auth::user()->id)->get();
        // dd($data['kelases'][0]->mapelKelas[0]->warna);

        return view('dashboard.index', $data);
    }

    public function createModal()
    {
        return view('modal-api.modal-create');
    }

    public function storeModal(Request $request)
    {
        try {
            // Get random value of array
            $array = array('success', 'warning', 'info', 'danger', 'info', 'dark');
            $k = array_rand($array);
            $v = $array[$k];

            // Insert data to Kelas Mapel
            $data = new KelasMapel;
            $data->nama_kelas = $request->nama_kelas;
            $data->deskripsi = $request->deskripsi_kelas;
            $data->kode_kelas = $this->generateRandomString();
            $data->warna = $v;
            $data->save();

            // Insert data of RoleKelas
            $role = new RoleKelas;
            $role->user_id = $request->id_user;
            $role->nama_role = 'ketua-kelas';
            $role->kelas_mapel_id = $data->id;
            $role->save(); 

            $response = (object)[
                'status' => 200,
                'message' => "Succes Insert"
            ];
            return json_encode($response);
        } catch (\Throwable $th) {
            $response = (object)[
                'status' => 400,
                'message' => $th->getMessage()
            ];
            return json_encode($response);
        }
    }

    public function detailKelas($id)
    {
        $data['page_title'] = 'Kelas Detail';
        $data['kelas'] = RoleKelas::where('kelas_mapel_id', $id)->first();
        $data['user'] = RoleKelas::where('kelas_mapel_id', $id)->get();
        // dd($data['user']->user);
        // $data['murid'] = KelasMapel::where('user_id', Auth::user()->id);
        return view('kelas.detail', $data);
    }
    
    public function createModalStudent(){
        return view('modal-api.modal-create-student');
    }
   
    public function storeModalStudent(Request $request)
    {
        try {
            // // Get random value of array
            // $array = array('success', 'warning', 'info', 'danger', 'info', 'dark');
            // $k = array_rand($array);
            // $v = $array[$k];

            // // Insert data to Kelas Mapel
            // $data = new KelasMapel;
            // $data->nama_kelas = $request->nama_kelas;
            // $data->warna = $v;
            // $data->save();

            // // Insert data of RoleKelas
            // $role = new RoleKelas;
            // $role->user_id = $request->id_user;
            // $role->nama_role = 'ketua-kelas';
            // $role->kelas_mapel_id = $data->id;
            // $role->save(); 

            $response = (object)[
                'status' => 200,
                'message' => "Succes Insert",
                'data' => $request->all()
            ];
            return json_encode($response);
        } catch (\Throwable $th) {
            $response = (object)[
                'status' => 400,
                'message' => $th->getMessage()
            ];
            return json_encode($response);
        }
    }

    function generateRandomString($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
