<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use App\Models\Detalle_compra;

/**
 * Class InsumoController
 * @package App\Http\Controllers
 */
class InsumoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Insumos');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::paginate();

            $insumo = Insumo::select('insumos.nombre','insumos.medidas','insumos.id','insumos.estado')
            
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
        $validatedData =$request->validate([
            'nombre' => 'required|unique:insumos,nombre,'.$input["id"],
            'id_medidas' => 'required',
        ], [
            'nombre.unique' => 'No se puede crear dos insumos con el mismo nombre',
        ]);
        

        $actualizar =Insumo::where('id', $input["id"])
            ->update([
                'nombre' => $input["nombre"],
                'medidas' => $input["id_medidas"],
                'estado' => $input["id_estado"]
            
            ]);
        return redirect()->route('insumos.index')
            ->with('success', 'Insumo actualizado exitosamente');

    }



    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nombre' => 'required|unique:insumos,nombre'
    ], [
        'nombre.required' => '',
        'nombre.unique' => 'No se puede crear dos insumos con el mismo nombre'
    ]);
    

    $insumo = Insumo::create([
        "nombre" => $request->nombre,
        "medidas" => $request->id_medidas
    ]);

    return redirect()->route('insumos.index')
        ->with('success', 'Insumo registrado exitosamente.');
}


   
    public function eliminarInsumo(Request $request)
    {
        
            $input = $request->all();
            $insumo = $input["ideliminar"];

            $consultadetalle = Detalle_compra::select(
                "detalle_compra.id_insumo",
            )->get();

            foreach ($consultadetalle as $valor) {
               
                if($insumo==$valor->id_insumo) {
                    
                    return redirect()->route('insumos.index')->with('error', 'No se puede eliminar el insumo porque está asociado a una orden de compra');
                }
            }
                Insumo::find($input["ideliminar"])->delete();
                return redirect()->route('insumos.index')->with('success', 'Insumo eliminado exitosamente.');
    }
}
