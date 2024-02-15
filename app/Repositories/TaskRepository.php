<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Support\Arr;

class Taskrepository {
    protected $entity;

    public function __construct(Task $Task)
    {

        $this->entity = $Task;
        
    }
      /**
     * Função para retorna todos os Tasks do usuario Autenticado
     
     */

    public function getTasks()
    {
        return $this->AuthUser()->Tasks()->paginate(10);

    }


  /**
     * Função para pega  o Task do usuario Autenticado
     
     */
    public function FindTasks(int $Id)
    {
        return $this->entity->findOrFail($Id);

    }


  /**
     * Função para criar o Task do usuario Autenticado
     
     */
    public function createNewTask(Array $data): bool
    {
       try
       {
        $this->AuthUser()->Tasks()->create([
            "title"=>$data['title'],
            "description"=>$data['description'],
        ]);

        return true;
       }
       catch(Exception $e)
       {
        return false;
       }

    }

   /**
     * Função para atualizar o Task do usuario Autenticado
     
     */
    
    public function UpdateTask(Array $data,int $id): bool
    {
       try
       {
         $updateTask =  $this->FindTasks($id);
         $updateTask->update($data);

        return true;
       }
       catch(Exception $e)
       {
        return false;
       }

    }


    public function filter(string $filter)
    {

        return $this->entity->where("title","LIKE"," %{$filter}%")
        ->orwhere("description","LIKE","%{$filter}%")->get();
    }

   
    public function AuthUser(): User
    {
        return auth()->user();
    }
}