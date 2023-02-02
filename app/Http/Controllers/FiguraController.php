<?php

namespace App\Http\Controllers;

use App\Models\Figura;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Str;

/**
 * Class FiguraController
 * @package App\Http\Controllers
 */
class FiguraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $figuras = Figura::paginate();

        return view('figura.index', compact('figuras'))
            ->with('i', (request()->input('page', 1) - 1) * $figuras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $figura = new Figura();
        $cliente = Cliente::all();
        return view('figura.create', compact('figura','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Figura::$rules);

        $input = $request->all();

        if($request->hasFile('imagen'))
        {
            $destination_path = 'public/images/figuras';
            $imagen = $request->file('imagen');
            $extensionimagen = $imagen->getClientOriginalExtension();
            $imagen_name = Str::uuid() . '.' . $extensionimagen;
            $request->file('imagen')->storeAs($destination_path,$imagen_name);

            $input['imagen'] = $imagen_name;
        }

        Figura::create($input);
        return redirect()->route('figuras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $figura = Figura::find($id);
        $figuracliente = Figura::select('figuras.id_cliente','clientes.id','clientes.nombre')
        ->join('clientes','figuras.id_cliente','=','clientes.id')
        ->get();
        // print($figuracliente );
        // exit;
        $cliente = Cliente::all();
        return view('figura.edit', compact('figura','cliente','figuracliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Figura $figura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Figura $figura)
    {
        
        $input=$request->all();
        $figura->update([
            'etiqueta' => 'etiqueta',
            'id_cliente'=>$input['id_cliente']
        ]);
        

        if($request->hasFile('imagen'))
        {
            $destination_path = 'public/images/figuras';
            $imagen = $request->file('imagen');
            // $imagen_name = $imagen->getClientOriginalName();
            $extensionimagen = $imagen->getClientOriginalExtension();
            $imagen_name = Str::uuid() . '.' . $extensionimagen;
            $request->file('imagen')->storeAs($destination_path,$imagen_name);

            $input['imagen'] = $imagen_name;
        }
        $figura->update($input);

        return redirect()->route('figuras.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $figura = Figura::find($id)->delete();

        return redirect()->route('figuras.index');
    }
}
