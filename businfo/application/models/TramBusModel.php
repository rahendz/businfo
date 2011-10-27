<?php
class TramBusModel extends CI_Model {
	/**
	 * Constructor
	 */
	var $matram   = '';
    var $tentram = '';
    var $tuyendiqua    = '';
    var $geo_lat = '';
    var $geo_long = '';

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
	
	/**
	 * Cho phep lay trambus theo id, theo tuyen hay offset
	 * 
	 * @param array $options 
	 * Options :
	 * - matram (optional)
	 * - tuyendiqua (optional)
	 * - offset (optional)
	 * - limit (optional)
	 * - sortBy (default = matram)
	 * - sortDirection (default = asc)
	 */
	function getTramBus($options = array()){
		// default value
    	$options = $this->_default(array('sortDirection' => 'asc'), $options);
		
		if (isset($options['matram'])) $this->db->where('matram', $options['matram']);
		if (isset($options['tuyendiqua'])) $this->db->like('tuyendiqua', $options['tuyendiqua']);
		if (isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if (isset($options['limit']))
			$this->db->limit($options['limit']);
		if(isset($options['sortBy'])) $this->db->order_by($options['sortBy'], $options['sortDirection']);
		else
			$this->db->order_by('matram', $options['sortDirection']);
			
		$query = $this->db->get('trambus');
    	if($query->num_rows() == 0) return false;
    	
    	if(isset($options['matram'])) // tra ve chi 1 dong 
    	{
    		return $query->row(0);
    	}
    	else // tra ve 1 hay nhieu dong
    	{
    		return $query->result();
    	}
	}
	
	/**
	 * Luu trambus vao csdl theo id
	 * 
	 * @param array $options
	 * Options :
	 * - matuyen (req)
	 * - tentuyen (req)
	 * - tuyendiqua (default = 0)
	 * - geo_lat (req)
	 * - geo_long (req)
	 */
	function saveTramBus($options = array()){
		// checks if required fields are available
		if(!$this->_required(array('matram', 'tentram', 'tuyendiqua', 'geo_lat', 'geo_long'), $options)) return false;
		
		// default values
    	$options = $this->_default(array('tuyendiqua' => '0'), $options);
    	
    	$insertArr = Array('matram' ,'tentram', 'tuyendiqua', 'geo_lat', 'geo_long');
		foreach ($insertArr as $key){
			if(isset($options[$key])) $this->db->set($key, $options[$key]);
		}
    	
    	$this->db->insert('trambus');

	    return $this->db->insert_id();
	}
	
	/**
	 * Cap nhat trambus theo id
	 * 
	 * @param array $options
	 * Options :
	 * - matuyen (req)
	 * - tentuyen (req)
	 * - tuyendiqua (req)
	 * - geo_lat (req)
	 * - geo_long (req)
	 */
	function updateTramBus($options = array()){
		// checks if required fields are available
		if(!$this->_required(array('matram', 'tentram', 'tuyendiqua', 'geo_lat', 'geo_long'), $options)) return false;
		
		$insertArr = Array('tentram', 'tuyendiqua', 'geo_lat', 'geo_long');
		foreach ($insertArr as $key){
			if(isset($options[$key])) $this->db->set($key, $options[$key]);
		}
		
		if(isset($options['matram'])) $this->db->where('matram', $options['matram']);
		
		$this->db->update('trambus');

    	return $this->db->affected_rows();
	}
	
	/**
	 * Xoa trambus theo id
	 * 
	 * @param array $options 
	 * Options :
	 * - matuyen (required)
	 */
	function delTramBus($options = array()){
		// checks if required fields are available
		//if(!$this->_required(array('matuyen'), $options)) return false;
		
		$this->db->where('matram', $options['matram']);
    	$this->db->delete('trambus');
	}
}
?>