<?php 

namespace App\Repositories;

use App\Models\City;

class CityRepository
{
    public function all()
    {
        return City::all();
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
}