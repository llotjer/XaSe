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
            $user = $_POST['user'] ?? '';
            $title = $_POST['title'] ?? '';
            $status = $_POST['status'] ?? '';
            $start_date = $_POST['start_date'] ?? '';
            $end_date = $_POST['end_date'] ?? '';
        }

        $result = $this->model->addTask($user, $title, $status, $start_date, $end_date);

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

//update

//delete

    public function successAction(){

        $this->view->lang = $_SESSION['lang'] ?? 'eng';

    }

//success update

//success delete

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
