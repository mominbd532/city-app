<?php

namespace App\Services;

use App\Repositories\CityRepository;

class CityService
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function getAllCites()
    {
        return $this->cityRepository->all();
    }

    public function getCityById($id)
    {
        return $this->cityRepository->find($id);
    }

    public function createCity($data)
    {
        return $this->cityRepository->create($data);
    }

    public function updateCity($id, $data)
    {
        return $this->cityRepository->update($id, $data);
    }

    public function deleteCity($id)
    {
        return $this->cityRepository->delete($id);
    }

    public function bulkUpload($data){
        return $this->cityRepository->bulk_upload($data);
    }

    public function statesCountries(){
        return $this->cityRepository->states_countries();
    }

    public function search(){
        return $this->cityRepository->search();
    }

}