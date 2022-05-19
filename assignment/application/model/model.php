<?php
class Model {
	// Property declaration, in this case we are declaring a variable or handeler that points to the database connection, this will become a PDO object
	public $dbhandle;
	
	// Method to create database connection using PHP Data Objects (PDO) as the interface to SQLite
	public function __construct()
	{
		// Set up the database source name (DSN)
		$dsn = 'sqlite:./db/test1.db';
		
		// Then create a connection to a database with the PDO() function
		try {	
			// Change connection string for different databases, currently using SQLite
			$this->dbhandle = new PDO($dsn, 'user', 'password', array(
    													PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    													PDO::ATTR_EMULATE_PREPARES => false,
														));
			// $this->dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// echo 'Database connection created</br></br>';
		}
		catch (PDOEXception $e) {
			echo " I'm afraid I can't connect to the database!";
			// Generate an error message if the connection fails
        	print new Exception($e->getMessage());
    	}
	}
	
	public function dbCreateTable()
	{
		try {
			$this->dbhandle->exec("CREATE TABLE item_Description (Id INTEGER PRIMARY KEY, item_Description1 TEXT, item_Description2 TEXT, item_Description3 TEXT, model_Description1 TEXT,  model_Description2 TEXT,  model_Description3 TEXT)");
			return "item_Description table is successfully created inside test1.db file";
		}
		catch (PD0EXception $e){
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}
	

	public function dbGetBrand()
	{
		// Return the car Brand Names
		return array("-", "Coke", "Coke Light","Coke Zero","Sprite", "Dr Pepper", "Fanta");
	}

	public function dbInsertData()
	{
		try{
			$this->dbhandle->exec(
			"INSERT INTO item_Description (Id, item_Description1, item_Description2, item_Description3, model_Description1, model_Description2, model_Description3 )
			 
				VALUES (10, 'Coca-Colas German branch developed Fanta during World War II due to heavy embargoes that prevented the import of Coke syrup. Modern-day Fanta evolved from the Fanta that was re-introduced to Italy in 1955.',
				 		'Appletiser is a sparkling fruit juice created by blending fruit juice with carbonated water. It was created in 1966 in Elgin Valley, Western Cape, South Africa, by French-Italian immigrant Edmond Lombardi. ',
						'Diet Coke was the first new brand since 1886 to use the Coca-Cola trademark. The product quickly overtook the companys existing diet cola, Tab, in sales', 
						'Fanta is known for its upbeat colorful advertising; in the United States, it showcases The Fantanas, a group of young female models, each of whom promotes an individual Fanta flavor.', 
						'For over 50 years, Appletiser has been expertly crafting its unique blend of sparkling 100% natural apple juice. It has no added sugar, colourants, or preservatives and it is the perfect drink to accompany food or for other social occasions.',
						'When diet colas first entered the market, beginning with Diet Rite, the Coca-Cola Company had a long-standing policy to use the Coca-Cola name only on its flagship cola, and so its diet cola was named Tab when it was released in 1963.'); "
						
					);
			return "data inserted successfully inside test1.db";
		}
		catch(PD0EXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}

	public function dbGetData(){
		try{
			// Prepare a statement to get all records from the Model_3D table
			$sql = 'SELECT * FROM item_Description';
			// Use PDO query() to query the database with the prepared SQL statement
			$stmt = $this->dbhandle->query($sql);
			// Set up an array to return the results to the view
			$result = null;
			// Set up a variable to index each row of the array
			$i=-0;
			// Use PDO fetch() to retrieve the results from the database using a while loop
			// Use a while loop to loop through the rows	
			while ($data = $stmt->fetch()) {
				// Don't worry about this, it's just a simple test to check we can output a value from the database in a while loop
				// echo '</br>' . $data['x3dModelTitle'];
				// Write the database conetnts to the results array for sending back to the view
				$result[$i]['item_Description1'] = $data['item_Description1'];
				$result[$i]['item_Description2'] = $data['item_Description2'];
				$result[$i]['item_Description3'] = $data['item_Description3'];
				$result[$i]['model_Description1'] = $data['model_Description1'];
				$result[$i]['model_Description2'] = $data['model_Description2'];
				$result[$i]['model_Description3'] = $data['model_Description3'];
				//increment the row index
				$i++;
			}
		}
		catch (PD0EXception $e) {
			print new Exception($e->getMessage());
		}
		// Close the database connection
		$this->dbhandle = NULL;
		// Send the response back to the view
		return $result;
	}
	
	//Method to simulate the model data
	public function model3D_info()
	{
		// Simulate the model's data
		return array(
			'model_1' => 'Coke Light',
			'image3D_1' => 'Coke Light',

			'model_2' => 'Coke Zero',
			'image3D_2' => 'Coke Zero',

			'model_3' => 'Coke',
			'image3D_3' => 'Coke',

			'model_4' => 'Dr Pepper',
			'image3D_4' => 'Dr Pepper',

			'model_5' => 'Fanta',
			'image3D_5' => 'Fanta',

			'model_6' => 'Sprite',
			'image3D_6' => 'Sprite'
		);
	}
}
?>