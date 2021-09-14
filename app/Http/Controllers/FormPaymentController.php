<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FormPaymentRepository;
use Illuminate\Http\Response;
use App\Validations\FormPaymentValidation;

class FormPaymentController extends Controller
{
    private FormPaymentRepository $formPaymentRepository;

    public function __construct(FormPaymentRepository $formPaymentRepository)
    {
        $this->repository = $formPaymentRepository;
    }

    /**
     * List all resources
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $response['data'] = $this->repository->fetchAll('id', 'DESC', 15, ($request->input('search') ?? ''));
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

        $client = $this->repository->where([
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

        $validatorHasError = FormPaymentValidation::formValidate($request->all());

        if (!empty($validatorHasError)) {
            $response['data'] = $validatorHasError;
            $response['status'] = Response::HTTP_BAD_REQUEST;

            return response()->json($response, $response['status']);
        }

        try {
            $data['description'] = $request->input('description');

            $response['data'] = $this->repository->store($data);
        } catch (\Exception $exception) {
            $response['data'] = $exception->getMessage();
            $response['status'] = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json($response, $response['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $response['data'] = [];
        $response['status'] = Response::HTTP_OK;

        $validatorHasError = FormPaymentValidation::formValidate($request->all(), true);

        if (!empty($validatorHasError)) {
            $response['data'] = $validatorHasError;
            $response['status'] = Response::HTTP_BAD_REQUEST;

            return response()->json($response, $response['status']);
        }

        try {
            $data['description'] = $request->input('description');
            $data['enable'] = $request->input('enable');

            $response['data'] = $this->repository->update($uuid, $data);
        } catch (\Exception $exception) {
            $response['data'] = $exception->getMessage();
            $response['status'] = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json($response, $response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $response = [
            'data' => "Registro excluído!",
            'status' => Response::HTTP_OK
        ];

        try {
            $this->repository->delete($uuid);
        } catch (\Exception $e) {
            $response['data'] = 'Erro ao processar sua requisição!';
            $response['status'] = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json($response, $response['status']);
    }
}
