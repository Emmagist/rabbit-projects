<?php
    require_once "init.php";

    class Database{
        // private $db_host = "DB_HOST"; 
        // private $db_user = "DB_USER";
        // private $db_pass = "DB_PASSWORD";
        // private $db_name = "DB_NAME";

        private $con = false; // Check to see if the connection is active
        public $myconn ;// This will be our mysqli object
        private $result = array(); // Any results from a query will be stored here
        private $myQuery = ""; // used for debugging process with SQL return
        private $numResults = ""; // used for returning the number of rows

        function __construct(){

            $this->connect();
        }

        // Function to make connection to database
        public function connect() {
        
                $this->myconn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // mysql_connect() with variables defined at the start of Database class
                if ($this->myconn->connect_errno) {
                    die("Database connection failed". $this->myconn->connect_error);exit;
                }
        }

        public function query($sql) {
          return $this->myconn->query($sql);
        }

        public function lastId($sql){
            if ($this->query($sql) === TRUE) {
                //Finding id of lastly inserted record
                return $last_id = $this->myconn->insert_id;
            } 
        }

        public function selectData($table, $field = '*', $conditions = "", $column = ''){
            $rows = [];
                $fields = trim($field);
                $where = !empty($conditions) ? "WHERE" : "";
            $result = $this->query("SELECT " . $fields . " FROM " . $table . "  $where " . $conditions);
            // var_dump($result);exit;
            //$row_cnt = $result->num_rows;
            // var_dump($row_cnt);exit;
                if (!empty($result)) {
              while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
              }
              return $rows;
            }
        }

        public function search($table, $field = '*',$conditions, $column = ''){
            $rows = [];
                $fields = trim($field);
                $like_column = 'current_state';
            $result = $this->query("SELECT " . $fields . " FROM " . $table . " WHERE ".$conditions);
                if (!empty($result)) {
              while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
              }
              return $rows;
            }
        }

        public function selectRandLimit($table, $field = '*', $conditions = "", $limit = ""){
            $rows = [];
            $fields = trim($field);
            $where = !empty($conditions) ? "WHERE" : "";
            $limits = "LIMIT" . "($limit)";
            $result = $this->query("SELECT" . $fields . "FROM" . $table . " $where " . $conditions . "ORDER BY RAND()" . $limits);
            // $row_count = $result->num_rows;
            if (!empty($result)) {
                while ($row = $result->fetch_assoc()) {
                   $rows[] = $row;
                }
                return $rows;
            }
        }

        public function numRows() {
            $val = $this->numResults;
            $this->numResults = array();
            return $val;
        }

        public function saveData($table, $sql){
            return $this->query("INSERT INTO " . $table . "  SET " . $sql);
        }

        

        // public function save($table, $sql) {
        //     return $this->query("INSERT INTO " . $table . "  SET " . $sql);
        // }

        public function erase($table, $conditions) {
            return $this->query("DELETE FROM " . $table . "  WHERE " . $conditions);
        }
    
        public function countRows($table, $field = '*', $conditions) {
            $fields = trim($field);
            $this->query("SELECT " . $fields . " FROM " . $table . "  WHERE " . $conditions);
            return $this->numRows();
        }

        public function update($table, $sql, $conditions) {
            return $this->query("UPDATE " . $table . "  SET " . $sql . " WHERE " . $conditions);
        }
    
        // Function to insert into the database
	    public function insert($table, $params = array()) {
            // Check to see if the table exists
            if ($this->tableExists($table)) {
                $sql = 'INSERT INTO `' . $table . '` (`' . implode('`, `', array_keys($params)) . '`) VALUES ("' . implode('", "', $params) . '")';
                $this->myQuery = $sql; // Pass back the SQL
                // Make the query to insert to the database
                if ($this->myconn->query($sql)) {
                    array_push($this->result, $this->myconn->insert_id);
                    return true; // The data has been inserted
                } else {
                    array_push($this->result, $this->myconn->error);
                    return false; // The data has not been inserted
                }
            } else {
                return false; // Table does not exist
            }
        }

        //redirect function -> header()
        public function redirectOpen($location) {
            header("Location:{$location}");
            unset($_SESSION['csrf']);exit;
        }

        // to generate a token
        public function _tokenGen(){
            if (empty($_SESSION['csrf'])) {
                $_SESSION['csrf'] = strtolower(hash_hmac("sha256", uniqid(), bin2hex(openssl_random_pseudo_bytes(22))));

                return $_SESSION['csrf'];
            }
        }

        //real_escape_string
        public function escape($data) {
            return strtolower(trim(addslashes($this->myconn->real_escape_string($data))));
        }
    }
    $db = new Database;
?>