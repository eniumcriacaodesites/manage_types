<?php

namespace EniumCriacaoSites\Types\Http;

use App\Http\Controllers\Controller;
use EniumCriacaoSites\Types\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index(Request $request)
    {

        $sort = json_decode($request->get('sort', json_encode(['order' => 'asc', 'column' => 'created_at'], JSON_THROW_ON_ERROR)), true, 512, JSON_THROW_ON_ERROR);

        $items = Type::filter($request->all())->orderBy($sort['column'], $sort['order'])->paginate((int) $request->get('perPage', 10));

        return response()->json([
            'items' => $items->items(),
            'pagination' => [
                'currentPage' => $items->currentPage(),
                'perPage' => $items->perPage(),
                'total' => $items->total(),
                'totalPages' => $items->lastPage()
            ]
        ]);
    }

    public function store(Request $request)
    {

        $dados = $request->all();

        $create = Type::create($dados);

        if ($create) {
            return response()
                ->json(['type' => $create, 'message' => __('Data added correctly')]);
        }

        return response()->json(['message' => __('An error occurred while saving data')], 500);
    }


    public function update(Request $request, Type $type)
    {

        $dados = $request->all();

        $update = $type->update($dados);

        if ($update) {
            return response()
                ->json(['type' => $type, 'message' => __('Data updated correctly')]);
        }

        return response()->json(['message' => __('An error occurred while saving data')], 500);
    }

    public function show(Type $type)
    {
        return response()->json($type);
    }


    public function destroy($id)
    {

        if (Type::find($id)->delete()) {
            return responder()
                ->success(['message' => "Dados apagados definitivamente!"])
                ->respond();
        }

        return responder()
            ->error(__('An error occurred while saving the data'))
            ->respond(500);
    }
}