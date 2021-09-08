<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CityRepository;
use Illuminate\Http\Response;

class CityController extends Controller
{
    private CityRepository $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * List all resources
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function list($stateid)
    {
        $response['data'] = $this->cityRepository->citiesByState($stateid);
        $response['status'] = Response::HTTP_OK;

        return response()->json($response, Response::HTTP_OK);
    }
}
