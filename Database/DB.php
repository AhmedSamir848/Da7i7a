<?php

/**
 * Description of DB
 *
 * @author Ahmed khaled
 * "da7i7a8";
 *
 */
class DB {

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private static $instance; // single database object
    private $db_name = "da7i7a"; //your database name 
    private $connection = false; // Default Value Must Be False Till The User Connect in Right Way
    private $connctionquery; // This Variable Holds The DB Info >> Look @ Connect Function

//private static $string; //
// __construct is the first Function Which Will Run Automatically When You Create an object from The DB Class

    private function __construct() {
        $this->connection = FALSE;
        $this->connect(); // Try To Connect >> Look@ Connect Function
    }

// Connecting To Database
    function connect() {
        $this->connctionquery = mysqli_connect($this->host, $this->username, $this->password); // TRY TO CONNECT 	// HOST NAME , DEFAULT USERNAME FOR DB , DB PASS
        if (!$this->connctionquery) { // if The Connection Failed
            die("DataBase Failed Connection " . mysql_error($this->connctionquery));
        } else {
            $this->connection = True; // Connecting Succefully Will Make The Value = TRUE
        }
        $select_db = mysqli_select_db($this->connctionquery, $this->db_name); // SELECT MY SPECIFIC DATABASE 'da7i7a'
        if (!$select_db) { // If DB isnot Selected
            die("DataBase Selection Failed" . mysql_error($this->connctionquery));
        }
    }

    /*     * ****************Singleton********************** */

