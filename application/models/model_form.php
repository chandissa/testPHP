<?php
class Model_form extends CI_Model{

function test_main(){
	echo "This is the model";
}

function insert_data($data){
	$this->db->insert("data_table",$data);

}

function fetch_data(){
	$query = $this->db->get("data_table");
	return $query;

}
function delete_data($id){
	$this->db->where("id" , $id);
	$this->db->delete("data_table");
	
}

} 
?>