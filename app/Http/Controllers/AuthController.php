<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\User;
use App\Models\Siswa;
use App\Models\Guru;
 
 
class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { 
            $user = Auth::user();
            $id = Auth::id(); 
            if($user->jenis_ptk){
                return redirect()->to('/nilai?kode_guru='.$id );
            }else{
                return redirect()->to('/lihat-nilai?semester=1');
            }
        }
        return view('pages.login');
    }
 
    public function login(Request $request)
    { 
        // $data = [
        //     'kode_guru' => $request->input('username'),
        //     // 'password'  => Hash::make($request->input('password')),
        //     'password'  =>$request->input('password'),
        // ];
 
        // Auth::attempt($data);
        // if (Auth::guard('web')->attempt([
        //     'kode_guru' => $request->input('username'),
        //     'password'  =>$request->input('password'),
        //     ])) {
        //     // Authentication passed...
        //     $id = Auth::id(); 
        //     return redirect()->to('/nilai?kode_guru='.$id );
        // }else if(Auth::guard('siswa')->attempt([
        //     'nis' => $request->input('username'),
        //     'password'  =>$request->input('password'),
        //     ])){
        //     if (Auth::check()) { 
        //         $id = Auth::id(); 
        //         return redirect()->to('/lihat-nilai');
        //     } else { 
        //         Session::flash('error', 'Username atau password siswa salah');
        //         return redirect()->route('login');
        //     }
        // } else {
        //     Session::flash('error', 'Username atau password salah');
        //     return redirect()->route('login');
        // }

        $guru = Guru::where('nuptk',$request->input('username'))->first();
        $siswa = Siswa::find($request->input('username'));

        if($siswa){
            if(Hash::check($request->input('password'), $siswa->password)){
               Auth::guard('siswa')->login($siswa);
            }
            if (Auth::guard('siswa')->check()) { 
                $id = Auth::id(); 
                return redirect()->to('/lihat-nilai?semester=1');
            } else { 
                Session::flash('error', 'Username atau password siswa salah');
                return redirect()->route('login');
            }
        }else if($guru){
            if(Hash::check($request->input('password'), $guru->password)){
                Auth::login($guru);
            }
            if (Auth::check()) { 
                $id = Auth::id(); 
                $user = Auth::user(); 
                // return view(var_dump($user));
                if($user->jenis_ptk == "Guru Mapel"){
                    return redirect()->to('/nilai?kode_guru='.$id );
                }else if($user->jenis_ptk == "Kepala Sekolah"){
                    return redirect()->to('/lihat-ledger');
                }else{
                    return redirect()->to('/kelas');
                }
            } else { 
                Session::flash('error', 'Username atau password Guru salah');
                return redirect()->route('login');
            }
        }else { 
            Session::flash('error', 'Username atau password salah');
            return redirect()->route('login');
        }


        // if (Auth::check()) { 
        //     Session::flash('error', 'idk');

        //     // return redirect()->route('nilai');
        //     // $id = Auth::id(); 
        //     // return redirect()->to('/nilai?kode_guru='.$id );

        // } else { // false
        //     //Login Fail
        //     Session::flash('error', 'Username atau password salah');
        //     return redirect()->route('login');
        // }
 
    }
 
    public function showFormRegister()
    {
        return view('register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
 
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
 
    public function logout()
    {   

        if(Auth::check()){
            Auth::logout(); // menghapus session yang aktif
        }else{
            Auth::guard('siswa')->logout();
        }
        return redirect()->route('login');
    }

    public function profile()
    {

        return view('pages.profile');
    }
 
 
}
