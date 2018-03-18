<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Persona;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\PersonaFormRequest;
use DB;


class PersonaController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $persona=DB::table('persona')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idpersona','desc')
            ->paginate(7);
            return view('almacen.persona.index',["persona"=>$persona,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.persona.create");
    }
    public function store (PersonaFormRequest $request)
    {
        $persona=new Persona;
        $persona->tipo_persona=$request->get('tipo_persona');
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->save();
        return Redirect::to('almacen/persona');

    }
    public function show($id)
    {
        return view("almacen.persona.show",["persona"=>Persona::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.persona.edit",["persona"=>Persona::findOrFail($id)]);
    }
    public function update(PersonaFormRequest $request,$id)
    {
        $persona=Persona::findOrFail($id);
        $persona->tipo_persona=$request->get('tipo_persona');
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->update();
        return Redirect::to('almacen/persona');
    }
    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);
        $persona->condicion='0';
        $persona->delete();
        return Redirect::to('almacen/persona');
    }

}