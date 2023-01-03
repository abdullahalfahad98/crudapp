<?php
    class crudapp{
        private $conn;

        public function __construct()
        {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = "";
            $dbname = 'crudapp';

            $this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
            if(!$this->conn){
                die("Database Connection Error!!");
            }
        }

        public function add_data($data){
            $std_name = $data['std_name'];
            $std_roll = $data['std_roll'];
            $std_img = $_FILES['std_img']['name'];
            $tmp_name = $_FILES['std_img']['tmp_name'];

            $query = "INSERT INTO student (std_name,std_roll,std_img)
            VALUE ('" . $std_name . "','" . $std_roll . "','" . $std_img . "')";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name, 'upload/'.$std_img);
                return "Information Added Successfuly";
            }
        }
        public function display_data(){
            $query="SELECT * FROM student";
            if(mysqli_query($this->conn, $query)){
                $returndata = mysqli_query($this->conn,$query);
                return $returndata;

            }
        }

        public function display_data_by_ID($ID){
            $query="SELECT * FROM student WHERE ID=$ID";
            if(mysqli_query($this->conn, $query)){
                $returndata  = mysqli_query($this->conn,$query);
                $studentDataa = mysqli_fetch_assoc($returndata);
                return $studentDataa;

            }
        }
        public function update_data($data){
            $std_name   = $data['u_std_name'];
            $std_roll   = $data['u_std_roll'];
            $idno       = $data['std_id'];
            $std_img    = $_FILES['u_std_img']['name'];
            $tmp_name   = $_FILES['u_std_img']['tmp_name'];

            $query = "UPDATE student SET std_name='$std_name ', std_roll='$std_roll', std_img='$std_img ' WHERE ID = $idno";
            if(mysqli_query($this->conn,$query)){
                move_uploaded_file($tmp_name,'upload/'.$std_img);
                header("Location: index.php");
            }

        }
        public function delete_data($ID){
            $query = "DELETE FROM student WHERE ID=$ID";
            if(mysqli_query($this->conn,$query)){
                
                header("Location: index.php");
            }
        }

    }




?>