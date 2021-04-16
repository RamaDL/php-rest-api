<?php
namespace App\Models;

interface ModelInterface{
	public function all();
	
	public function find($id);

	public function create();

	public function update();

	public function delete($id);
}