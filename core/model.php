<?php
include("db_connect.php");
class TodoModel 
   {
    protected $tableName;

    public function __construct(){
    	$this->tableName = "todo_list";
    }
    public function get_all_data(){
    	global $DB;
    	$sql = "SELECT * FROM $this->tableName";
    	$result = $DB->query($sql);
    	return $result;
    }
    public function insert($date_time, $todo, $status)
    {
    	global $DB;
        $sql = "INSERT INTO $this->tableName (date_time,todo,status) VALUES('".$date_time."','".$todo."','".$status."')";
    	$DB->query($sql);
    }
    public function update_by_id($id,$date_time,$todo,$status)
    {
    	global $DB;
        $sql = "UPDATE $this->tableName SET date_time='".$date_time."', todo='".$todo."', status='".$status."' WHERE id='".$id."'";
        $DB->query($sql);
        
    }
  	public function delete_by_id($id) 
    {		
    	global $DB;
    	$sql = "DELETE FROM todo_list WHERE id='".$id."'";
    	$DB->query($sql);
    }
    public function create_table(){
    	global $DB;
    	$sql = "CREATE TABLE IF NOT EXISTS $this->tableName (
			id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			date_time VARCHAR(100) NOT NULL,
			todo VARCHAR(200) NOT NULL,
			status VARCHAR(50) NOT NULL
		)";

		$DB->query($sql);
    }
    public function autoload(){
    	global $DB;
    	if(!$this->empty_table())return;
    	$primary_data = array(
    		array("27 Nov. 11 pm.","Goto School","finish"),
    		array("24 Nov. 13pm.","AAAAA","not finish"),
    		array("28 Nov. 12pm.","BBBB",""),
    		array("29 Nov. 3pm.","CCCC","")
    	);
    	foreach($primary_data as $row){
    		$this->insert($row[0],$row[1],$row[2]);
    	}    	
    }
    public function empty_table(){
    	global $DB;
    	$query = "SELECT * FROM $this->tableName";
    	$results = $DB->query($query);
    	$num_rows = $results->num_rows;
    	if($num_rows==0) return true;
		else return false;
    }
}
if($_POST){
	$action = $_POST['action']?$_POST['action']:"";
	if($action == "delete"){
		TodoModel::delete_by_id($_POST['id']);
	}	
	// else if($action=="edit"){
	// 	$id = $_POST['id'],
	// 	$date_time = $_POST['date_time'],
	// 	$todo = $_POST['todo'];
	// 	$status = $POST['status'];
	// 	TodoModel::update_by_id($id, $date_time, $todo,);
	// }
}
?>
