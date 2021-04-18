<?php
namespace App\Gateways;

interface GatewayInterface{
	public function all();
	
	public function find($id);

	public function create($data);

	public function update($id, $input);

	public function delete($id);
}