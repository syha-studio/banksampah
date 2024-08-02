<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $cityId = $request->input('kota');
        $DistrictOptions = [];
        if ($cityId) {
            $DistrictOptions = District::where('city_id', $cityId)->get();
        }

        return view('register',[
            'title' => 'Register',
            'districts' => $DistrictOptions
        ]);
    }

    public function getCity()
    {
        $CityOptions = City::all();

        return view('registerKota',[
            'title' => 'Choose City',
            'cities' => $CityOptions
        ]);
    }

    public function getDistrictsByCity($cityId)
    {
        $districts = District::where('city_id', $cityId)->get();
        return response()->json($districts);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role_id' => 'required',
            'email' => 'required|email:dns|unique:users|max:100',
            'id_number' => 'required|unique:users|digits:16|numeric',
            'name' => 'required|max:255',
            'whatsapp' => 'required|numeric',
            'district_id' => 'required',
            'address' => 'required|max:255',
            'password' => 'required|min:5|max:255|confirmed',
            'password_confirmation' => 'required|same:password',
            'branch_id' => 'required',
            'saldo' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create([
            'role_id' => $validatedData['role_id'],
            'email' => $validatedData['email'],
            'id_number' => $validatedData['id_number'],
            'name' => $validatedData['name'],
            'whatsapp' => $validatedData['whatsapp'],
            'district_id' => $validatedData['district_id'],
            'address' => $validatedData['address'],
            'password' => Hash::make($validatedData['password']),
            'branch_id' => $validatedData['branch_id'],
            'saldo' => $validatedData['saldo']
        ]);

        $request->session()->flash('success', 'Pendaftaran Berhasil!');

        return redirect('/login');
    }
}
