
<?php
abstract class Model
{
    public static $dbc;
    protected static $table = '';
    protected $attributes = [];
    
    public function __construct($attributes = [])
    {
    	self::dbConnect();
        $this->attributes = $attributes;
    }

	public static function dbConnect()
	    {
	        if (!self::$dbc) {
	            $dbc = new PDO('mysql:host=127.0.0.1;dbname=grapes_db', 'grape', 'grape');
	            self::$dbc = $dbc;
                $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

    public function save()
    {
        if(!empty($this->attributes)) {

            if(isset($this->attributes['id'])) {
                $this->update();
            } else {
                $this->insert();
                echo "DEBUG: the save() function ran to completion." . PHP_EOL;
            }
          }
          
      }
}
?>