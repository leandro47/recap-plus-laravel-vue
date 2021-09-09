<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CityRepository;
use Illuminate\Http\Response;
use App\services\CityServices;

class CityController extends Controller
{
    private CityRepository $cityRepository;
    private CityServices $cityservices;

    public function __construct(CityRepository $cityRepository, CityServices $cityServices)
    {
        $this->cityRepository = $cityRepository;
        $this->cityservices = $cityServices;
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

        /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = $this->cityRepository->where([
            'id' => $id
        ])->first();

        $data = $this->cityservices->selectCityFormat($city);

        return response()->json([
            'data' => $data,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
