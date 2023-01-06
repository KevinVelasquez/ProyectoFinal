<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

use App\Http\Controllers\redirect;
use Illuminate\support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Host;
use Illuminate\support\Arr;
use App\Http\Models\User;

/**
 * Class UsuarioController
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {

     
        $users = ModelsUser::paginate();

        return view('usuario.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
        }

        return view('usuario.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cedula' => 'required|unique:users',
            'nombre' => 'required',
            'cedula' => 'required',
            'rol' => 'required',
            'estado' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = ModelsUser::create($input);
        request()->validate(Usuario::$rules);
        return redirect()->route('usuario.index')->with('success', 'Se registró correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Usuario::find($id);

        return view('usuario.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = ModelsUser::find($id);

        return view('usuario.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' =>'same:confirm-password',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){

            $input['password'] = Hash::make($input['password']);
        }else {
            $input = Arr::except($input, array('password'));

        }

        $user = ModelsUser::find($id);
        $user->update($input);

        return redirect()->route('usuario.index')
            ->with('success', 'Usuario Editado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
       
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('usuario.index')
            ->with('success', 'Usuario deleted successfully');
    }
}
