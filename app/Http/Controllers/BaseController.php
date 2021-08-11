<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController {

    protected String $classe;

    public function index(Request $request)
    {
        return $this->classe::paginate($request->per_page);
    }

    public function store(Request $request)
    {
      return response()->json($this->classe::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) return $this->pageNotFound();

        return response()->json($recurso);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) return $this->pageNotFound();

        $recurso->fill($request->all());
        $recurso->save();

        return $recurso;
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = $this->classe::destroy($id);

        if (!$qtdRecursosRemovidos) return $this->pageNotFound();

        return response()->json('', 204);
    }

    public function pageNotFound()
    {
        return response()->json(['error' => 'Page Not Found'], 404);
    }
}
