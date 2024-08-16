<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Obat;
use App\Models\Pemakaian;
use App\Models\Mcu;
use App\Models\Alat;
use App\Models\Rest;
use App\Models\Os;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(){
        return view('auth/register');
    }

    public function showLoginForm()
    {
        return view('auth/index');
    }

    public function regist(request $request)
    {
        $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'image|file',
        ]);
        $request['password'] = Hash::make($request->password);
        if($request->file('foto')){
            $originalname = $request->foto->getClientOriginalName();
            $namafoto = $request->file('foto')->storeAs('public/post-image',$originalname);
        }
        $user = User::create([
            'uuid' => $uuid,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'level' => $request->level,
            'foto' => $originalname,
        ]);
        \Artisan::call('storage:link');
        $request->session()->flash('berhasil', 'Registrasi Berhasil!!');
        return redirect()->route('data-user');

    }
    
    public function onLogin(request $request)
    {
        $validasi = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }else{
            return back()->with('error','Email atau password yang anda masukkan salah');
        }

    }

    public function LogOut(request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function index()
    {
        $title = "Dashboard";
        $bulan = date('m');
        $user = User::all();
        $obat = Obat::all();
        $mcu = Mcu::all();
        $alat = Alat::all();
        $rest = Rest::whereMonth('tgl_rest',$bulan)->get();
        $pemakaian = Pemakaian::whereMonth('tgl_pemakaian',$bulan)->get();
        return view('dashboard', compact('title','user','pemakaian','obat','mcu','alat','rest'));
    }

    public function dataUser()
    {
        $title = "Data User";
        $user = User::all();
        $hari = date('l');
        switch($hari){
            case 'Sunday':
                $day = 'Minggu';
                break;
              case 'Monday':
                $day = 'Senin';
                break;
              case 'Tuesday':
                $day = 'Selasa';
                break;
              case 'Wednesday':
                $day = 'Rabu';
                break;
              case 'Thursday':
                $day = 'Kamis';
                break;
              case 'Friday':
                $day = 'Jumat';
                break;
              case 'Saturday':
                $day = 'Sabtu';
                break;
              default:
                'hari tidak valid';
        }
        date_default_timezone_set("Asia/jakarta");
        $hariindo = $day.", ". date('d M Y');
        return view('user/data_user', compact('title','user','hariindo'))->with('no');
    }

    public function editUser($id, Request $request)
    {
        $users = User::find($id);

        // kalau ada foto, update fotonya
        if ($request->hasFile('foto')) {
        $users->foto = $request->file('foto')->store('public');
        }

        // kalau password diisi, maka ganti
        if ($request->filled('password')) {
        $users->password = bcrypt($request->password);
        }

        $users->name = $request->name;
        $users->email = $request->email;
        $users->level = $request->level;
        $users->save();
        $request->session()->flash("update","Data ".$request->name." berhasil diubah");
        return redirect()->route('data-user');
    }

    public function dataOs(Request $request)
    {
        $title = "Data Outsorching";
        // $user = User::all();
        $hari = date('l');
        switch($hari){
            case 'Sunday':
                $day = 'Minggu';
                break;
              case 'Monday':
                $day = 'Senin';
                break;
              case 'Tuesday':
                $day = 'Selasa';
                break;
              case 'Wednesday':
                $day = 'Rabu';
                break;
              case 'Thursday':
                $day = 'Kamis';
                break;
              case 'Friday':
                $day = 'Jumat';
                break;
              case 'Saturday':
                $day = 'Sabtu';
                break;
              default:
                'hari tidak valid';
        }
        date_default_timezone_set("Asia/jakarta");
        $hariindo = $day.", ". date('d M Y');
        if($request->ajax()){
            $os = Os::query()
            ->select('id_os','nik','nama','kode_section')
            ->get();
            return DataTables::of($os)
            ->make(true);            
        }
        return view('user/data_os',compact('title','hariindo'));
    }
}
