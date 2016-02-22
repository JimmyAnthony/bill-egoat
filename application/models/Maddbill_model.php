<?php
class Maddbill_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
		$CI = &get_instance();
		$this->billdb = $CI->load->database('billdb', TRUE);
	}
	
	public function insert_bills_table($imageName)
	
	{	
		if ($this->input->post('totalAmt')==NULL){
			$amt=0;
		}else{
			$amt= $this->input->post('totalAmt');
		}
		
		if ($imageName==NULL){
			$file=NULL;
		}else{
			$file="images/".$imageName;
		}
		
		$data = array(
			'billFilePath' => $file,
			'submittedTimestamp' => date("Y-m-d h:m:s",time()),
			'revisionNo' => 1,
			'templateID' => 1,
			'billSentDate' => $this->input->post('billSentDate'),
			'billDueDate' => $this->input->post('billDueDate'),
			'totalAmt' => $amt,
			'billIsComplete' => FALSE,
			'billIsVerified' => TRUE,
			'billIsCopy' => FALSE,
			'billCompleteDateTime' => NULL,	
		);

		$this->billdb->insert('bills', $data);
		return $id = $this->db->insert_id();
	}
    
    public function update_bills_table($billID) 
    {
        $data = array(
            'billSentDate' => $this->input->post('billSentDate'),
			'billDueDate' => $this->input->post('billDueDate'),
			'totalAmt' => $this->input->post('amt'),
        );
            
        $this->billdb->where('billID',$billID);
        return $this->billdb->update('bills',$data);
        
    }
	
	public function insert_bill_amts_table()
	
	{	
		$data = array(
			'billID' => 1,
			'amtLabel' => $this->input->post('amtLabel'),
			'amt' => $this->input->post('amt'),
			'currency' => 'SGD',
		);

		return $this->billdb->insert('billAmts', $data);	
	}
	
	public function insert_bill_tags_table()
	
	{	
		$data = array(
			'billID' => 1,
			'tagName' => $this->input->post('tagName'),
		);
		
		return $this->billdb->insert('billTags', $data);
		
	}
		
	public function upload()
	{
  if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
	  $tmp = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($tmp));
      
      
      if($file_size > 2097152) {
         $errors[]='File size must be less than 2 MB';
      }
      
      if((empty($errors)==true)&&(($_FILES['image']['name'])!=NULL)) {
		 $uniqueName = uniqid().".".$file_ext;
         move_uploaded_file($file_tmp, "images/".$uniqueName);  
		return $uniqueName;
      }else{
		  return NULL;
      }
   }
	
	}
	
}