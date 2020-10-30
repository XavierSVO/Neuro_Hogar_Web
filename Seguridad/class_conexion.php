<?php
	class Database{

        private $con;
        
		private $dbhost;
        
        private $dbuser;
        
        private $dbpass;
        
        private $dbname;

    public function set_dbname($dbname)
    {
        $this->dbname=$dbname;
    }
    public function set_dbhost($dbhost)
    {
        $this->dbhost=$dbhost;
    }
    public function set_dbuser($dbuser)
    {
        $this->dbuser=$dbuser;
    }       
    public function set_dbpass($dbpass)
    {
        $this->dbpass=$dbpass;
    }
    public function get_con()
    {
        return $this->con;
    }              
        
    public function __construct($dbhost,$dbuser,$dbpass,$dbname){
        
            $this->con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        
            if(mysqli_connect_error()){
        
                die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        
        }
    }
    public function close_db()
    {
        mysqli_close($this->con);
    }
    public function insert($tbl_name, $data)
	{
		$field_set = "";

		foreach($data as $f_key => $f_value)
		{
			$field_set = $field_set."$f_key='$f_value',";
		}

		$field_set = rtrim($field_set,",");

		$query = "INSERT INTO $tbl_name SET $field_set";
    
        $query_fire = mysqli_query($this->con, $query);

		if($query_fire == 'TRUE')
		{
			return $query_fire;
		}
		else
		{
			return false;
		}
    }
    public function select($data,$tbl_name,$tbl_condition_row,$tbl_condition_value)
	{
       
        $query = "SELECT $data FROM $tbl_name WHERE $tbl_condition_row=$tbl_condition_value ";
    
        return $query_fire = mysqli_query($this->con, $query);
    }
    public function select_all($tbl_name)
	{
		$query = "SELECT * FROM $tbl_name";
    
        return $query_fire = mysqli_query($this->con, $query);

    }
    public function update($tbl_name,$data,$tbl_condition_row,$tbl_condition_value)
	{
		$field_set = "";

		foreach($data as $f_key => $f_value)
		{
			$field_set = $field_set."$f_key='$f_value',";
		}

		$field_set = rtrim($field_set,",");

		$query = "UPDATE $tbl_name SET $field_set WHERE $tbl_condition_row=$tbl_condition_value";
    
        $query_fire = mysqli_query($this->con, $query);

		if($query_fire == 'TRUE')
		{
			return $query_fire;
		}
		else
		{
			return false;
		}
    }
    public function count_table($tbl_name)
    {
        $query = "SELECT COUNT(*) from $tbl_name";
    
        return $query_fire = mysqli_query($this->con, $query);
    }
    
}
?>