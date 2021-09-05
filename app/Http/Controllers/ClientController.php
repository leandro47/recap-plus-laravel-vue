<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * List all resources
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $response['data'] = $this->clientRepository->fetchAll('id', 'DESC', 15, ($request->input('search') ?? ''));
        $response['status'] = Response::HTTP_OK;

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param string $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $response['data'] = [];
        $response['status'] = Response::HTTP_OK;

        $client = $this->clientRepository->where([
            'uuid' => $uuid
        ])->first();

        return response()->json([
            'data' => $client,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
