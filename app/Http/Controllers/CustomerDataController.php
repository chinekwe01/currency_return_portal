<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\CustomerData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerData = CustomerData::latest()->paginate(10);
        return view('managerHome', compact('customerData'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('return-currency');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|max:255',
            'address' => 'required',
            'options' =>'required',
            'pieces' => 'required',
            'checked' =>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        CustomerData::create($request->all());
        // dd($request->all());

        return redirect()->route('welcome')->with('success','Data Entry created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerData  $customerData
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerData $customerData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerData  $customerData
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerData $customerData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerData  $customerData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerData $customerData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerData  $customerData
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerData = CustomerData::findOrFail($id);
        $customerData->delete();

        return redirect()->route('manager.home')->with('success','Customer Data deleted successfully.');
    }
}
