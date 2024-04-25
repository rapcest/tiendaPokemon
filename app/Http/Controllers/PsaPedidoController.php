<?php

namespace App\Http\Controllers;

use App\Models\PsaPedido;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Requests\PsaPedidos\StoreRequest;
use Illuminate\Support\Facades\Auth;

class PsaPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = PsaPedido::orderBy('direccion', 'ASC')->get();
        //dd($pedidos);
        return Inertia::render('PsaPedidos/index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('PsaPedidos/create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('avatar');

        if($request->hasFile('avatar')){
           $file = $request->file('avatar');
            $routeName = $file->store('avatars', ['disk'=>'public']);
            $data['avatar'] = $routeName;
        }
        $data['user_id'] = Auth::user()->id;
        $data['id_producto'] = '1';
       // dd($data);

        PsaPedido::create($data);

        return to_route('psapedido.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PsaPedido $psaPedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PsaPedido $psaPedido)
    {
        dd($psaPedido);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PsaPedido $psaPedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PsaPedido $psaPedido)
    {
        //
    }
}
