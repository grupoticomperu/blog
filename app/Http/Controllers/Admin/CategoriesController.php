<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }



    public function store(StoreCategoryRequest $request)
    {
       // $category = Category::create($request->all());
        $category = (new Category)->fill($request->all());


        if($request->hasFile('imagen'))
        {
         $category->imagen = $request->file('imagen')->store('public');
        }

         $category->save();

        //return redirect()->route('categories.index');
        return back()->with('flash', 'Categoria creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
       // $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       // $categories = Category::findOrFail($category);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
       // $categories = Category::findOrFail($id);
         //return $request->all();
         //dd($request->file('imagen'));
        //dd($request->file('imagen')->store('public'));
        if($request->hasFile('imagen'))
        {
         $category->imagen = $request->file('imagen')->store('public');
        }
        //public se refiere a storage/app/public
        // $category->update($request->all());
        $category->update($request->only('name'));
         return redirect()->route('categories.index')->with('flash', 'Categoria actualizado con exito');
        // return back()->with('flash', 'Categoria actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
       
        
        
    }
}
