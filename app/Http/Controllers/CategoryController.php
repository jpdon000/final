<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    


    public function index()      // for fetching......................!!
    {
        $category = Category::all();
        return view('category.index',compact('category'));
    }

    public function edit($id)  // for edit...................!!
    {
        if(!$id)
        {
            return redirect()->back();
        }

        $category =Category::find($id);
        if($category)
        {
            return view('category.edit',compact('category'));
        }
        return redirect()->back();
    }



    public function delete($id)  // for deleted.....................!!
    {
        if(!$id)
        {
            return redirect()->back();
        }

        $category = Category::find($id);
        if($category)
        {
            $category->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }

public function update(Request $request, $id) // for update...............!!
{
    if(!$id)
    {
        return redirect()->back();
    }

    $category = Category::find($id);
    if($category)
    {
        $data=[
            'name' => $request->get('name'),
            'description' => $request->get('description'),

        ];
        Category::where('id',$id)->update($data);
        return redirect()->route('category.index');
    }
    return redirect()->back();
}



}
