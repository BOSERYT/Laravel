<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // proteger rutas con un constructor auth

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
/* metod index user */
    public function index(){

        $users = User::all();
        return view('users.index',[
            'users' => $users
        ]);
        return back();

    }
    public function store(Request $request){
        User::create([

            'name'=>$request->name
        ]);
        return redirect('/users')->with('mesage', 'El usuario se ha modificado!');

    }
    /* metododo delete */
    public function delete(User $user){

        $user->delete();

        return (' el usuario se ha eliminado de manera correcta');

    }
     /* EDITAR*/
     public function edit($id){
        $user = User::findOrFail($id);
        
        return view('users.edit',['user'=>$user]);

    }

   /* ACTUALIZAR */
   public function update(Request $request, $id){
    /*   $validateData = $request->validate([
          'name' => 'required|max:5'
      ]); */
      $user = User::findOrFail($id);

      $user->update($request->all());
 
      //return back();

      return redirect('/users')->with('mesageUpdate', 'El usuario se ha modificado exitosamente!');

  }  


}
