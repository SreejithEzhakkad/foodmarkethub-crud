<?php namespace App\Repositories;

interface PropertyContract
{
	public function getProperties();

	public function storeProperty(array $collection);

	public function getProperty(int $id);

	public function updateProperty(array $collection, int $id);

	public function deleteProperty(int $id);

}