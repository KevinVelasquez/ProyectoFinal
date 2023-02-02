<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(5);

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        $input = $request->all();

        if($request->hasFile('imagen'))
        {
            $destination_path = 'public/images/productos';
            $imagen = $request->file('imagen');
            $imagen_name = $imagen->getClientOriginalName();
            $path = $request->file('imagen')->storeAs($destination_path,$imagen_name);

            $input['imagen'] = $imagen_name;
        }

        Producto::create($input);
        session()->flash('message',$input['nombre']. 'succesfully save');
        return redirect()->route('productos.index');

        //return redirect()->route('productos.index')
            //->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);
        $input= $request->all();

        $producto->update([
            'nombre' => 'nombre',
            'imagen' => 'imagen',
            'estado' => $input['estado'],
        ]);
        
        if($request->hasFile('imagen'))
        {
            $destination_path = 'public/images/productos';
            $imagen = $request->file('imagen');
            $imagen_name = $imagen->getClientOriginalName();
            $path = $request->file('imagen')->storeAs($destination_path,$imagen_name);

            $input['imagen'] = $imagen_name;
        }

        $producto->update($input);
        session()->flash('message',$input['nombre']. 'succesfully save');
        return redirect()->route('productos.index');

        // $producto->update($request->all());

        // return redirect()->route('productos.index')
        //     ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
