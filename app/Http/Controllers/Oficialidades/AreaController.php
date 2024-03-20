<?php

namespace App\Http\Controllers\Oficialidades;

use App\Http\Controllers\Controller;
use App\Http\Requests\Oficialidades\AreaRequest;
use App\Models\Oficialidades\Area;

class AreaController extends Controller
{
    public function index()
    {
        $query = Area::query();

        if (request()->has('search')) {
            $query = Area::search(request('search'));
        }

        return $query->get();
    }

    public function store(AreaRequest $request)
    {
        return Area::create($request->all());
    }

    public function show($id)
    {
        return Area::findOrFail($id);
    }

    public function update($id, AreaRequest $request)
    {
        $model = Area::findOrFail($id);

        return $model->update($request->all());
    }

    public function destroy($id)
    {
        return Area::findOrFail($id)->delete();
    }
}