    public static function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

// This Function Will Recieve The Queries which we Generate in the Following Functions & excuting them
    function excute($query) {
        if ($this->connection == TRUE) {
            $result = mysqli_query($this->connctionquery, $query);  // EXCUITE QUERY AND RETURN TRUE OR FALSE
            return $result;
        } else {
            return FALSE;
        }
    }

// Adding Function >> You Must Send assoc_array & DB_Table_Name
//INSERT INTO table_name (column1, column2, column3,...) VALUES (value1, value2, value3,...)
//$Info is Assoc_array which We will Send to be inserted into The DB
    function insert($Info, $T_Name) { //& T_Name is The Table Name
        $Column = ""; //this Variable Will Hold the Coloumns after we extracting them from the Assoc_array Which We Sent
        $Values = ""; // this Variable Will Hold the Values of The This Coulmns & Also will be Extracted From the Assoc_array
        foreach ($Info as $col => $V) {
            $Column.=$col . "`,`"; // Extracting The Coloumns From The Assoc_array Which we sent & Adding coma " , " after each coloumn Extracted
            $Values.= "'" . $V . "',"; // Extracting The Values From The Assoc_array Which we sent & Adding coma " , " after each value Extracted & Put the value between Qoutes
        }
        $Column = rtrim($Column, ", `"); //Deleting the Last Coma
        $Values = rtrim($Values, ","); //Deleting the Last Coma
        $query = "INSERT INTO " . "`" . $T_Name . "`" . " ( " . "`" . $Column . "`" . " ) VALUES ( " . $Values . " )"; // INSERTION QUERY  after Concatenating its' parts
// EXCUITE QUERY AND RETURN TRUE OR FALSE
//echo $query;
//$result = mysqli_query($GLOBALS['conn'],$query);
        $result = $this->excute($query);
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

// Edit Info >> You must Send assoc_array & DB_Table_Name & The Condition
//UPDATE table_name SET column1=value, column2=value2,... WHERE some_column=some_value
    function update($Info, $T_name, $column, $value) {
        $query = "UPDATE " . $T_name . " SET ";
        foreach ($Info as $col => $val) {
            $query .=$col . "=" . "'" . $val . "'" . ",";
        }
        $query = rtrim($query, ",");
        $query .= " Where " . $column . "=" . "'" . $value . "'";
//echo $query;
        return $this->excute($query);
    }

// Deleting Record From DB >>You must Send DB_Table_Name & The Condition
// DELETE FROM table_name WHERE some_column = some_value
    function Delete($T_name, $col, $val) {
        $query = "Delete From " . $T_name . " Where $col" . "=" . "'" . $val . "'";
//echo $query;
        return $this->excute($query);
    }

// UN KNOWN FORMAT FOR OUTPUT
//RETURN A 2D ASSOCIATIVE ARRAY
// SELECT * From TableName
    function select_all($T_Name) {
        $query = "SELECT * FROM " . $T_Name;
        //echo "The Query is " . $query;
        return mysqli_fetch_all($this->excute($query), MYSQLI_ASSOC);
    }

    function select_all_by_condition($T_Name, $condition) {
        $query = "SELECT * FROM " . $T_Name . " WHERE " . $condition;
//echo $query;
        return mysqli_fetch_all($this->excute($query), MYSQLI_ASSOC);
    }

    /*     * * Compete System Function ( Hala) ************** */
    /*     * ****************** Top 3 Score  *************** */

    function select_all4($T_Name1, $T_Name2, $col, $val, $col2, $val2) {
        $query = "SELECT " . $T_Name1 . ".*" . "," . $T_Name2 . ".* FROM " . $T_Name1 . "," . $T_Name2 . " WHERE " . $col . " =" . $val . " AND " . $col2 . " =" . " '" . $val2 . "'";
        //echo "query is : " . $query;
        $result = mysqli_fetch_all($this->excute($query), MYSQLI_ASSOC);
        //echo '<pre>';
        //var_dump($result);
        //echo '</pre>';
        return $result;
    }

// SELECT * FROM TableName Where col = 'Val'
//RETURN ASSOCIATIVE ARRAY WITH KEYS = COLUMNS AND VALUES = CONTENT
//    function select_one($T_Name, $col, $val) {
//        $query = "SELECT * FROM " . $T_Name . " WHERE " . $col . " =" . " '" . $val . "'";
//        $result = $this->excute($query);
//        $assoc = array();
////$assoc = mysqli_fetch_array($result);
//        while (($row = mysqli_fetch_array($result)) != null) {
//            array_push($assoc, $row);
//        }
//        return $assoc;
//    }
    // SELECT * FROM TableName Where col = 'Val'
    //RETURN ASSOCIATIVE ARRAY WITH KEYS = COLUMNS AND VALUES = CONTENT
    function select_one($T_Name, $col, $val) {
        $query = "SELECT * FROM " . $T_Name . " WHERE " . $col . " =" . " '" . $val . "'";
        $result = $this->excute($query);
        $assoc = mysqli_fetch_array($result);
        return $assoc;
    }

// return associative array
    function select_one_assoc($T_Name, $col, $val) {
        $query = "SELECT * FROM " . $T_Name . " WHERE " . $col . " =" . " '" . $val . "'";
        $result = $this->excute($query);
        $assoc = mysqli_fetch_assoc($result);
        return $assoc;
    }

// SELECT Col1 , Col2 from T_Name Where Key = val
//RETURN ASSOCIATIVE ARRAY WITH KEYS = SENT ARRAY CONTENT ( $arr ) AND VALUES
    function select_cols($arr, $T_Name) {
        $column = "";
        foreach ($arr as $col) {
            $column.=$col . ",";
        }
        $column = rtrim($column, ",");
        $query = "SELECT " . "$column From " . $T_Name;
        $result = $this->excute($query);
        $assoc = array(); // Dy s7 : 43ban // w el 2dima kman kant s7 enta ely 84im : 5aled
        while (($row = mysqli_fetch_array($result)) != null) {
            array_push($assoc, $row);
        }
        return $assoc;
    }

// SELECT Col1 , Col2 from T_Name Where Key = val
//RETURN ASSOCIATIVE ARRAY WITH KEYS = SENT ARRAY CONTENT ( $arr ) AND VALUES
    function select_Specific_cols($arr, $T_Name, $key, $val) {
        $column = "";
        foreach ($arr as $col) {
            $column.=$col . ",";
        }
        $column = rtrim($column, ",");
        $query = "SELECT " . "$column From " . $T_Name . " Where $key =" . "'" . $val . "'";
        $result = $this->excute($query);
        $assoc = mysqli_fetch_array($result);
        return $assoc;
    }

    function select_Specific_cols_return_assoc($arr, $T_Name, $key, $val) {
        $column = "";
        foreach ($arr as $col) {
            $column.=$col . ",";
        }
        $column = rtrim($column, ",");
        $query = "SELECT " . "$column From " . $T_Name . " Where $key = " . "' " . $val . " '";
        $result = $this->excute($query);
        return mysqli_fetch_assoc($result);
    }
    function select_Specific_cols_return_all($arr, $T_Name, $key, $val) {
        $column = "";
        foreach ($arr as $col) {
            $column.=$col . ",";
        }
        $column = rtrim($column, ",");
        $query = "SELECT " . "$column From " . $T_Name . " Where $key = " . "' " . $val . " '";
        $result = $this->excute($query);
        return mysqli_fetch_all($result);
    }

    public function getLastElement($colName, $T_name) {
        $query = "SELECT " . $colName . " FROM " . $T_name . " ORDER BY " . $colName . " DESC LIMIT 1";
        $result = $this->excute($query);
        $assoc = mysqli_fetch_array($result);
        return $assoc;
    }

//Disconnecting The Database
    Public Function disConnect() {
        mysql_close();
    }

    /*     * ********* LOGIN Functions ************************* */

// if element exist on the database or not
    public function element_exist($T_Name, $key, $val, $full_condition) {

        if ($full_condition != "") {
            $query = "SELECT * FROM " . $T_Name . " Where " . $full_condition;
        } else {
            $query = "SELECT * FROM " . $T_Name . " Where $key =" . "'" . $val . "'";
        }
        $result = $this->excute($query);
        $row = mysqli_num_rows($result);
//echo "Number Of Rows From Inside Function Is ".  var_dump($row)."<br>";
        return $row;
    }

    /*     * **************************************************************************************** */

//Wael Eid Functions
    public function get_row($query) {
        if (!strstr(strtoupper($query), "LIMIT"))
            $query .= " LIMIT 0,1";
        if (!($res = $this->excute($query))) {
            die("Database error: " . mysqli_error() . "<br/>In query: " . $query);
        }
        return mysqli_fetch_assoc($res);
    }

    public function get_user_by_username_password($username, $password, $table) {
//        $username=$this->DB->clean($username);
//        $password=$this->DB->clean($password);
        $Query = "SELECT * FROM `$table` where email='$username' and password='$password'";
        $user_data = $this->get_row($Query);
        return $user_data;
    }

    public function get_user_by_mail_rand($email, $rand_pass, $table) { //new ya abo 5aled
        //        $username=$this->DB->clean($username);
        //        $password=$this->DB->clean($password);
        $Query = "SELECT * FROM `$table` where email='$email' and rand_pass='$rand_pass'";
        $user_data = $this->get_row($Query);
        return $user_data;
    }

    /*     * ********************** LIST DB-Table Fuction Samir ****************** */

    function select_distincit_column($TName, $Col) {
        $query = "SELECT DISTINCT " . $Col . " FROM " . $TName;
// echo $query;
        $result = $this->excute($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function fulljoin($columns, $table1, $table2, $condition) {
        $query = "SELECT " . $columns . " FROM " . $table1 . " JOIN " . $table2 . " ON " . $condition;
        $result = $this->excute($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /** Report **/
     function select_one_v2($T_Name, $col, $val) {
        $query = "SELECT * FROM " . $T_Name . " WHERE " . $col . " =" . " '" . $val . "'";
        $result = $this->excute($query);
        $assoc = array();
        //$assoc = mysqli_fetch_array($result);
        while (($row = mysqli_fetch_array($result))!=null) {
            array_push($assoc, $row);
        }
        return $assoc;
    }

}
