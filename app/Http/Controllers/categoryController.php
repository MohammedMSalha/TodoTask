<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{


    /**
    * get all the data from categories and pass it to view add in category
    * @author Mohammed M.Salha
    */
    public function index()
    {

        $cat = categories::all();

        return view('/category/add',compact('cat'));
    }



    /**
    * get all the data categories.
    * @author Mohammed M.Salha
    */
    public function get_categories()
    {

        $cat = categories::all();

        return view('/dashboard',compact('cat'));
    }


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @author Mohammed M.Salha
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name' => 'required'
        ]);
        if(!$validatedData) {
            return Redirect::back()->withErrors($validatedData);
        }
        $cat=new Categories;
        $cat->title=$request->name;
        $cat->user_id=Auth::user()->id;
        $cat->save();
        return  redirect()->back()->withSuccess('Success,category added ^_^');
    }


     /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return Response
        * @author Mohammed M.Salha
        */
        public function show($id)
        {
            $task = Categories::find($id);
        }
    
        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        * @author Mohammed M.Salha
        */
        public function edit($id)
        {
            $cat = Categories::find($id);
            if($cat==null){
                return redirect(route('cat'));
            }
                return view('/category/edit',['cat'=>$cat]);
        }
    



        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        * @author Mohammed M.Salha
        */
        public function delete($id)
        {
            $cat = Categories::find($id);
            if($cat==null){
                return redirect(route('cat'));
            }
            return view('/category/delete',['cat'=>$cat]);
        }


        /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        * @author Mohammed M.Salha
        */
        public function update(Request $request,$id)
        {
            $validatedData=$request->validate([
                'name' => 'required|max:255'
            ]);
    
            if(!$validatedData) {
                return Redirect::back()->withErrors($validatedData);
            }
            $cat=Categories::find($id);
            if($cat==null){
                return redirect(route('cat'));
            }
            $cat->title=$request->name;
            $cat->save();
            return  redirect()->back()->withSuccess('Success,category Updated ^_^');
        }
    
        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        * @author Mohammed M.Salha
        */
        public function destroy($id)
        {
            Categories::find($id)->delete();
            return  redirect(route('cat'));
        }



}
