
<?php
class users extends Model
{   
	public function __construct($database,$table)
    {
		$this->database = $database;
		$this->table = $table;
	}
}
?>