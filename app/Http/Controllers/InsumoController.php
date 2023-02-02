<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;

/**
 * Class InsumoController
 * @package App\Http\Controllers
 */
class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::paginate();

            $insumo = Insumo::select('insumos.nombre','insumos.medidas','insumos.id')
            ->where('insumos.estado',1)
            ->get();
        
            $editarinsumo = Insumo::select(
                "insumos.nombre",
                "insumos.medidas",
                "insumos.estado",
                "insumos.id"
                
            )->get();

            
                
            return view('insumo.index', compact('insumos','editarinsumo','insumo'))
            ->with('i', (request()->input('page', 1) - 1) * $insumos->perPage());

            
        
    }


    public function updateInsumos(Request $request)
    {
        $input = $request->all();
        //print_r($input);
        //exit;

        $actualizar =Insumo::where('id', $input["id"])
            ->update([
                'nombre' => $input["nombre"],
                'medidas' => $input["id_medidas"],
            
            ]);
        return redirect()->route('insumos.index')
            ->with('success', 'Insumo update successfully');

    }


    public function anularInsumo(Request $request)
    {
        $input = $request->all();
        Insumo::where('id', $input["idanular"])
            ->update([
                'estado' => 0
            ]);
        return redirect()->route('insumos.index')
            ->with('success', 'Status insumo successfully');
    }


   
    public function store(Request $request)
    {
        
        //request()->validate(Insumo::$rules);
        $input=$request->all();
        $insumo = Insumo::create([
            "nombre"=>$input["nombre"],
            "medidas"=>$input["id_medidas"]
        ]);

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo created successfully.');
    }

    

   
    public function eliminarInsumo(Request $request)
    {
        $input=$request->all();
        
        $insumo = Insumo::find($input["ideliminar"])->delete();

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo deleted successfully');
    }
}
