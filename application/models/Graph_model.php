<?php

/* Model for getting and displaying bill data
** @author Qiu Yunhan
** @reviewer Daryl Lim
*/

class Graph_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
		$CI = &get_instance();
		$this->billdb = $CI->load->database('billdb', TRUE);
	}

	/* Retrieves all bill data matching user logged in, or specific bill details
	** @author Qiu Yunhan
	** @Output: Array of SQL items
	*/
	public function get_graphdata($billID = FALSE)
	{
		// If no specific bill specified
		if ($billID === FALSE)
		{
			$query = $this->billdb->get_where('bills', array('userID' => $this->session->userdata('userID')));	
			return $query->result_array();
		}
		else
		{
			// If specific bill specified
			$query = $this->billdb->get_where('bills', array('billID' => $billID));
			return $query->row_array();
		}	
    }
	
	/* Retrieves distinct billOrgs matching user logged in, and sums by billOrg.
	** @author Qiu Yunhan, Daryl Lim (SQL)
	** @Output: Array of SQL items
	*/
	public function get_billOrgs()
	{    
		$query = $this->billdb->query("SELECT billOrg, SUM(totalAmt) as sum FROM billdb.bills WHERE userID ='".$this->session->userdata("userID")."'GROUP BY billOrg");
		return $query->result_array();
	}

	/* Retrieves distinct months matching billorg provided, for logged in user
	** @author Qiu Yunhan, Daryl Lim (SQL)
	** @parameter: Billing organisation to sum
	** @Output: Array of SQL items
	*/	
	public function get_billOrgMonths($billOrg)
	{
		$query = $this->billdb->query("SELECT billOrg, MONTHNAME(billDueDate) as month, SUM(totalAmt) as sum FROM billdb.bills WHERE userID ='".$this->session->userdata("userID")."' AND billOrg = '".$billOrg."' GROUP BY MONTHNAME(billDueDate)");
		
		return $query->result_array();
	}
}