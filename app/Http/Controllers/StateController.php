<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StateRepository;
use Illuminate\Http\Response;

class StateController extends Controller
{
    private StateRepository $stateRepository;

    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    /**
     * List all resources
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $response['data'] = $this->stateRepository->fetchAll('id', 'DESC', 30, ($request->input('search') ?? ''));
        $response['status'] = Response::HTTP_OK;

        return response()->json($response, Response::HTTP_OK);
    }
}
