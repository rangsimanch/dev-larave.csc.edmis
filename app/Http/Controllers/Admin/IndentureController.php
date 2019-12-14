<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyIndentureRequest;
use App\Http\Requests\StoreIndentureRequest;
use App\Http\Requests\UpdateIndentureRequest;
use App\Indenture;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndentureController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('indenture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indentures = Indenture::all();

        return view('admin.indentures.index', compact('indentures'));
    }

    public function create()
    {
        abort_if(Gate::denies('indenture_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indentures.create');
    }

    public function store(StoreIndentureRequest $request)
    {
        $indenture = Indenture::create($request->all());

        return redirect()->route('admin.indentures.index');
    }

    public function edit(Indenture $indenture)
    {
        abort_if(Gate::denies('indenture_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indentures.edit', compact('indenture'));
    }

    public function update(UpdateIndentureRequest $request, Indenture $indenture)
    {
        $indenture->update($request->all());

        return redirect()->route('admin.indentures.index');
    }

    public function show(Indenture $indenture)
    {
        abort_if(Gate::denies('indenture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indenture->load('indentureFileManagers', 'indentureTasks', 'indentureUsers', 'indentureRfas');

        return view('admin.indentures.show', compact('indenture'));
    }

    public function destroy(Indenture $indenture)
    {
        abort_if(Gate::denies('indenture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indenture->delete();

        return back();
    }

    public function massDestroy(MassDestroyIndentureRequest $request)
    {
        Indenture::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
