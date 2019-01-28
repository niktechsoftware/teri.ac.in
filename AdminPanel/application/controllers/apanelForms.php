<?php
class ApanelForms extends CI_Controller{
	public function headline(){
		$data = array(
				"title" => $this->input->post("title"),
				"msg" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		if($this->db->insert("heading",$data)){
			redirect("apanel/headline");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function saveHeading(){
		$data = array(
				
				"msg" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		if($this->db->insert("heading",$data)){
			redirect("apanel/latestNews");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deleteHeading(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("heading")){
			redirect("apanel/latestNews");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function tourProgram(){
		$data = array(
				"title" => $this->input->post("title"),
				"program_msg" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		if($this->db->insert("tour_program",$data)){
			redirect("apanel/tourProgram");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deleteTour(){
		$this->db->where("sno",$this->uri->segment(3));
		if($this->db->delete("tour_program")){
			redirect("apanel/tourProgram");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//-------------------------------------------------------------------------------------------------------------------------	
	
	public function inquiry(){
		$name = $this->input->post("name");
		$data = array(
				"name" => $this->input->post("name"),
				"mobile" => $this->input->post("mobile"),
				"email" => $this->input->post("email"),
				"msg" => $this->input->post("msg"),
				"date" => date("Y-m-d")
		);
		if($this->db->insert("inquiry",$data)){
			if($this->input->post("contact") == "contact"):
				redirect("welcome/contact/true/$name");
			else:
				redirect("welcome/index/true/$name");
			endif;
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//-------------------------------------------------------------------------------------------------------------------------	
	public function editProfile(){
	
		$id = $this->input->post('row_id');
	
		$photo_name = time().trim($_FILES['stuImage']['name']);
		$new_img = array(
				"photo"=> $photo_name
		);
		$old_img = $this->input->post("old_stuImg");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
		
		$this->db->where("id",$id);
		$up = $this->db->update("student_info",$new_img);
		
		if($up){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['stuImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('stuImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$this->session->set_userdata("photo",$photo_name);
					$data = array(
						"student_id" => $this->input->post("student_id"),
						"name" => $this->input->post("name"),
						"fName" => $this->input->post("fname"),
						"address" => $this->input->post("address"),
						"city" => $this->input->post("city"),
						"state" => $this->input->post("state"),
						"pin" => $this->input->post("pin"),
						"mobile" => $this->input->post("mobile"),
						"dob" => date("Y-m-d", strtotime($this->input->post("dob"))),
						"heighQ" => $this->input->post("heighQ"),
						"courseApplied" => $this->input->post("courseApplied"),
						"timing" => $this->input->post("timing"),
						"gender" => $this->input->post("gender"),
						"email" => $this->input->post("email"),
						"password" => $this->input->post("password"),
						"total_fee" => $this->input->post("total_fee"),
						"fee_method" => $this->input->post("fee_method"),
						"joinDate" => $dt,
						"joinTime" => date("h:i:s"),
						"isApprove" => $isApprove
								
					);
					$this->db->where("id",$this->input->post("id"));
					if($this->db->update("student_info",$data)){
						redirect("apanel/studentList");
					}
					else{
						echo "Somthing going wrong. Please Contact Site administrator";
					}
				}
			}
		}
	
		
	}
//-----------------------------------------------------------------------------------------------------------------------------
	public function deleteEnquiry(){
		$this->db->where("sno",$this->uri->segment(3));
		if($this->db->delete("enquiry")){
			redirect(base_url()."apanel/enquiryList");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//-------------------------------------------------------------------------------------------------------------------------
	public function editHeadline(){
		$data = array(
				"title" => $this->input->post("title"),
				"notice" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("notice",$data)){
			redirect(base_url()."apanel/noticeBoard");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//-----------------------------------------------------------------------------------------------------------------------------	
	public function noticeBoard(){
		$data = array(
				"title" => $this->input->post("title"),
				"notice" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		if($this->db->insert("notice",$data)){
			redirect(base_url()."apanel/noticeBoard");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
//-----------------------------------------------------------------------------------------------------------------------------
	public function deleteHeadline(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("notice")){
			redirect(base_url()."apanel/noticeBoard");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function letestNews(){
		$data = array(
				"subject" => $this->input->post("title"),
				"message" => $this->input->post("content"),
				"url" => $this->input->post("url")
		);
		if($this->db->insert("latest_news",$data)){
			redirect(base_url()."apanel/latestNews");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function editNews(){
		$data = array(
				"subject" => $this->input->post("title"),
				"message" => $this->input->post("content"),
				"url" => $this->input->post("url")
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("latest_news",$data)){
			redirect(base_url()."apanel/latestNews");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deleteNews(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("latest_news")){
			redirect(base_url()."apanel/latestNews");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	function uploadbooks(){
		$photo_name = time().trim($_FILES['uploadbooks']['name']);
		$data=array(
				'bookName'=>$this->input->post("title"),
				'subject'=>$this->input->post("subject"),
				'photo'=>$photo_name
		);
		$query = $this->db->insert("upload_books",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['uploadbooks']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('uploadbooks');
			redirect(base_url()."apanel/uploadbooks/23");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	function uploadpdf(){
		$photo_name = time().trim($_FILES['uploadbooks']['name']);
		$data=array(
				'pdfName'=>$this->input->post("title"),
				'filename'=>$photo_name
		);
		$query = $this->db->insert("upload_pdf",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/pdffile');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
			$config['max_size'] = '10024';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['uploadbooks']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('uploadbooks');
			redirect(base_url()."apanel/uploadpdf/23");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	
	
	function saveSelectedStu(){
		$photo_name = time().trim($_FILES['selectedStu']['name']);
		$data=array(
				'studentName'=>$this->input->post("title"),
				'department'=>$this->input->post("department"),
				'photo'=>$photo_name
		);
		$query = $this->db->insert("selected_stu",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('selectedStu');
			redirect(base_url()."apanel/selectedStudent/23");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	
	function saveGallery(){
		$photo_name = time().trim($_FILES['selectedStu']['name']);
		$data=array(
				'name'=>$this->input->post("title"),
				'image'=>$photo_name,
				'date'=>date("Y-m-d")
		);
		$query = $this->db->insert("gallery",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('selectedStu');
			redirect(base_url()."apanel/gallery/23");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deleteGallery(){
		$this->db->where("sno",$this->uri->segment(3));
		 $image = $this->uri->segment(4);
		@chmod("assets/images/" . $image, 0777);
		@unlink("assets/images/" . $image);
		
		if($this->db->delete("gallery")){
			redirect(base_url()."apanel/gallery");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	function saveproduct(){
		$photo_name = time().trim($_FILES['selectedStu']['name']);
		$data=array(
				'name'=>$this->input->post("title"),
				'date'=>date("Y-m-d"),
				'image'=>$photo_name,
				'desc'=>$this->input->post("content"),
				
		);
		$query = $this->db->insert("product",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/product/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('selectedStu');
			redirect(base_url()."apanel/product/23");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deleteproduct(){
		$this->db->where("sno",$this->uri->segment(3));
		$image = $this->uri->segment(4);
		@chmod("assets/images/product/" . $image, 0777);
		@unlink("assets/images/product/" . $image);
	
		if($this->db->delete("product")){
			redirect(base_url()."apanel/product");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deletequick(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("inquiry")){
			redirect(base_url()."apanel/quickContact");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteBooks(){
		$this->db->where("SNo",$this->uri->segment(3));
		if($this->db->delete("upload_books")){
			redirect(base_url()."apanel/uploadbooks");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteStudents(){
		$this->db->where("sno",$this->uri->segment(3));
		if($this->db->delete("selected_stu")){
			redirect(base_url()."apanel/selectedStudent");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	function getFeeDetails(){
		$type=$this->input->post("detailType");
		$sdt=$this->input->post("sdt");
		$edt=$this->input->post("edt");
		$a = mysql_query("select student_id,paid_date,$type as stufee from fee where paid_date >= '".date("Y-m-d", strtotime($sdt))."' AND paid_date <= '".date("Y-m-d", strtotime($edt))."'");
		
			?><table class="display table" style="width: 100%; cellspacing: 0;">
  <tr>
  <th>SNO</th>
    <th>Student Id</th>
     <th>student Name</th>
     <th><?php echo $type; ?> Fee</th>
    <th>Paid Date</th>
  </tr>
  <?php $i=1; while($row = mysql_fetch_object($a)){ ?>
  <tr>
  <?php if($row->stufee >0){?>
    <td><?php echo $i;?></td>
    <td><?php echo $row->student_id;?></td>
    <td>
    	 <?php 
    	 	$this->db->where("student_id",$row->student_id);
    		$name=$this->db->get("student_info")->row();
    	?>
    	<?php echo $name->name;?>
    </td>
    <td><?php echo $row->stufee;?></td>
     <td><?php echo $row->paid_date;?></td>
  </tr>
  <?php $i++;}}?>
</table>
<?php 
		
		
		
		
		
		
		
	}
}