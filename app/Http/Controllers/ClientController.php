<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use Illuminate\Http\Response;
use App\Validations\ClientValidation;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response['data'] = [];
        $response['status'] = Response::HTTP_CREATED;

        $validatorHasError = ClientValidation::formValidate($request->all());

        if (!empty($validatorHasError)) {
            $response['data'] = $validatorHasError;
            $response['status'] = Response::HTTP_BAD_REQUEST;
            return response()->json($response, $response['status']);
        }

        try {
            $data['type'] = $request->input('type');
            $data['name'] = $request->input('name');
            $data['cpf_cnpj'] = $request->input('cpf_cnpj');
            $data['city'] = $request->input('city');
            $data['cep'] = $request->input('cep');
            $data['district'] = $request->input('district');
            $data['street'] = $request->input('street');
            $data['number'] = $request->input('number');
            $data['email'] = $request->input('email');
            $data['phone'] = $request->input('phone');
            $data['cell_phone'] = $request->input('cell_phone');

            $response['data'] = $this->clientRepository->store($data);
        } catch (\Exception $exception) {
            $response['data'] = $exception->getMessage();
            $response['status'] = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json($response, $response['status']);
    }
}
