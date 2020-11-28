<?php

namespace App\Http\Controllers;
use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::get(); // tambien podemos utilizar paginate()
        return  json_encode(['libros' => $libros]); //view('libro', ['libros' => $libros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $libro = new Libro;
       $data = $request->json()->all();
       $nombre = $data['nombre'];
       $edicion = $data['edicion'];
       $libro->nombre = $nombre;
       $libro->edicion = $edicion;
       $libro->save();
       return json_encode(["msg"=>"libro agregado"]); // return redirect('/libro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::where('id', $id)->first();
        return $libro;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $libro = Libro::where('id', $id)->first();
      return $libro;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $nombre = $request->input('nombre');
       $edicion = $request->input('edicion');
       $id = $request->input('id');
       Libro::where('id', $id)
             ->update([ 'nombre'=>$nombre, "edicion"=>$edicion ]);
       return '{"msg":"actualizado"}';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $res =  Libro::destroy($id);
         return '{"id":"'.$id.'","msg":"eliminado" }'; 
      // return  redirect('/libro');
    }
}
