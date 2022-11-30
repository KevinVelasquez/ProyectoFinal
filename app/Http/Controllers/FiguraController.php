<?php

namespace App\Http\Controllers;

use App\Models\Figura;
use Illuminate\Http\Request;

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
        return view('figura.create', compact('figura'));
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

        $figura = Figura::create($request->all());

        return redirect()->route('figuras.index')
            ->with('success', 'Figura created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $figura = Figura::find($id);

        return view('figura.show', compact('figura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $figura = Figura::find($id);

        return view('figura.edit', compact('figura'));
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
        request()->validate(Figura::$rules);

        $figura->update($request->all());

        return redirect()->route('figuras.index')
            ->with('success', 'Figura updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $figura = Figura::find($id)->delete();

        return redirect()->route('figuras.index')
            ->with('success', 'Figura deleted successfully');
    }
}
