<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $cityId = $request->input('kota');
        $BranchOptions = [];
        if ($cityId) {
            $BranchOptions = Branch::whereHas('district', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })->get();
        }

        return view('register',[
            'title' => 'Register',
            'branches' => $BranchOptions
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
        $branches = Branch::whereHas('district', function ($query) use ($cityId) {
            $query->where('city_id', $cityId);
        })->get();
        return response()->json($branches);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role_id' => 'required',
            'email' => 'required|email:dns|unique:users|max:100',
            'username' => 'required|unique:users',
            'name' => 'required|max:255',
            'whatsapp' => 'required|numeric',
            'address' => 'required|max:255',
            'password' => 'required|min:5|max:255|confirmed',
            'password_confirmation' => 'required|same:password',
            'branch_id' => 'required',
            'saldo' => 'required'
        ]);

        User::create([
            'role_id' => $validatedData['role_id'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'name' => $validatedData['name'],
            'whatsapp' => $validatedData['whatsapp'],
            'address' => $validatedData['address'],
            'password' => Hash::make($validatedData['password']),
            'branch_id' => $validatedData['branch_id'],
            'saldo' => $validatedData['saldo']
        ]);

        return redirect('/login')->with('success', 'Pendaftaran Berhasil!');
    }
}
