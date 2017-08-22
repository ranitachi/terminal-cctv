<?php
/*
List of Functions/Procedures
============================
1. __construct
2. GetFieldsName($table_name)
3. SelectData
4. GetRowNum
5. InsertData($table_name, $data)
6. UpdateData($table_name, $data, $where_cond = NULL)
7. DeleteData($table_name, $where_cond = NULL)
*/

class CRUD extends CI_Model{
	
	function __construct (){
		parent::__construct();
		
		return 1;
	}
	
	function GetFieldsName($table_name){
		return $this->db->field_data($table_name);
	}
	
	function SelectManual( $SQL )
	{
		$query = $this->db->query( $SQL );
		return $query->result();
		//return $this->db->last_query();
	}
	
	function GetRowNumManual( $SQL )
	{
		$query = $this->db->query( $SQL );
		return $query->num_rows();
	}
	
	function SelectData($fields_selected = NULL, 
						$from_table = NULL,
						$join_table = NULL, 
						$and_where_cond = NULL, 
						$or_where_cond = NULL, 
						$and_where_in_cond = NULL, 
						$or_where_in_cond = NULL, 
						$and_where_not_in_cond = NULL, 
						$or_where_not_in_cond = NULL, 
						$and_like_cond = NULL, 
						$or_like_cond = NULL, 
						$and_not_like_cond = NULL, 
						$or_not_like_cond = NULL, 
						$group_by = NULL,
						$and_having_cond = NULL,
						$or_having_cond = NULL,
						$sort = NULL, 
						$order = NULL,
						$offset = 0, 
						$limit = 0){
		
		/* If there's specified fields */
		if(is_null($fields_selected) == false)
			$this->db->select($fields_selected);
			
		/* Get from table */
		if(is_null($from_table) == false)
			$this->db->from($from_table);
			
		/* If there's joins condition */
		for( $i=0; $i < count($join_table); $i++ )
		{
			$tname = $join_table[$i][0];
			$condition = $join_table[$i][1];
			$type = $join_table[$i][2];
			$this->db->join($tname, $condition, $type);
		}
			
		/* If there's "and where" condition */
		if(is_null($and_where_cond) == false)
			$this->db->where($and_where_cond);
			
		/* If there's "or where" condition */
		if(is_null($or_where_cond) == false)
			$this->db->or_where($or_where_cond);
			
		/* If there's "and where in" condition */
		if(is_null($and_where_in_cond) == false)
			$this->db->where_in($and_where_in_cond);
			
		/* If there's "or where in" condition */
		if(is_null($or_where_in_cond) == false)
			$this->db->or_where_in($or_where_in_cond);
			
		/* If there's "and where not in" condition */
		if(is_null($and_where_not_in_cond) == false)
			$this->db->where_not_in($and_where_not_in_cond);
			
		/* If there's "or where not in" condition */
		if(is_null($or_where_not_in_cond) == false)
			$this->db->or_where_not_in($or_where_not_in_cond);
			
		/* If there's "and like" condition */
		if(is_null($and_like_cond) == false)
			$this->db->like($and_like_cond);
			
		/* If there's "or like" condition */
		if(is_null($or_like_cond) == false)
			$this->db->or_like($or_like_cond);
			
		/* If there's "and not like" condition */
		if(is_null($and_not_like_cond) == false)
			$this->db->not_like($and_not_like_cond);
			
		/* If there's "or not like" condition */
		if(is_null($or_not_like_cond) == false)
			$this->db->or_not_like($or_not_like_cond);
			
		/* If there's "group by" condition */
		if(is_null($group_by) == false)
			$this->db->group_by($group_by);
			
		/* If there's "and having" condition */
		if(is_null($and_having_cond) == false)
			$this->db->having($and_having_cond);
			
		/* If there's "or having" condition */
		if(is_null($or_having_cond) == false)
			$this->db->or_having($or_having_cond);
			
		/* If there's sorting condition */
		if(is_null($sort) == false and is_null($order) == false)
			$this->db->order_by($sort, $order);
		
		/* if there's limit condition */
		if( $offset != 0 or $limit != 0 )
			$this->db->limit($limit, $offset);
			
		/* Execute SQL */
		$query = $this->db->get();
		
		/* return result */
		return $query->result();
	}
	
	function GetRowNum($from_table = NULL,
					   $join_table = NULL, 
					   $and_where_cond = NULL, 
					   $or_where_cond = NULL, 
					   $and_where_in_cond = NULL, 
					   $or_where_in_cond = NULL, 
					   $and_where_not_in_cond = NULL, 
					   $or_where_not_in_cond = NULL, 
					   $and_like_cond = NULL, 
					   $or_like_cond = NULL, 
					   $and_not_like_cond = NULL, 
					   $or_not_like_cond = NULL, 
					   $group_by = NULL,
					   $and_having_cond = NULL,
					   $or_having_cond = NULL){
		
		/* Get from table */
		if(is_null($from_table) == false)
			$this->db->from($from_table);
			
		/* If there's joins condition */
		for( $i=0; $i < count($join_table); $i++ )
		{
			$tname = $join_table[$i][0];
			$condition = $join_table[$i][1];
			$type = $join_table[$i][2];
			$this->db->join($tname, $condition, $type);
		}
		
		/* If there's "and where" condition */
		if(is_null($and_where_cond) == false)
			$this->db->where($and_where_cond);
			
		/* If there's "or where" condition */
		if(is_null($or_where_cond) == false)
			$this->db->or_where($or_where_cond);
			
		/* If there's "and where in" condition */
		if(is_null($and_where_in_cond) == false)
			$this->db->where_in($and_where_in_cond);
			
		/* If there's "or where in" condition */
		if(is_null($or_where_in_cond) == false)
			$this->db->or_where_in($or_where_in_cond);
			
		/* If there's "and where not in" condition */
		if(is_null($and_where_not_in_cond) == false)
			$this->db->where_not_in($and_where_not_in_cond);
			
		/* If there's "or where not in" condition */
		if(is_null($or_where_not_in_cond) == false)
			$this->db->or_where_not_in($or_where_not_in_cond);
			
		/* If there's "and like" condition */
		if(is_null($and_like_cond) == false)
			$this->db->like($and_like_cond);
			
		/* If there's "or like" condition */
		if(is_null($or_like_cond) == false)
			$this->db->or_like($or_like_cond);
			
		/* If there's "and not like" condition */
		if(is_null($and_not_like_cond) == false)
			$this->db->not_like($and_not_like_cond);
			
		/* If there's "or not like" condition */
		if(is_null($or_not_like_cond) == false)
			$this->db->or_not_like($or_not_like_cond);
			
		/* If there's "group by" condition */
		if(is_null($group_by) == false)
			$this->db->group_by($group_by);
			
		/* If there's "and having" condition */
		if(is_null($and_having_cond) == false)
			$this->db->having($and_having_cond);
			
		/* If there's "or having" condition */
		if(is_null($or_having_cond) == false)
			$this->db->or_having($or_having_cond);
			
		/* Execute SQL */
		$query = $this->db->get();
		
		/* If there's no row */
		return $query->num_rows();
	}
	
	function InsertData($table_name, $data){
		$this->db->insert($table_name, $data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
		//return $this->db->last_query();
		//return $this->db->insert_id();
	}
	
	function UpdateData($table_name, $data, $where_cond = NULL){
		$this->db->where($where_cond);
		$this->db->update($table_name, $data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
		//return $this->db->last_query();
	}
	
	function DeleteData($table_name, $where_cond = NULL){
		$this->db->where($where_cond);
		$this->db->delete($table_name);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
}
?>