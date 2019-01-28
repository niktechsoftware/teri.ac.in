<?php
class formController extends CI_Controller{
	
	public function saveAlumni(){
		
		$i = false;
		$photo_name = time().trim($_FILES['stuImage']['name']);
		$this->load->library('upload');
		// Set configuration array for uploaded photo.
		$image_path = realpath(APPPATH . '../assets/alumni/');
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '600';
		$config['file_name'] = $photo_name;
		// Upload first photo and create a thumbnail of it.
		if (!empty($_FILES['stuImage']['name'])) {
			$this->upload->initialize($config);
			if ($this->upload->do_upload('stuImage')) {
				// ---------------------------------- Redirect Success Page ----------------------
				$i = true;
			}
			else{
				echo $this->upload->display_errors();
			}
		} 
		
		if($i){
			
			$data['name'] = $this->input->post("preName").' '.$this->input->post("firstName").' '. $this->input->post('lastName');
			$data['company_name']  = $this->input->post("companyName");
			$data['email']  = $this->input->post("email");
			$data['mobile']  = $this->input->post("mobile");
			$data['course']  = $this->input->post("course");
			$data['passout']  = $this->input->post("passoutYear");
			$data['comments']  =$this->input->post("experience");
			$data['image']  = $photo_name;
			$data['date']  =  date("Y-m-d H:i:s");
			$data['status']  = "Pending";
			
				
		}
		if($this->db->insert("alumni",$data)){
			redirect("welcome/index/");
		}
		else{
			redirect("index.php/login/index/noteFalse");
		}
	}
	
	
	public function stdregistration(){
	
	
				
			$data['name'] = $this->input->post("preName").' '.$this->input->post("firstName").' '. $this->input->post('lastName');
			$data['father_name']  = $this->input->post("father_preName").' '.$this->input->post("father_firstName").' '. $this->input->post('father_lastName');
			$data['father_mobile_no']  = $this->input->post("father_mobile_no");
			$data['course']  = $this->input->post("course");
			$data['mobile_no']  = $this->input->post("mobile_no");
			$data['otp']  = $this->input->post("otp");
			
			$data['date']  =  date("Y-m-d H:i:s");
			$data['approve']  = "Pending";
				
	
	
		if($this->db->insert("student_registration",$data)){
			redirect("welcome/index/");
		}
		else{
			redirect("index.php/login/index/noteFalse");
		}
	}
	
}