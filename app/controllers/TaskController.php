<?php

class TaskController extends Controller{

    private $model;

    public function __construct(){
        $this->model = new TaskModel();
    }

    public function indexAction(){

        $this->view->lang = $_SESSION['lang'] ?? 'eng';
    
    }

    public function createAction(){

        $this->view->lang = $_SESSION['lang'] ?? 'eng';

    }
    
    public function addAction(){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = ['user' => $_POST['user'],
                'title' => $_POST['title'],
                'status' => $_POST['status'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                ];
        }

        //to control vulnerabilities
        /*if(in_array(NULL || '', $data)){
            header("Location:" . WEB_ROOT . "/error");
            exit;
        }*/

        $result = $this->model->addTask($data);

        if(!$result){
            echo 'Error saving task.';
            exit;
        } else {
            header("Location:" . WEB_ROOT . "/success");
        }

    }

    public function readAction(){

        $this->view->lang = $_SESSION['lang'] ?? 'eng';
        
        $tasks = $this->model->readTasks();
        
        $this->view->tasks = $tasks;
    }

public function updateAction(){
        $this->view->lang = $_SESSION['lang'] ?? 'eng';
        $tasks = $this->model->readTasks();
        $this->view->tasks = $tasks;
    }

    public function confirmUpdateAction(){
        $this->view->lang = $_SESSION['lang'] ?? 'eng';
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'] ?? '';
        }

        $task = $this->model->getTaskById($id);
        $this->view->task = $task;
    }

    public function taskUpdateAction(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'] ?? '';
            $user = $_POST['user'] ?? '';
            $title = $_POST['title'] ?? '';
            $status = $_POST['status'] ?? '';
            $start_date = $_POST['start_date'] ?? '';
            $end_date = $_POST['end_date'] ?? '';
        }

        $result = $this->model->updateTask($id, $user, $title, $status, $start_date, $end_date);

        if(!$result){
            echo 'Error updating task.';
            exit;
        } else {
            header("Location:" . WEB_ROOT . "/successUpdate");
        }
    }

    public function deleteAction(){
        $this->view->lang = $_SESSION['lang'] ?? 'eng';
        $tasks = $this->model->readTasks();
        $this->view->tasks = $tasks;
    }

    public function confirmDeleteAction(){
        $this->view->lang = $_SESSION['lang'] ?? 'eng';

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'] ?? '';
        }

        $task = $this->model->getTaskById($id);
        $this->view->task = $task;
    }

    public function taskDeleteAction(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'] ?? '';
        }

        $result = $this->model->deleteTask($id);

        if(!$result){
            echo 'Error deleting task.';
            exit;
        } else {
            header("Location:" . WEB_ROOT . "/successDelete");
        }
    }

    public function successAction(){

        $this->view->lang = $_SESSION['lang'] ?? 'eng';

    }

    public function successUpdateAction(){
        $this->view->lang = $_SESSION['lang'] ?? 'eng';
    }

    public function successDeleteAction(){
        $this->view->lang = $_SESSION['lang'] ?? 'eng';
    }

    public function langAction(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lang = $_POST['lang'] ?? '';
            $this->view->lang = $lang;
            $_SESSION['lang'] = $lang;
        }

        $this->view->lang = $_SESSION['lang'] ?? 'eng';
        header("Location: " . WEB_ROOT);
        exit();
    }
}
