<?php
    require_once "config.php";
    class Database{
        private $db_host = "DB_HOST"; // Change as required 
        private $db_user = "DB_USER"; // Change as required
        private $db_pass = "DB_PASSWORD"; // Change as required
        private $db_name = "DB_NAME"; // Change as required

        private $con = false; // Check to see if the connection is active
        private $myconn = ""; // This will be our mysqli object
        private $result = array(); // Any results from a query will be stored here
        private $myQuery = ""; // used for debugging process with SQL return
        private $numResults = ""; // used for returning the number of rows

        // Function to make connection to database
        public function connect() {
            if (!$this->con) {
                $this->myconn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name); // mysql_connect() with variables defined at the start of Database class
                if ($this->myconn->connect_errno > 0) {
                    array_push($this->result, $this->myconn->connect_error);
                    return false; // Problem selecting database return FALSE
                } else {
                    $this->con = true;
                    return true; // Connection has been made return TRUE
                }
            } else {
                return true; // Connection has already been made return TRUE
            }
        }

        // Function to disconnect from the database
        public function disconnect() {
            // If there is a connection to the database
            if ($this->con) {
                // We have found a connection, try to close it
                if ($this->myconn->close()) {
                    // We have successfully closed the connection, set the connection variable to false
                    $this->con = false;
                    // Return true that we have closed the connection
                    return true;
                } else {
                    // We could not close the connection, return false
                    return false;
                }
            }
        }

        public function numRows() {
            $val = $this->numResults;
            $this->numResults = array();
            return $val;
        }

        public function save($table, $sql) {
            return $this->sql("INSERT INTO " . $table . "  SET " . $sql);
        }

        public function erase($table, $conditions) {
            return $this->sql("DELETE FROM " . $table . "  WHERE " . $conditions);
        }
    
        public function countRows($table, $field = '*', $conditions) {
            $fields = trim($field);
            $this->sql("SELECT " . $fields . " FROM " . $table . "  WHERE " . $conditions);
            return $this->numRows();
        }

        public function select($table, $field = '*', $conditions = "", $column = '') {
            $fields = trim($field);
            $where = !empty($conditions) ? "WHERE" : "";
            $this->sql("SELECT " . $fields . " FROM " . $table . "  $where " . $conditions);
            $rlt = array_filter($this->getResult());
            //var_dump($rlt); $this->getSql();
            //echo $column;
            if (is_object($rlt) || is_array($rlt) || !empty($rlt)) {
                return !empty($column) ? $rlt[0][$column] : $rlt;
            }
        }
    
        public function update($table, $sql, $conditions) {
            return $this->sql("UPDATE " . $table . "  SET " . $sql . " WHERE " . $conditions);
        }
    
        public function sql($sql) {
            //var_dump($sql); exit;
            $query = $this->myconn->query($sql);
            $this->myQuery = $sql; // Pass back the SQL
            if ($query) {
    // If the query returns >= 1 assign the number of rows to numResults
                $this->numResults = $query->num_rows;
    // Loop through the query results by the number of rows returned
                for ($i = 0; $i < $this->numResults; $i++) {
                    $r = $query->fetch_array();
                    $key = array_keys($r);
                    for ($x = 0; $x < count($key); $x++) {
                        // Sanitizes keys so only alphavalues are allowed
                        if (!is_int($key[$x])) {
                            if ($query->num_rows >= 1) {
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            } else {
                                $this->result = "";
                            }
    
                        }
                    }
                }
                return true; // Query was successful
            } else {
                array_push($this->result, $this->myconn->error);
                return false; // No rows where returned
            }
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

        // public function redirect($location) {
        // 	header("Location:?GJH={$location}");
        // 	unset($_SESSION['_token']);
        // 	exit;
        // }

        public function redirectOpen($location) {
            header("Location:{$location}");
            unset($_SESSION['_token']);
            exit;
        }
    }
    $db = new Database;
?>