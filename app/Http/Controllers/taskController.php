<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tasks;
use Illuminate\Support\Facades\Auth;
use App\Models\categories;


class taskController extends Controller
{

    /**
     * get all the data from tasks table and pass it to view add tasks
     * @author Mohammed M.Salha
     */
    public function index()
    {
        $tasks = Tasks::all();
        $cat = $this->categories();
        return view('/tasks/add', ['tasks' => $tasks, 'cat' => $cat]);

    }


     

    /**
     * get all the data from categories table.
     * @author Mohammed M.Salha
     */
    public function categories()
    {
        $cat = categories::all();

        return $cat;
    }



    /**
     * get all the data from categories table.
     * @author Mohammed M.Salha
     */
    public function get_tasks($id)
    {
        $cat=$this->categories();
        $tasks = Tasks::where('cat_id', '=', $id)->get();
        return view('/dashboard-cat', ['tasks' => $tasks, 'cat' => $cat]);

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
        $validatedData = $request->validate(['title' => 'required', 'cat' => 'required', 'desc' => 'required','due'=>'required']);
        if (!$validatedData)
        {
            return Redirect::back()->withErrors($validatedData);
        }
        $task = new Tasks;
        $task->title = $request->title;
        $task->user_id = Auth::user()->id;
        $task->cat_id = $request->cat;
        $task->desc = $request->desc;
        $task->tags = $request->tags;
        $task->due_date = $request->due;

        $task->save();
        return redirect()
            ->back()
            ->withSuccess('Success,task added ^_^');
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
        $task = Tasks::find($id);
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
        $cat = $this->categories();
        $task = Tasks::find($id);
        if ($task == null)
        {
            return redirect(route('tasks'));
        }
        return view('/tasks/edit', ['task' => $task, 'cat' => $cat]);
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
        $cat = $this->categories();
        $task = Tasks::find($id);
        if ($task == null)
        {
            return redirect(route('tasks'));
        }
        return view('/tasks/delete', ['task' => $task, 'cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     * @author Mohammed M.Salha
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(['title' => 'required|max:255', 'cat' => 'required', 'desc' => 'required']);

        if (!$validatedData)
        {
            return Redirect::back()->withErrors($validatedData);
        }
        $task = Tasks::find($id);
        if ($task == null)
        {
            return redirect(route('tasks'));
        }
        $task->title = $request->title;
        $task->cat_id = $request->cat;
        $task->desc = $request->desc;
        $task->tags = $request->tags;
        $task->save();
        return redirect()
            ->back()
            ->withSuccess('Success,task Updated ^_^');
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
        Tasks::find($id)->delete();
        return redirect(route('tasks'));
    }

}

