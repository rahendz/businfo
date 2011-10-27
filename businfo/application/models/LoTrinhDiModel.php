<?php
class LoTrinhDiModel extends CI_Model {
  /**
   * Constructor
   */
  	var $lotrinhdi_id   = '';
    var $matuyen = '';
    var $stttram    = '';
    var $matram = '';

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
   * Cho phep lay lotrinh theo id, theo tuyen hay offset
   * 
   * @param array $options 
   * Options :
   * - lotrinhdi_id (required)
   * - matuyen (optional)
   * - matram (optional)
   * - offset (optional)
   * - limit (optional)
   * - sortBy (default = matram)
   * - sortDirection (default = asc)
   */
  function getLoTrinh($options = array()){
    // default value
      $options = $this->_default(array('sortDirection' => 'asc'), $options);
    
    if (isset($options['matram'])) $this->db->where('matram', $options['matram']);
    if (isset($options['matuyen'])) $this->db->where('matuyen', $options['matuyen']);
    if (isset($options['limit']) && isset($options['offset']))
      $this->db->limit($options['limit'], $options['offset']);
    else if (isset($options['limit']))
      $this->db->limit($options['limit']);
    if(isset($options['sortBy'])) $this->db->order_by($options['sortBy'], $options['sortDirection']);
    else
      $this->db->order_by('stttram', $options['sortDirection']);
      
    $query = $this->db->get('lotrinhdi');
      if($query->num_rows() == 0) return false;
      
      if(isset($options['matram']) && isset($options['matuyen'])) // tra ve chi 1 dong 
      {
        return $query->row(0);
      }
      else // tra ve 1 hay nhieu dong
      {
        return $query->result();
      }
  }
  
  /**
   * Luu lotrinh vao csdl theo id
   * 
   * @param array $options
   */
  function saveLoTrinh($options = array()){
    // checks if required fields are available
    if(!$this->_required(array('lotrinhdi_id', 'matram', 'sttram', 'matram'), $options)) return false;
      
    $insertArr = Array('lotrinhdi_id', 'matram' ,'stttram', 'matram');
    foreach ($insertArr as $key){
      if(isset($options[$key])) $this->db->set($key, $options[$key]);
    }
      
    $this->db->insert('lotrinhdi');

    return $this->db->insert_id();
  }
  
  /**
   * Cap nhat lotrinh theo id
   * 
   * @param array $options
   * Options :
   * - lotrinhdi_id (req)
   * - matuyen (req)
   * - stttram (req)
   * - matram (req)
   */
  function updateLoTrinh($options = array()){
    // checks if required fields are available
    if(!$this->_required(array('lotrinhdi_id', 'matram', 'sttram', 'matram'), $options)) return false;
    
    $updateArr = Array('matram', 'stttram', 'matram');
    foreach ($updateArr as $key){
      if(isset($options[$key])) $this->db->set($key, $options[$key]);
    }
    
    if(isset($options['lotrinhdi_id'])) $this->db->where('lotrinhdi_id', $options['lotrinhdi_id']);
    
    $this->db->update('lotrinhdi');

    return $this->db->affected_rows();
  }
  
  /**
   * Xoa lotrinh theo id
   * 
   * @param array $options 
   * Options :
   * - matuyen (required)
   */
  function delLoTrinh($options = array()){
    // checks if required fields are available
    //if(!$this->_required(array('matuyen'), $options)) return false;
    
    $this->db->where('lotrinhdi_id', $options['lotrinhdi_id']);
      $this->db->delete('lotrinhdi');
  }
}
?>