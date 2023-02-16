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
    { {
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
        $user = Usuario::findOrFail($id);

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
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {

            $input['password'] = Hash::make($input['password']);
        } else {
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

        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('usuario.index')
            ->with('success', 'Usuario deleted successfully');
    }

    public function VistaPefil()
    {
        return view('usuario/perfil');
    }

    public function EditarPerfil(Request $request)
    {
        $user = Auth::user();
        $cedula = $user->cedula;
        $nombre = $user->nombre;
        $email = $user->email;
        $rol = $user->rol;
        $contraseña = $user->password;
        $estado = $user->estado;

        if ($request->password_actual != "") {
            $NuewPass = $request->password;
            $confirPass = $request->confirm_password;
            $nombre = $request->nombre;

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
        $nombre = $request->nombre;
        $sqlBD = DB::table('users')
            ->where('id', $user->id)
            ->update(['nombre' => $nombre]);

        $cedula = $request->cedula;
        $sqlBD = DB::table('users')
            ->where('id', $user->id)
            ->update(['cedula' => $cedula]);

        $email = $request->email;
        $sqlBD = DB::table('users')
            ->where('id', $user->id)
            ->update(['email' => $email]);

        $rol = $request->rol;
        $sqlBD = DB::table('users')
            ->where('id', $user->id)
            ->update(['rol' => $rol]);

        $estado = $request->estado;
        $sqlBD = DB::table('users')
            ->where('id', $user->id)
            ->update(['estado' => $estado]);

        return redirect()->back()->with('nombre', 'Editado con éxito');
    }

    public function CambioEstado(Request $request)
    {
        $users = Usuario::find($request->id);
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
