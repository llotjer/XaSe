<?php

class TaskModel {

    private $jsonFile = ROOT_PATH . '/app/models/data.json';
    
    public function addTask(string $user, string $title, string $status, string $start_date, string $end_date): bool{

            $newTask = [
                'id' => $this->getNextId(),
                'user' => $user,
                'title' => $title,
                'status' => $status,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'status' => $status,
            ];
            
            $tasks = $this->readTasks();
            $tasks[] = $newTask;

            if(file_put_contents($this->jsonFile, json_encode($tasks, JSON_PRETTY_PRINT))){
                return true;
            }else{
                return false;
            }
    }
    
    public function readTasks(){
        
        $tasks = file_exists($this->jsonFile) ? json_decode(file_get_contents($this->jsonFile), true) : [];
        //var_dump($tasks);
        return $tasks;
    }

    public function getNextId(): int {

        if (!file_exists($this->jsonFile) || empty($this->readTasks())) {
            return 1;
        }

        $lastTask = end($this->readTasks());
        return $lastTask['id'] + 1;
    }
