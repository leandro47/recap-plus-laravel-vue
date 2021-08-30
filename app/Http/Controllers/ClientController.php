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

    public function list(Request $request)
    {
        $response['data'] = $this->clientRepository->fetchAll('id', 'DESC', 15, ($request->input('search') ?? ''));
        $response['status'] = Response::HTTP_OK;

        return response()->json($response, Response::HTTP_OK);
    }
}
