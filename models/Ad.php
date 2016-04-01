<?php 

// require_once '../bootstrap.php';
require_once 'BaseModel.php';

class Ad extends Model 
{

	public static $table = 'ad_table';

	public function insert()
	{
		self::dbConnect();
        $stmt = self::$dbc->prepare("INSERT INTO ad_table (discount_name, description, percent_off, start_date, end_date, date_added, business_name, business_address, zip_code, img, category) 
            VALUES (:discount_name, :description, :percent_off, :start_date, :end_date, :date_added, :business_name, :business_address, :zip_code, :img, :category)");
        
        $stmt->bindValue(':discount_name', $this->discount_name, PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':percent_off', $this->percent_off, PDO::PARAM_INT);
        $stmt->bindValue(':start_date', $this->start_date, PDO::PARAM_INT);
        $stmt->bindValue(':end_date', $this->end_date, PDO::PARAM_INT);
        $stmt->bindValue(':date_added', $this->date_added, PDO::PARAM_STR);
        $stmt->bindValue(':business_name', $this->business_name, PDO::PARAM_STR);
        $stmt->bindValue(':business_address', $this->business_address, PDO::PARAM_STR);
        $stmt->bindValue(':zip_code', $this->zip_code, PDO::PARAM_INT);
        $stmt->bindValue(':img', $this->img, PDO::PARAM_STR);
        $stmt->bindValue(':category', $this->category, PDO::PARAM_STR);

        $stmt->execute();
	}

	public function update()
	{
		self::dbConnect();
        $stmt = self::$dbc->prepare("UPDATE ad_table SET discount_name = :discount_name, description = :description, percent_off = :percent_off, start_date = :start_date, end_date = :end_date, business_name = :business_name, business_address = :business_address, zip_code = :zip_code, category = :category WHERE id = :id");
    
       $stmt->bindValue(':discount_name', $this->discount_name, PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':percent_off', $this->percent_off, PDO::PARAM_INT);
        $stmt->bindValue(':start_date', $this->start_date, PDO::PARAM_INT);
        $stmt->bindValue(':end_date', $this->end_date, PDO::PARAM_INT);
        $stmt->bindValue(':date_added', $this->date_added, PDO::PARAM_STR);
        $stmt->bindValue(':business_name', $this->business_name, PDO::PARAM_STR);
        $stmt->bindValue(':business_address', $this->business_address, PDO::PARAM_STR);
        $stmt->bindValue(':zip_code', $this->zip_code, PDO::PARAM_INT);
        $stmt->bindValue(':img', $this->img, PDO::PARAM_STR);
        $stmt->bindValue(':category', $this->category, PDO::PARAM_STR);


        $stmt->execute();
    }

	}

?>