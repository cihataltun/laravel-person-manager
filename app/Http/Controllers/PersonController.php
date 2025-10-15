<?php

namespace App\Http\Controllers;

use App\Services\PersonService;
use Illuminate\Http\JsonResponse;

class PersonController extends Controller
{
    public function __construct(private PersonService $personService) {}

    public function averageAge(): JsonResponse
    {
        $startTime = microtime(true);

        $averageAge = $this->personService->getAverageAge();

        $executionTime = round((microtime(true) - $startTime) * 1000, 2);

        return response()->json([
            'average_age' => $averageAge,
            'execution_time_ms' => $executionTime,
            'message' => $executionTime < 1000 ? 'Method 1 saniyenin altında çalıştı' : 'Method 1 saniyeyi aştı'
        ]);
    }
}
