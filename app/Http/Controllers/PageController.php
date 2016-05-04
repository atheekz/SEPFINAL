<?php


namespace App\Http\Controllers;
use App\Http\Controllers;
use App\test2;
use App\categories;
use App\test;
use App\image;
use App\customrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PageController extends Controller {



    public function testSave(Request $request)
    {


        $test = $request->input('cat_id');

        $crequest = new customrequest();

        $crequest->code=$request->input('cat_id');
        $crequest->user_id=Session::get('userid');
        $crequest->heading=$request->input('heading');
        $crequest->text=$request->input('text_area');
        $crequest->color=$request->input('color');

        $crequest->save();

        $table = customrequest::find(6);

        //echo "<script type='text/javascript'>alert('$test');</script>";

        return view('test_cat')->with('test',$table);
    }

    //Uploading Image
    public function doImageUpload(Request $request)
    {
        //Getting file type
        $file = $request->file('file');

        //Getting file name
        $filename =$file->getClientOriginalName();

        //Saving physical file
        $file->move('images', $filename);



        $category=categories::find($request->input('cat_id'));

        /*$image=$category->images()->create([
            'categories_id' => $request->input('category_id'),
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_path' => 'images/' . $filename
        ]);*/




        //Saving image in database
        $image = new image;

        $image->categories_id=$request->input('cat_id');
        $image->file_name = $filename;
        $image->file_size = $file->getClientSize();
        $image->file_path = 'images/' . $filename;

        $image->save();
    }

    //Add a category
    public function savecat(Request $request)
    {

        //validate
        $validator = Validator::make($request->all(),[
            'cat_name' => 'required|min:3',
            'cat_desc' => 'required|min:5',

        ]);

        //Using validator
        if($validator->fails()){
            return redirect('addcat/list')
                ->withErrors($validator)
                ->withInput();
        }


        //Save category in database
        $category = new categories;

        $category->cat_name = $request->input('cat_name');
        $category->cat_desc = $request->input('cat_desc');
        $category->save();

        return redirect()->back();
    }

    //Update Category
    public function updatecat($id, Request $request)
    {

        //validate
        $validator = Validator::make($request->all(),[
            'cat_name' => 'required|min:3',
            'cat_desc' => 'required|min:5',

        ]);

        //Using validator
        if($validator->fails()){
            return redirect('category/view/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        //updating
        $category = categories::findOrFail($id);

        $category->cat_name = $request->input('cat_name');
        $category->cat_desc = $request->input('cat_desc');
        $category->save();

        return redirect()->back();
    }

    //View Cateory list
    public function catlist()
    {

        $categories = categories::all();
        $min = 0;
        $image = image::all();

        return view('addcat')->with('categories',$categories,'min',$min,'image',$image);

        //return view('addcat');

    }

    public function customlist()
    {

        $creqeusts = customrequest::all()->where('user_id',Session::get('userid'));


        return view('customlist')->with('crequests',$creqeusts);

        //return view('addcat');

    }

    public function viewreq($id)
    {
        $crequest = customrequest::findOrFail($id);

        return view('request-view')->with('crequest', $crequest);
    }

    //View specific category (user)
    public function viewcat($id)
    {
        $category = categories::findOrFail($id);

        return view('category-view')->with('category', $category);
    }

    //view specific category (admin)
    public function viewcat2($id)
    {
        $category = categories::findOrFail($id);

        return view('cat-view')->with('category', $category);
    }

    //load categories
    public function catload()
    {

        $categories = categories::all();

        return view('categories')->with('categories',$categories);
    }

    public function customcatload()
    {

        return view('custom_cat');
    }

    //delete category
    public function deletecat($id)
    {


        //get category
        $category = categories::findOrFail($id);

        //get related images
        $images = $category->images();

        //delete physical image
        foreach($images as $image)
        {
            unlink(public_path($image->file_path));
        }

        //delete category and images from database.
        $images->delete();

        $category->delete();

        return redirect()->back();
    }

    //delete single image
    public function deleteimage($id)
    {
        //get image
        $image = image::findOrFail($id);

        //delete physical image
        unlink(public_path($image->file_path));

        //delete image frim database
        $image->delete();

        return redirect()->back();
    }
}