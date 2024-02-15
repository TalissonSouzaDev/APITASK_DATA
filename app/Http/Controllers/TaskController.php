<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestTask;
use App\Http\Resources\TaskResource;
use App\Repositories\Taskrepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    protected $Taskrepository;
    public function __construct(Taskrepository $Taskrepository)
    {
        $this->Taskrepository =  $Taskrepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskResource::collection($this->Taskrepository->getTasks());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateTask(RequestTask $request)
    {

       $createTaskbool = $this->Taskrepository->createNewTask($request->all());
       if($createTaskbool)
       {
        return response()->json(["Message"=>"Task Criada com Sucesso"],201);
       }

       return response()->json(["Message"=>"Algum deu errado"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $idtask
     * @return \Illuminate\Http\Response
     */
    public function show(int $idtask)
    {
       return new TaskResource($this->Taskrepository->FindTasks($idtask));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $idtask
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTask $request, int $idtask)
    {
        $updateTaskbool = $this->Taskrepository->UpdateTask($request->all(),$idtask);
        if($updateTaskbool)
        {
         return response()->json(["Message"=>"Task atualizado com Sucesso"],201);
        }

        return response()->json(["Message"=>"Algum deu errado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $idtask)
    {
        $task = $this->Taskrepository->FindTasks($idtask);
        if(!$task)
        {
            return response()->json(["Message"=>"Não a registro "]);
        }
        $task->delete();
        return response()->json(["Message"=>"Task deletado com Sucesso"],201);
        
    }


    public function FilterTask(Request $request)
    {
        return TaskResource::collection($this->Taskrepository->filter($request->filter));
    }
}
