
<?php
abstract class Model
{
    protected static $dbc;
    protected static $table;
    protected $attributes = [];
    
    public function __construct()
    {
    	self::dbConnect();
    }

	protected static function dbConnect()
	    {
	        if (!self::$dbc) {
	            $dbc = new PDO('mysql:host=127.0.0.1;dbname=grapes_db', 'grape', 'grape');
	            self::$dbc = $dbc;
	        }
	    }

	public function __get($name)
	    {
	        if (isset($this->attributes[$name])) 
	        {
	            return $this->attributes[$name];   
	        } 
	        else 
	        {
	            return null;
	        }        
	    }

	    public function __set($name, $value)
	    {
	        $this->attributes[$name] = $value;
	    }

	public static function all() // returns all the records
    {
        self::dbConnect();
        $stmt = self::$dbc->query("SELECT * from static::$table");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

	public static function delete($id)
	{
		self::dbConnect();
		$query = "DELETE FROM users WHERE id= :id";
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':id', $id, PDO::PARAM_STR);
        
         $stmt->execute();

	}

	public static function find($id)
    {
        self::dbConnect();

        $query = "SELECT * FROM users WHERE id= :id";
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        
         $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if (!empty($result)) {
            $instance = new static($result);  // new Static = new User
        }
        return $instance;
    }

    public function save()
    {
        if(!empty($this->attributes)) {

            if(isset($this->id)) {
                $this->update();
            } else {
                $this->insert();
            }
          }
}
}
?>