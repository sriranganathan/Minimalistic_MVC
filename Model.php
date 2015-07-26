<?php
class Model
{   
	public $database;
	public $table;
	public function save()
	{
		$elements =get_object_vars( $this );
		$sql = "Insert into $this->table (";
		foreach ($elements as $element=>$value)
		if(strcmp($element,"database")&&strcmp($element,"table"))
		$sql.=$element.",";
		$sql = rtrim($sql, ",");
		$sql.=") values (";
		foreach ($elements as $element=>$value)
		if(strcmp($element,"database")&&strcmp($element,"table"))
		$sql.="\"".$value."\",";
		$sql = rtrim($sql, ",");
		$sql.=");";
		$conn = new mysqli("localhost", "root","", $this->database);
		$conn->query($sql);
		
	}
	public function where($col,$cond,$value)
	{
		$conn = new mysqli("localhost", "root","", $this->database);
		$sql = "SELECT * from $this->table where $col $cond \"$value\";";
		return $conn->query($sql);
	}
}
?>