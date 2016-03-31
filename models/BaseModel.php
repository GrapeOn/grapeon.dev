
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

	protected abstract function insert();
	{

	}
	protected abstract function update();
	{

	}

	all()
	find(id)
	delete()

	public static function all()
    {
        self::dbConnect();
        $stmt = self::$dbc->query("SELECT * from static::$table");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;// @TODO: Learning from the find method, return all the matching records
    }
}
