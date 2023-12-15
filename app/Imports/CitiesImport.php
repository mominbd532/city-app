<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\City;


class CitiesImport implements ToCollection, WithHeadingRow
{


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            if (isset($row['city'])) {
                City::create([
                    'city'    => $row['city'],
                    'city_ascii'    => $row['city_ascii'],
                    'state_id'    => $row['state_id'],
                    'state_name'    => $row['state_name'],
                    'county_fips'    => $row['county_fips'],
                    'county_name'    => $row['county_name'],
                    'lat'    => $row['lat'],
                    'lng'    => $row['lng'],
                    'population'    => $row['population'],
                    'density'    => $row['density'],
                    'source'    => $row['source'],
                    'military'    => $row['military'] == 'TRUE' ? 1 : 0,
                    'incorporated'    => $row['incorporated']  == 'TRUE' ? 1 : 0,
                    'timezone'    => $row['timezone'],
                    'ranking'    => $row['ranking'],
                    'zips'    => $row['zips'],
                    'id'    => $row['id']
                ]);
            }
        }
    }
}
