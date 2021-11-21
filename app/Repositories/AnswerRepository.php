<?php namespace App\Repositories;

use App\Models\Property;
use App\Repositories\AnswerContract;

class AnswerRepository implements AnswerContract
{
	public $data;
	public $message;
	public $success;

	/**
	 * Get Answer
	 * @return array 
	 */
	public function getAnswer()
	{
		
		return ['data' => $this->data, 'message' => $this->message, 'success' => $this->success];
	}
}