<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /**
     * index para mostrar todos los todos
     * store para guardar un todo
     * update para actualizar un todo
     * destroy para eliminar un todo
     * edit para mostrar el formulario de edicion de un todo
     */

    public function store(Request $request){
        //validamos
        $request->validate([
            'title' => 'required|min:3',
        ]);
        //creamos el objeto y asignamos los valores
        $todo = new Todo; //creo un nuevo todo
        $todo->title = $request->title; //title es el nombre del campo en el formulario
        $todo->save(); // guarda en la base de datos

        //redirigimos al usuario a la ruta /todos con el mensaje que se inyecta en la solicitud de respuesta
        return redirect()->route('todos')->with ('success', 'Todo creado correctamente'); //redirige a la ruta todos con un mensaje de exito
    }

    public function index(){
        $todos = Todo::all(); //obtengo todos los todos de la base de datos
        return view('todos.index', compact('todos')); //le paso el array de todos a la vista
    }

    public function show($id){
        $todos = Todo::find($id); //obtengo todos los todos de la base de datos
        return view('todos.show', compact('todos')); //le paso el array de todos a la vista
    }

    public function update(Request $request,$id){
        $todos = Todo::find($id); //obtengo todos los todos de la base de datos
        $todos->title = $request->title; //title es el nombre del campo en el formulario
        $todos->save(); // guarda en la base de datos
//        return view('todos.index', ['success'=>'Tarea actualizada!!']);///le paso el array de todos a la vista
        return redirect ()->route ('todos')->with ('success', 'Tarea actualizada!!');
    }

    public function destroy($id){
        $todo = Todo::find($id); //obtengo todos los todos de la base de datos
        $todo->delete(); // elimino el todo de la base de datos
//        return view('todos.index', compact('todo')); //le paso el array de todos a la vista
        return redirect ()->route ('todos')->with ('success', 'Tarea eliminada!!');
    }



}
