<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function mba()
	{
	    $this->load->view('mba_page');
	}
	
	public function bba()
	{
	    $this->load->view('bba_page');
	}
	
	public function mca()
	{
	    $this->load->view('mca_page');
	}
	
	public function bca()
	{
	    $this->load->view('bca_page');
	}
	
	public function academic_programes()
	{
	    $this->load->view('academic_programes_page');
	}
	
	public function regStudent()
	{
		$this->load->view('regStudent');
	}
	public function aboutUs()
	{
		$this->load->view('aboutUs');
	}
	public function beyondAcademics()
	{
		$this->load->view('beyondAcademics');
	}
	public function chairmanMessage()
	{
		$this->load->view('chairmanMessage');
	}
	public function directorMessage()
	{
		$this->load->view('directorMessage');
	}
	
	public function faculty()
	{
		$this->load->view('faculty');
	}
	public function admissinProcedure()
	{
		$this->load->view('admissinProcedure');
	}
	public function fmRedio()
	{
		$this->load->view('fmRedio');
	}
	public function infrastructure()
	{
		$this->load->view('infrastructure');
	}
	public function lectureTheaters()
	{
		$this->load->view('lectureTheaters');
	}
	public function library()
	{
		$this->load->view('library');
	}
	public function pedagogy()
	{
		$this->load->view('pedagogy');
	}
	public function hostel()
	{
		$this->load->view('hostel');
	}
	public function umang()
	{
		$this->load->view('umang');
	}
	public function placedStudent()
	{
		$this->load->view('placedStudent');
	}
	public function training()
	{
		$this->load->view('training');
	}
	public function recruiters()
	{
		$this->load->view('recruiters');
	}
	public function gallery()
	{
		$this->load->view('gallery');
	}
	public function alumniStudent()
	{
		$this->load->view('alumniStudent');
	}
	public function contactDetail()
	{
		$this->load->view('contactDetail');
	}
	
	
	public function getMobile(){
		$mobile = $this->input->post("mob");
		$rnum = $this->input->post("rnum");
	
		$this->db->where("student_id",$rnum);
		$this->db->where("mobile_number",$mobile);
		$getResult = $this->db->get("result");
	
	
		if($getResult->num_rows()>0){
			echo "<br><br><br>Mobile Number Found";
	
			$rt = $getResult->row();
			if(strlen($rt->otp)<1){
				$otp= rand(6,100000);
				$data=array(
						"otp"=>$otp
				);
				$msg = "Your One time password is ".$otp." for Request Re-evaluation of OMR Sheet.";
				sms($rt->mobile_number,$msg);
				$this->db->where("student_id",$rnum);
				$this->db->where("mobile_number",$mobile);
				$this->db->update("result",$data);
				?><script>
										 $("#otp").show();
										 $("#sub").show();
				</script>
									
									<?php }else{
	echo "<br><br><br><h2>Your Request for OMR sheet Recheck is already submitted.</h2>";
	}
			}
			else{
				
				echo "<br><br><br>Please Enter Valid Roll Number Or  digit Mobile Number";
				
			}
			}
			
			function getCorrection(){
				if($this->uri->segment(3)){
					$this->uri->segment(3);
					$this->db->where("sno",$this->uri->segment(3));
					$rt = $this->db->get("result");
				}else{
			$rnum 	= 	$this->input->post("regnumber");
			$mob 	= 	$this->input->post("mobilenumber");
			$otp 	=	$this->input->post("otp");
				$this->db->where("student_id",$rnum);
				$this->db->where("mobile_number",$mob);
				$this->db->where("otp",$otp);
				$rt = $this->db->get("result");
				}
				if($rt->num_rows()>0){
					$data['rt']=$rt->row();
				$this->load->view("correction",$data);
			}
			else{
				$msg=9;
				redirect("welcome/index/$msg");
			}
			}
			
			
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */