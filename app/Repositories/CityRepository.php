<?php 

namespace App\Repositories;

use App\Models\City;
Use App\Jobs\ExcelImportJob;

class CityRepository
{
    public function all()
    {

        
        return City::where(function ($query) {
           
            \request()->state_name ? $query->where('state_name', \request()->state_name) : "";
            \request()->county_name ? $query->where('county_name', \request()->county_name) : "";
           
            return $query;
        })->get();
    }

    public function find($id)
    {
        return City::find($id);
    }

    public function create($data)
    {
        return City::create($data);
    }

    public function update($id, $data)
    {
        $City = City::find($id);
        $City->update($data);
        return $City;
    }

    public function delete($id)
    {
        return City::destroy($id);
    }

    public function bulk_upload($data){

        
    $file = $data->file('file')->storeAs('imports', 'import-file.xlsx', 'public');

    $jobId = uniqid();
   
    ExcelImportJob::dispatch($file, $jobId)->onQueue('imports');

        return $jobId;
    }

    public function states_countries(){
        $data['state_names'] = City::distinct()->pluck('state_name');
        $data['county_name'] = City::distinct()->pluck('county_name');
       return $data;
    }
}