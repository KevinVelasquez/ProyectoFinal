<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Str;

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
        $productos = Producto::paginate(12);
        $filtro = Producto::all();

        return view('producto.index', compact('productos', 'filtro'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage(12));
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
        //request()->validate(Producto::$rules);
        $request->validate([
            'nombre' => 'required|unique:productos,nombre',
            'imagen'=> 'required',
        ]);

        $input = $request->all();
        
        if($request->hasFile('imagen'))
        {
            $destination_path = 'public/images/productos';
            $imagen = $request->file('imagen');
            $extensiomimagen=$imagen->getClientOriginalExtension();
            $imagen_name = Str::uuid(). '.' . $extensiomimagen;
            $request->file('imagen')->storeAs($destination_path,$imagen_name);

            $input['imagen'] = $imagen_name;
        }

        Producto::create($input);
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
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $productoestado= Producto::find($id);
        return view('producto.edit', compact('producto','productoestado'));
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
        $old_nombre = $producto->nombre;
        $input= $request->all();

        $producto->update([
            'nombre' => $old_nombre,
            'estado' => $input['estado'],
        ]);
        
        if($request->hasFile('imagen'))
        {
            $destination_path = 'public/images/productos';
            $imagen = $request->file('imagen');
            $extensiomimagen=$imagen->getClientOriginalExtension();
            $imagen_name = Str::uuid(). '.' . $extensiomimagen;
            $request->file('imagen')->storeAs($destination_path,$imagen_name);

            $input['imagen'] = $imagen_name;
        }
        if ($input['nombre'] !== $old_nombre) {
            $request->validate([
                'nombre' => 'unique:productos',
            ]);
        }
        $producto->update($input);
        session()->flash('message',$input['nombre']. 'succesfully save');
        return redirect()->route('productos.index');

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function eliminarproducto(Request $request)
    {
        $input = $request->all();
        Producto::find($input["ideliminar"])->delete();

        return redirect()->route('productos.index');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $productos = Producto::where('nombre', 'like', '%' . $searchTerm . '%')
            ->paginate(12);
        
        $filtro = Producto::all();

        return view('producto.search', compact('productos','filtro'));

    }
}
