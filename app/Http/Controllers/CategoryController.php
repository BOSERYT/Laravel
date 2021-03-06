<?php

namespace App\Http\Controllers;
/* Mandamos a llamar el modelo category */
use App\category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    } 
    use SoftDeletes;
    //
    /* vamos a obtener todas las categorua de nuestra base de datos ELOQUEN ORM
        Select * from categories  */
    public function index(){
        /* cambiamos la consulta all por patest paginate para la apginacion de nuestros registros */
        $categories = Category::latest()->paginate(20);
        //return $categories;
        return view('categories.index',[
        'categories'=> $categories,
        ]);


    }
    /*INSERTAR*/
    public function store(Request $request){
        Category::create([

            'name'=>$request->name
        ]);
        return redirect('/categories')->with('mesage', 'la categoria se ha agregado exitosamente!');

    }

    /* EDITAR*/
        public function edit($id){
            $category = Category::findOrFail($id);
            //return $category;
            return view('categories.edit',['category'=>$category]);

        }
        /* ACTUALIZAR */
        public function update(Request $request, $id){
          /*   $validateData = $request->validate([
                'name' => 'required|max:5'
            ]); */
            $category = Category::findOrFail($id);

            $category->update($request->all());
       
            //return back();

            return redirect('/categories')->with('mesageUpdate', 'la categoria se ha modificado exitosamente!');

        }        

    /*ELIMINAR */
    public function delete(Category $category){

        $category->delete();
        return redirect('/categories')->with('mesageDelete', 'la categoria se ha eliminado exitosamente!');


    }
}