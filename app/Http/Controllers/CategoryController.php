<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.category', [
            "title" => "Category",
            "ctg" => Category::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:15',
            'description' => 'required|max:100',
            'is_active' => 'required'
        ]);
        
        $slug = md5($request->name);

        $mi = DB::table('categories')->select(DB::raw('MAX(id) as kode'));
        if($mi->count()>0)
        {
            foreach($mi->get() as $k)
            {
                $id = ((int) $k->kode) + 1;
            }
        }else{
            $id = "1";
        }

        $validatedData['slug'] = date('s').$id.$slug.date('hi');
        $validatedData['user_id'] = auth()->user()->id;
        Category::create($validatedData);

        return redirect('/category')->with('success', 'New Category Has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        Session::put('ctg', request()->fullUrl());
        
        return view('transaction.cdtl', [
            'ctgs' => $category,
            'title' => "Category detail"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        return redirect('/category');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:15',
            'description' => 'required|max:100',
            'is_active' => 'required'
        ]);
        $ci = ([$Category->id]);

        Category::where('id', $ci)->update($validatedData);

        if(session(key: 'ctg'))
        {
            return redirect(session(key: 'ctg'))->with('success', 'Wallet Has been updated!');
        }

        return redirect('/category')->with('success', 'Category Has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        Category::destroy($Category->id);

        return redirect('/category')->with('success', 'Category Has been deleted!');
    }
}
