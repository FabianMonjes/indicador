<?php

namespace App\Http\Controllers;

use App\Http\Requests\ufRequest;
use App\UF;
use Illuminate\Http\Request;

class UFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('uf.index')->with([
            'ufs' => UF::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ufRequest $request)
    {
        $uf = UF::create($request->validated());
        return redirect()
                ->route('uf.index')
                ->withSuccess('Nuevo Registro UF Ingresado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UF  $uF
     * @return \Illuminate\Http\Response
     */
    public function show($uF)
    {
        return view('uf.show')->with([
            'uf' => UF::findOrFail($uF),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UF  $uF
     * @return \Illuminate\Http\Response
     */
    public function edit($uF)
    {
        return view('uf.edit')->with([
            'uf' => UF::findOrFail($uF),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UF  $uF
     * @return \Illuminate\Http\Response
     */
    public function update(ufRequest $request, $uF)
    {
        UF::findOrFail($uF)->update($request->all());
        return redirect()
            ->route('uf.index')
            ->withSuccess('Registro UF Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UF  $uF
     * @return \Illuminate\Http\Response
     */
    public function destroy($uF)
    {
        UF::findOrFail($uF)->delete();
        return redirect()
                ->route('uf.index')
                ->withSuccess('Registro UF Eliminado');
    }
}
