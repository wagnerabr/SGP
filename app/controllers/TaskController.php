<?php

class TaskController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getAdd()
	{
		return View::make('add_task');
	}

	public function postAdd()
	{
		//criando regras de validação
		$regras = array('titulo' => 'required');

		//executando validação
		$validacao = Validator::make(Input::all(), $regras);

		//se a validação dar errado mostrar erros
		if ($validacao->fails()) {
			return Redirect::to('task/add')->withErrors($validacao);
		}

		//sucesso

		else {

			$task = new Task;
			$task->titulo = Input::get('titulo');
			$task->save();

			return View::make('add_task')->with('sucesso', TRUE);
		}
		
	}

	public function listar()
	{
		$tasks = Task::all();
		return View::make('list_tasks')->with('tasks', $tasks);
	}

	public function check() {
        //verifica se a request é ajax
        if (Request::ajax()) {
            //criando regras de validação
            $regras = array('task_id' => 'required|integer');

            $validacao = Validator::make(Input::all(), $regras);

            if ($validacao->fails()) {
                return Response::json( array("status" => FALSE) );
            }
            else {
                //tenta encontrar e atualizar a task
                try {
                    $task = Task::findOrFail(Input::get('task_id'));
                    $task->status = TRUE;
                    $task->save();

                    return Response::json( array("status" => TRUE, "titulo" => $task->titulo) );
                }
                //caso não tenha conseguido encontrar a task
                catch(Exception $e) {
                    return Response::json( array("status" => FALSE, "mensagem" => $e->getMessage()) );
                }
            }
        }
    }

}
