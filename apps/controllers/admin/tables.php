<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***************************************************************************
|--------------------------------------------------------------------------
| Tables Class (admin)
|--------------------------------------------------------------------------
|
| Written by Mark Gray for MedHab, LLC.
| 3 January 2014
| All information included is copyrighted MedHab, LLC 2013
|
***************************************************************************/
class Tables extends StepRite_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in')) {
			redirect('admin/login');
		}
		$this->header_info = "<p>You can edit the table below by using the actions located to the right. 
		For larger tables you may have to scroll to the right to view the actions.</p>
		<br/>
		To return to the table selection screen <a href='" . base_url() . "admin/tables'>Click Here</a>";
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}
	
	
	/***************************************************************************
	|--------------------------------------------------------------------------
	| Index
	|--------------------------------------------------------------------------
	|
	| Display the tables in a select box and after choosing one it reloads the view
	| with a CRUD that allows for editing of the fields of that table.
	|
	***************************************************************************/	
	public function index() {
	
		if(!($this->input->server('REQUEST_METHOD') === 'POST')){
	
			/************************/
			/*    Load File View    */
			/************************/
			$data['view'] = 'admin/tables';
			$data['tables'] = $this->db->list_tables();
			$data['header_info'] = "<h2>Modify Database Tables</h2>";
			$this->load->view('admin/init', $data);
		}else{
		
			redirect('admin/tables/'.$this->input->post("table"));
			/*
			$crud = new grocery_CRUD();
			
			$crud->set_theme('flexigrid');
			$crud->set_table($this->input->post("table"));
			$crud->set_subject($this->input->post("table"));
			
			$output = $crud->render();
			
			$this->load->view('admin/table', $output);*/
		
		}
		
		
	}
	
	/***************************************************************************
	|--------------------------------------------------------------------------
	| Table Functions
	|--------------------------------------------------------------------------
	|
	|The functions below are used to display and modify the tables in the database
	|using the grocery_CRUD application. Some may have columns defined and some
	|may not. The ones with columns defined are done so that the "id" field will
	|appear on the table view. This is needed when associating the "id" with a 
	|foreign key, and this should make looking ID's up easier.
	|
	***************************************************************************/	
	
	public function activities(){
	
		$crud = new grocery_CRUD();
			
		$crud->set_theme('flexigrid');
		$crud->set_table("activities");
		$crud->set_subject("Activity");
		
		$crud->columns("id","patient_id","protocol_id","date_time","left_calc","right_calc");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	
	
	}
	
	public function admin(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("admin");
		$crud->set_subject("Admin");
		
		$crud->columns("id", "username", "first_name", "last_name", "password", "email", "type");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function admin_types(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("admin_types");
		$crud->set_subject("Admin Types");
		
		$crud->columns("id", "type");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function articles(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("articles");
		$crud->set_subject("Articles");
		
		$crud->columns("id", "name", "article", "entry_date");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function authlock(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("authlock");
		$crud->set_subject("Authlock");
		
		$crud->columns("id", "user_id", "timestamp");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function authlock_log(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("authlock_log");
		$crud->set_subject("Authlock Log");
		
		$crud->columns("id", "user_id", "timestamp");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function coefficients(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("coefficients");
		$crud->set_subject("Coefficients");
		
		$crud->columns("id", "serial_number", "type", "f1_c1","f1_c2","f1_c3","f1_c4",
		"f2_c1", "f2_c2", "f2_c3", "f2_c4",
		"f3_c1", "f3_c2", "f3_c3", "f3_c4",
		"f4_c1", "f4_c2", "f4_c3", "f4_c4",
		"ax_offset","ax_sensitivity", 
		"ay_offset","ay_sensitivity", 
		"az_offset","az_sensitivity", 
		"gx_offset","gx_sensitivity", 
		"gy_offset","gy_sensitivity", 
		"gz_offset","gz_sensitivity", 
		"mx_offset","mx_sensitivity", 
		"my_offset","my_sensitivity", 
		"mz_offset","mz_sensitivity");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function custom_exercises(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("custom_exercises");
		$crud->set_subject("Custom Exercises");
		
		$crud->columns("id", "exercise_id", "reps", "hold_time", "weight");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function exercises(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("exercises");
		$crud->set_subject("Exercises");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function exercise_types(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("exercise_types");
		$crud->set_subject("Exercise Types");
		
		$crud->columns("id", "name");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function extended_dates(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("extended_dates");
		$crud->set_subject("Extended Date");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function forcecalculations(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("forcecalculations");
		$crud->set_subject("Force Calculation");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function forms(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("forms");
		$crud->set_subject("Form");
		
		
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function gaitcalculations(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("gaitcalculations");
		$crud->set_subject("Gait Calculations");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function injurycategories(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("injurycategories");
		$crud->set_subject("Injury Category");
		
		$crud->columns("id","description");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function injurytypes(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("injurytypes");
		$crud->set_subject("Injury Type");
		
		$crud->columns("id", "name", "category");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function notes(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("notes");
		$crud->set_subject("Note");
		
		
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function notifications(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("notifications");
		$crud->set_subject("Notification");
		
		$crud->columns("id", "message", "date", "time", "new", "doctor_id", "type");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function patients(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("patients");
		$crud->set_subject("Patient");
		
		$crud->columns("id", "user_id", "weight", "height", "observed", "mrn", "provider_id", "pt", "dr", "phone_num", "pending", "start_date", "end_date", "reports", "delivery_date", "status_treatment", "aob_accepted", "ctt_accepted", "pfp_accpeted", "times", "form_id", "reg_date", "processed_date");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	public function protocols(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("protocols");
		$crud->set_subject("Protocol");
		$crud->columns("id", "patient_id", "custom_exercise_id", "active", "mandatory", "start_date", "end_date");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function providers(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("providers");
		$crud->set_subject("Provider");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function romcalculations(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("romcalculations");
		$crud->set_subject("Rom Calcuation");
		
		$crud->columns("id", "average", "minimum", "maximum", "reps", "time", "rep_average", "rep_min", "rep_max", "force1" ,"force2" ,"force3", "force4");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function serial(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("serial");
		$crud->set_subject("Serial");
		
		$crud->columns("serial_number", "macl", "macr", "timestamp", "admin_id", "patient_id");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function sessions(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("sessions");
		$crud->set_subject("Session");
		
		$crud->columns("session_id", "ip_address", "user_agent", "last_activity", "user_data");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function standard_emails(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("standard_emails");
		$crud->set_subject("Standard Email");
		
		$crud->columns("id", "name", "subject", "content");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function stepcalculations(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("stepcalculations");
		$crud->set_subject("Step Calculation");
		
		$crud->columns("id", "step_num", "gait_id", "stride_dist", "swing_time", "stance_time");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function users(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("users");
		$crud->set_subject("User");
		
		$crud->columns("id","type", "first_name", "last_name", "password", "email", "active");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	public function user_type(){
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table("user_type");
		$crud->set_subject("User Type");
		
		$crud->columns("id", "type");
		
		$output = $crud->render();
		$output->header_info = $this->header_info;
		$this->load->view('admin/table', $output);
	}
	
	
	
	
	
	
	
	
	
	
	

	
	
}