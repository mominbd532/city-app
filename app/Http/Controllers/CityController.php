<?php

namespace App\Http\Controllers;

use App\Services\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $cityService;
    
    public function __construct(CityService $cityService)
    {
        $this->middleware('auth');
        $this->cityService = $cityService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAllCites =  $this->cityService->getAllCites(); 
        $statesCountries =  $this->cityService->statesCountries(); 

        return view('admin.city.index',compact('getAllCites','statesCountries'));
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

    public function bulkUpload(Request $request){
        if($request->method() == 'POST'){
            $validated = $request->validate([
                'file' => 'required',
            ]);
         
            $jobId = $this->cityService->bulkUpload($request); 
            return view('admin.city.bulk-upload', compact('jobId'));

        }else{
            return view('admin.city.bulk-upload');
        }
       
    }
}
