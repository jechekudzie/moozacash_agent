<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beneficiaries = Auth::user()->beneficiaries()->get();
        return view('beneficiaries.index')->with('beneficiaries', $beneficiaries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiary $beneficiary)
    {
        //
    }

    public function addBeneficiary(Request $request)
    {
        //create new beneficiary
        $beneficiary = new User();
        $beneficiary->name = $request->name;
        $beneficiary->number = $request->phone;
        $beneficiary->national_id = $request->national_id;
        $beneficiary->password = Hash::make($request->phone);
        $beneficiary->save();

        //set up as beneficiaries
        DB::insert('insert into user_user (user_id, beneficiary_id) values (?, ?)', [Auth::user()->id, $beneficiary->id]);
        return back();
    }

    public function connectBeneficiary(Request $request)
    {
        DB::insert('insert into user_user (user_id, beneficiary_id) values (?, ?)', [Auth::user()->id, $request->id]);
        return back();
    }

}
