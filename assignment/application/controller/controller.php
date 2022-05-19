<?php
// Create the controller class for the MVC design pattern
class Controller {

	// Declare public variables for the controller class
	public $load;
	public $model;
	
	// Create functions for the controller class
	function __construct($pageMethod = null)
	{
		// echo $pageURI;
		$this->load = new Load();
		$this->model = new Model();
		// Determine what page you are on
		$this->$pageMethod();
	}
	// Load the home page mmethod — this method is loaded by default — http://localhost:8888/3D_Apps_2019/lab9/index.php/

    function home()
	{


		$data = $this->model->dbGetData();
		$_SESSION["data"] = $data;
		$this->load->view('viewCocaCola');


	}


	// http://localhost:8888/3D_Apps_2019/lab9/index.php/apidrinksimages
	function apiDrinksImages()
	{
		$data = $this->model->model3D_info();
		$this->load->view('view3DAppTest_2', $data);
	}


	function apiCreateTable()
	{
	  	// echo "Create table function";
		$data = $this->model->dbCreateTable();
		$this->load->view('viewMessage', $data);
	}
	function apiInsertData()
	{
		$data = $this->model->dbInsertData();
	   	$this->load->view('viewMessage', $data);
	}  
	function apiGetData()
	{
		$data = $this->model->dbGetData();
		$this->load->view('view3DAppData', $data);
	}  	
	

	function apiGetFlickrFeed()
	{
		$this->load->view('viewFlickrFeed');
	}
	

	function apiGetJson()
	{
		$this->load->view('viewJson');
	}
	

	function apiLoadImage()
	{
	   $data = $this->model->dbGetBrand();

	   $this->load->view('viewDrinks', $data);
	}


	function apiCocaCola()
	{
		$this->load->view('viewCocaCola');	
	}


	function apiGetCokeData()
	{
		$data = $this->model->dbGetData();
		echo json_encode($data);
	}  	  	
	
}
?>    