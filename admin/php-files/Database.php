<?php

 class Database
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "e-commerce";
    private $conn = false;
    private $mysqli = null;
    private $myQuery = "";
    private $result = array();
    //constructor to initialize the mysqli
    public function __construct(){
        if ($this->conn == false) {
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                $this->conn = false;
            } else {
                $this->conn = true;
            }
        }
    }
    //end of constructor

    // function to insert records in database table
    public function insert($table, $params){
        if ($this->tableExists($table)) {
            $columns = implode(", ", array_keys($params));
            $values = implode("', '", $params);
            $sql = "INSERT INTO `$table` ($columns) VALUES ('$values')";
            $this->myQuery = $sql;
            // die($sql);
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }
    // end of insert function

    // function to update values
    public function update($table, $params=array(), $where){
        if ($this->tableExists($table)) {
            $values = array();
            foreach ($params as $key => $value) {
                $values[] = $key . "='$value'";
            }
            $updates = implode(" ," ,$values);
            $sql = "UPDATE `$table` SET $updates";
            if ($where !== null) {
                $sql .= " WHERE $where;";
            }
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
            
        } else {
            return false;
        }
    }
    // end of update function



    // select function

    public function select($table, $select="*", $join = null, $where = null, $orderBy = null, $limit = null){
        if ($this->tableExists($table)) {
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }
            $sql = "SELECT {$select} FROM `$table`";
            if ($join != null) {
                $sql .= " $join";
            }
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            if ($orderBy != null) {
                $sql .= " ORDER BY $orderBy";
            }
            if ($limit != null) {
                
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT $start, $limit";
            }
            // die($sql);
            $query = $this->mysqli->query($sql);
            if ($query) {
                array_push($this->result, $query->fetch_all(MYSQLI_ASSOC));
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }
    // end of select function

    // function to delete records
    public function delete($table, $where=null){
        if ($this->tableExists($table)) {
            $delete_sql = "DELETE FROM `$table`";
            if ($where!=null) {
                $delete_sql .= " where $where;";
            }
            if ($this->mysqli->query($delete_sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }
    // end of delete function


    // function for custom query
    public function sql($query){
        $custom_query = $this->mysqli->query($query);
        if ($custom_query) {
            $q_array = explode(" ", $custom_query);
            switch ($q_array[0]) {
                case 'SELECT':
                    array_push($this->result, $this->mysqli->insert_id);
                    break;
                case 'UPDATE':
                    array_push($this->result, $this->mysqli->affected_rows);
                    break;
                case 'DELETE':
                    array_push($this->result, $this->mysqli->affected_rows);
                    break;
            }
            return true;
        } else {
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }
    // end of custom query function
    // function for pagination
    public function pagination($table, $join=null, $where=null, $limit=null){
        if ($this->tableExists($table)) {
            $pagination_sql = "SELECT COUNT(*) FROM `$table`";
            if ($join!=null) {
                $pagination_sql .= " $join";
            }
            if ($where!=null) {
                $pagination_sql .= " WHERE $where";
            }
            if (isset($_GET["page"])) {
                    $page = $_GET["page"];
            } else {
                $page = 1;
            }
            $file_name = basename($_SERVER["PHP_SELF"]);
            $pagination_query = $this->mysqli->query($pagination_sql);
            if ($pagination_query) {
                $pagination_array = $pagination_query->fetch_all(MYSQLI_ASSOC);
                $total_rows = $pagination_array[0]["COUNT(*)"];
                $total_pages = ceil($total_rows / $limit);
                if ($total_pages > 1) {
                    echo "<div class='btn-toolbar mx-auto' style='width:fit-content;'  role='toolbar' aria-label='Toolbar with button groups'>
                        <div class='btn-group-toggle' style='width:fit-content;'>";
                        if ($page > 1) {
                            $j = $page - 1;
                            echo "<a class='btn btn-primary mx-1' href=\"$file_name?page=$j\">Prev</a>";
                        }
                    for ($i=1; $i <= $total_pages; $i++) { 
                        $active = ($page == $i) ? "pagination-active" : "" ;
                        echo "<a class='btn btn-primary mx-1 $active' href=\"$file_name?page=$i\">$i</a>";
                    }
                    if ($page < $total_pages) {
                        $k = $page + 1;
                        echo "<a class='btn btn-primary mx-1' href=\"$file_name?page=$k\">Next</a>";
                    }
                    echo "</div>
                    </div>";
                }
            } else {
                echo "<h5>Failed to load pagination</h5>";
            }
            
        }
    }

    // function to get result
    public function getResult(){
        $value = $this->result;
        $this->result = array();
        return $value;
    }
    // end of getResult function

    // function to escape string
    public function escapeString($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $this->mysqli->real_escape_string($data);
    }

    // Checks whether the table exists in database
    private function tableExists($table){
        $sql = "SHOW TABLES FROM `$this->db_name` LIKE '$table'";
        $tablesInDb = $this->mysqli->query($sql);
        if ($tablesInDb->num_rows > 0) {
            return true;
        } else {
            array_push($this->result, $table." Does not exist in database!");
            return false;
        }
    }
    // end of table exists function
    public function __destruct(){
        if ($this->conn == true) {
            $this->mysqli->close();
            $this->conn = false;
        }
    }
    // destructor function to unset mysqli
}

