<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PersonService
{
    public function getAverageAge(): float
    {
        $result = DB::table('people')
            ->selectRaw('AVG(EXTRACT(YEAR FROM AGE(birthdate))) as average_age')
            ->first();

        return round($result->average_age, 2);
    }
}
