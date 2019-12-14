<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndentureRequest;
use App\Http\Requests\UpdateIndentureRequest;
use App\Http\Resources\Admin\IndentureResource;
use App\Indenture;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndentureApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('indenture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndentureResource(Indenture::all());
    }

    public function store(StoreIndentureRequest $request)
    {
        $indenture = Indenture::create($request->all());

        return (new IndentureResource($indenture))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Indenture $indenture)
    {
        abort_if(Gate::denies('indenture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndentureResource($indenture);
    }

    public function update(UpdateIndentureRequest $request, Indenture $indenture)
    {
        $indenture->update($request->all());

        return (new IndentureResource($indenture))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Indenture $indenture)
    {
        abort_if(Gate::denies('indenture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indenture->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
