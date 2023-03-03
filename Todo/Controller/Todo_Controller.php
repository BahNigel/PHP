<?php
require('./Model/Todo.php');
    class Todo_Controller{

        public $db = null;

        public function __construct(Database $db)
        {
            if (!isset($db->con)) {
                return null;
            }
            $this->db = $db;
        }

       private function view($page,$variables=[])
        {
            if(count($variables))
            {
                extract($variables);
            }
            require __DIR__ .$page;
        }


        public function home(){
            //requiring our model class

            $model = new Todo();

            $result = $this->db->con->query("SELECT * FROM {$model->table}");

            $resultArray = array();

            // fetch data data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            $task = array(
                'task'=> $resultArray,
            );
            return $this->view('/../View/home.php', $task);
        }

         // insert into todo table
        public  function add(){
            //requiring our model class

            $model = new Todo();
            //data from form
            $task=$_POST['task'];

            if ($model->fillable != null) {
                if($task != ''){
                // get table columns
                $columns = implode(',', array_keys($model->fillable));
                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES('".$task."')", $model->table, $columns);

                if ($this->db->con != null) {

                    $this->db->con->query($query_string);
                    echo "Data saved successfully!!";
                }
            }else{
                echo "<a style='color:red;'>please enter data</a>";
            }
            }
        }

        public function done(){
            //requiring our model class

            $model = new Todo();
            //data from form
            $id=$_POST['task_id'];

            $this->db->con->query("UPDATE $model->table SET `status` = 1 WHERE id = $id;");
            echo "Task completed";
        }

        public function delete(){
            //requiring our model class

            $model = new Todo();
            //data from form
            $id=$_POST['task_id'];

            $this->db->con->query("DELETE FROM $model->table WHERE id = $id");
            echo "<a style='color:red;'>Task deleted</a>";
        }

        public function list(){
             //requiring our model class

            $model = new Todo();

            $result = $this->db->con->query("SELECT * FROM {$model->table}");

            $resultArray = array();

            // fetch data data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            $task = array(
                'task'=> $resultArray,
            );
            return $this->view('/../View/all_tasks.php', $task);
        }

        public function completed(){
             //requiring our model class

            $model = new Todo();

            $result = $this->db->con->query("SELECT * FROM {$model->table}");

            $resultArray = array();

            // fetch data data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            $task = array(
                'task'=> $resultArray,
            );
            return $this->view('/../View/completed.php', $task);
        }

        public function pending(){
             //requiring our model class

            $model = new Todo();

            $result = $this->db->con->query("SELECT * FROM {$model->table}");

            $resultArray = array();

            // fetch data data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            $task = array(
                'task'=> $resultArray,
            );
            return $this->view('/../View/pending.php', $task);
        }

    }

?>