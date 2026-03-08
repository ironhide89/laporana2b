<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index(){

        return view('index');
    }

    public function kendaraan(Request $request)
    {
        $vehicleType = $request->input('vehicle_type');  // Mendapatkan tipe kendaraan yang dipilih
    
        // Jika ada tipe kendaraan yang dipilih, filter berdasarkan tipe tersebut
        if ($vehicleType) {
            $vehicle = Vehicle::where('vehicle_type', $vehicleType)->paginate(3);
        } else {
            $vehicle = Vehicle::paginate(3);  // Jika tidak ada filter, tampilkan semua kendaraan
        }
    
        // Mengambil tipe kendaraan yang unik
        $vehicleTypes = Vehicle::pluck('vehicle_type')->unique();
    
        // Data tambahan
        $goodVehicles = Vehicle::where('vehicle_condition', 'Good Condition')->get();
        $maintenanceVehicles = Vehicle::where('vehicle_condition', 'Maintenance')->get();
        $good = $goodVehicles->count();
        $maintenance = $maintenanceVehicles->count();
    
        return view('kendaraan', compact('vehicle', 'good', 'maintenance', 'vehicleTypes'));
    }
    
    

    public function qr_code(){
        
        return view('qr_code');
    }

    public function leaderboard() {
        $leaderboard = User::where('role', 'user')
            ->orderByDesc('leaderboard') // Urutkan berdasarkan jumlah tugas selesai
            ->get();
    

        return view('leaderboard', compact('leaderboard'));
    }



    public function login()
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            // If the user is authenticated and their role is 'admin', redirect to dashboard-admin
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard_admin');
            }
            // If the user is authenticated and their role is 'user', redirect to user dashboard
            else if (Auth::user()->role == 'user') {
                return redirect()->route('user.todolist'); // Replace 'user-dashboard' with your route for the user
            }
        }

        // If the user is not authenticated, show the login page
        return view('loginpage.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($data)){
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard_admin'); // Alihkan ke dashboard admin
            } else {
                return redirect()->route('user.todolist'); // Alihkan ke dashboard pengguna
            }
        } else {
            // Jika otentikasi gagal
            return redirect()->route('login')->with('failed', 'Email atau password salah');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('succes','Kamu Berhasil Log out');
    } 

}

