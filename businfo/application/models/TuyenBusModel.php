<?php
class TuyenBusModel extends CI_Model {
	
	var $matuyen   = '';
    var $tentuyen = '';
    var $tramdau    = '';
    var $tramcuoi = '';
    var $tgvanhanh = '';
    var $tggccao = '';
    var $tggcthap = '';
    var $tongchuyen = '';
	
	/**
	 * Constructor
	 */

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	/**
	* Kiem tra cac required fields da duoc truyen vao du chua. Tra ve true neu cac tham so day du
	*
	* @param array $required
	* @param array $data
	* @return bool
	*/
	function _required($required, $data)
	{
    	foreach($required as $field) if(!isset($data[$field])) return false;
    	return true;
	}
	
	/**
	 * Thiet lap cac gia tri defaults cho cac tham so truyen vao
	 * Thuong dung khi insert
	 *
	 * @param array $defaults
	 * @param array $options
	 * @return array
	 */
	function _default($defaults, $options)
	{
		return array_merge($defaults, $options);
	}
	/*
	 * $options cho phep cac tham so duoc truyen vao linh hoat hon
	 * Do do, khong can phai viet nhieu functions co muc dich giong
	 * nhau ma chi khac o cac tham so truyen vao.
	 * Vi du : getTuyenBusById va getTuyenBusByOffset
	 */
	
	/**
	 * Cho phep lay tuyenbus theo id hay offset
	 * 
	 * @param array $options 
	 * Options :
	 * - matuyen (required)
	 * - offset (optional)
	 * - limit (optional)
	 * - sortBy (default = matuyen)
	 * - sortDirection (default = asc)
	 */
	function getTuyenBus($options = array()){
		// default value
		$options = $this->_default(array('sortDirection' => 'asc'), $options);
		
		if (isset($options['matuyen'])) $this->db->where('matuyen', $options['matuyen']);
		
		if (isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if (isset($options['limit']))
			$this->db->limit($options['limit']);
		if(isset($options['sortBy'])) $this->db->order_by($options['sortBy'], $options['sortDirection']);
		else
			$this->db->order_by('matuyen', $options['sortDirection']);
			
		$query = $this->db->get('tuyenbus');
    	if($query->num_rows() == 0) return false;
    	
    	if(isset($options['matuyen'])) // tra ve chi 1 dong 
    	{
    		return $query->row(0);
    	}
    	else // tra ve 1 hay nhieu dong
    	{
    		return $query->result();
    	}
	}
	
	/**
	 * Luu tuyenbus vao csdl theo id
	 * 
	 * @param array $options
	 * Options :
	 * - matuyen (req)
	 * - tentuyen (req)
	 * - tramdau (default = 0)
	 * - tramcuoi (default = 0)
	 * - tgvanhanh (req)
	 * - tggccao (req)
	 * - tggcthap (req)
	 * - tongchuyen (req)
	 */
	function saveTuyenBus($options = array()){
		// checks if required fields are available
		if(!$this->_required(array('matuyen', 'tentuyen', 'tramdau', 'tramcuoi', 'tgvanhanh', 'tggccao', 'tggcthap', 'tongchuyen'), $options)) return false;
		
		// default values
    	$options = $this->_default(array('tramdau' => '0', 'tramcuoi' => '0'), $options);
    	
    	$insertArr = Array('matuyen' ,'tentuyen', 'tramdau', 'tramcuoi', 'tgvanhanh', 'tggccao', 'tggcthap', 'tongchuyen');
		foreach ($insertArr as $key){
			if(isset($options[$key])) $this->db->set($key, $options[$key]);
		}
    	
    	$this->db->insert('tuyenbus');

	    return $this->db->insert_id();
	}
	
	/**
	 * Cap nhat tuyenbus theo id
	 * 
	 * @param array $options
	 * Options :
	 * - matuyen (req)
	 * - tentuyen (req)
	 * - tgvanhanh (req)
	 * - tggccao (req)
	 * - tggcthap (req)
	 * - tongchuyen (req)
	 */
	function updateTuyenBus($options = array()){
		// checks if required fields are available
		if(!$this->_required(array('matuyen', 'tentuyen', 'tgvanhanh', 'tggccao', 'tggcthap', 'tongchuyen'), $options)) return false;
		
		$updateArr = Array('tentuyen', 'tgvanhanh', 'tggccao', 'tggcthap', 'tongchuyen');
		foreach ($updateArr as $key){
			if(isset($options[$key])) $this->db->set($key, $options[$key]);
		}
		
		if(isset($options['matuyen'])) $this->db->where('matuyen', $options['matuyen']);
		
		$this->db->update('tuyenbus');

    	return $this->db->affected_rows();
	}
	
	/**
	 * Xoa tuyenbus theo id
	 * 
	 * @param array $options 
	 * Options :
	 * - matuyen (required)
	 */
	function delTuyenBus($options = array()){
		// checks if required fields are available
		//if(!$this->_required(array('matuyen'), $options)) return false;
		
		$this->db->where('matuyen', $options['matuyen']);
    	$this->db->delete('tuyenbus');
	}
}
?>