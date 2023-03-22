<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\redirect;
use Illuminate\support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Host;
use Illuminate\support\Arr;
use App\Http\Models\User;
use Illuminate\Support\Facades\Session;

/**
 * Class UsuarioController
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Usuarios|Menu-Compras|Menu-Ventas');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            $users = ModelsUser::paginate();

            return view('usuario.index', compact('users'))
                ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
        }
        return view('usuario.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('roles.name')->where('roles.estado',1)->get();
        return view('usuario.create', compact('roles'));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = ModelsUser::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuario.index')->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = ModelsUser::findOrFail($id);

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

        if ($user->hasRole('Administrador')) {
            return redirect()->back()->with('error', 'No puedes editar al super administrador');
        }

        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $selectedRoles = $user->roles()->pluck('name')->toArray();

        return view('usuario.edit', compact('user','roles','userRole','selectedRoles'));
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
        $user = ModelsUser::find($id);

        $this->validate($request, [
            'nombre' => 'required',
            'cedula' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'estado' => 'required',
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user->syncRoles($request->input('roles'));
        $user->update($input);

        ModelsUser::where('id', $id)
        ->update(['estado'=>$input["estado"]]);

 /*        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assingRole($request->input('roles')); */
        Session::flash('success', 'Se actualizó correctamente');
        return redirect()->route('usuario.index')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */


    public function VistaPefil()
    {
        return view('usuario/perfil');
    }

    public function recuperarClave()
    {
        return view('recuperarContraseña/recuperarClave');
    }

    public function editPerfil()
    {
        $user = Auth::user();
        return view('perfil.edit', compact('user'));
    }

    public function EditarPerfil(Request $request)
    {

        $user = Auth::user();
        $user->nombre = $request->nombre;
        $user->email = $request->email;

        $user->save();

        $contraseña = $user->password;

        if ($request->password_actual != "") {
            $NuewPass = $request->password;
            $confirPass = $request->confirm_password;

            //Verifico si la clave actual es igual a la clave del usuario en session
            if (Hash::check($request->password_actual, $contraseña)) {

                //Valido que tanto la 1 como 2 clave sean iguales
                if ($NuewPass == $confirPass) {
                    //Valido que la clave no sea Menor a 6 digitos
                    if (strlen($NuewPass) >= 6) {
                        $user->password = Hash::make($request->password);
                        $sqlBD = DB::table('users')
                            ->where('id', $user->id)
                            ->update(['password' => $user->password], ['nombre' => $user->nombre]);

                        return redirect()->back()->with('updateClave', 'La clave fue cambiada correctamente.');
                    } else {
                        return redirect()->back()->with('clavemenor', 'Recuerde la clave debe ser mayor a 6 digitos.');
                    }
                } else {
                    return redirect()->back()->with('claveIncorrecta', 'Por favor verifique las claves no coinciden.');
                }
            } else {
                return back()->withErrors(['password_actual' => 'La Clave no Coinciden']);
            }
        } else {
            //
        }

        

        return redirect()->route('VistaPefil')->with('success', 'Perfil actualizado exitosamente');
    }

    public function destroy($id)
    {

        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('usuario.index')
        ->with('success', 'Usuario eliminado exitosamente');
    }

    public function CambioEstado(Request $request)
    {
        $users = ModelsUser::find($request->id);
        $users->estado = $request->estado;
        $users->save();

        /*        if ($request->estado == 0) {
            $newStatus = '<br> <button type="button" class="btn btn-sm btn-danger">Inactiva</button>';
        } else {
            $newStatus = '<br> <button type="button" class="btn btn-sm btn-success">Activa</button>';
        }

        return response()->json(['var'=>''.$newStatus.'']); */
    }
}
?>