<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
//

    public function getAllManufacturers()
    {
        $manufacturers = Manufacturer::all();
        return $manufacturers;
    }

}
