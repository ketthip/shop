<?php
class database{
	public $table;
	public $fields = [];
	function table($table){
		$pdo = connect::db();
		$this->table = $table;
		$descs = $pdo->query("DESC ".$this->table)->fetchAll(PDO::FETCH_OBJ);
		foreach($descs as $desc){
			$this->fields[$desc->Field] = "";
		}
	}
	
	function query($statement,$fetchmod = PDO::FETCH_OBJ){
		$pdo = connect::db();
		$row = $pdo->prepare($statement);
		$row->execute();
		return $row->fetchall($fetchmod);
	}
	
	function insert(){
		$pdo = connect::db();
		$insert_field = "";
		$value_field = "";
		foreach($this->fields as $key => $field){
			if($field != ""){
				$insert_field = $insert_field.",".$key;
				$value_field = $value_field."','".$field;
			}
		}
		
		$insert_field = ltrim($insert_field, ",");
		$value_field = "'".ltrim($value_field, "',")."'";
		$sql = "INSERT INTO ".$this->table." (".$insert_field.") VALUES (".$value_field.")";
		$row = $pdo->prepare($sql);
		$row->execute();
	}
	
	function update($col,$id){
		$pdo = connect::db();
		$set_field = "";
		foreach($this->fields as $key => $field){
			if($field != ""){
				$set_field = $set_field.",".$key."='".$field."'";
			}
		}
		$set_field = ltrim($set_field, ",");
		$sql = "UPDATE ".$this->table." SET ".$set_field." WHERE ".$col."=".$id;
		$row = $pdo->prepare($sql);
		$row->execute();
	}
	
	function delete($col,$id){
		$pdo = connect::db();
		$sql = "DELETE FROM ".$this->table." WHERE ".$col."=".$id;
		$row = $pdo->prepare($sql);
		$row->execute();
	}

	
}