<?php namespace App\Repositories;

use App\Models\Property;
use App\Repositories\PropertyContract;

class PropertyRepository implements PropertyContract
{
	/** 
     * Get all properties. 
     * @return  \App\Models\Property 
     */
	public function getProperties()
	{
		return Property::with(['owners.phones'])->get();
	}

	/** 
     * Store a property. 
     * @param  array  $collection 
     * @return  \App\Models\Property 
     */
	public function storeProperty($collection)
	{
		$property = new Property;
        $property->house_name_number = $collection['house_name_number'];
        $property->postcode = $collection['postcode'];
        $property->save();
        
		foreach($collection['owners'] as $owner){
			$property->owners()->attach($owner['user_id'],['main_owner' => $owner['main_owner']]);
		}
        return $property;
	}

	/** 
     * Get a property. 
     * @param  int  $id 
     * @return  \App\Models\Property 
     */
	public function getProperty($id)
	{
		return Property::with(['owners.phones'])->findOrFail($id);
	}

	/** 
     * Update a property. 
     * @param  array  $collection
	 * @param  int  $id 
     * @return  \App\Models\Property 
     */
	public function updateProperty($collection, $id)
	{
		$property = Property::findOrFail($id);
        $property->house_name_number = $collection['house_name_number'];
        $property->postcode = $collection['postcode'];
        $property->save();
        
		$property->owners()->detach();
		foreach($collection['owners'] as $owner){
			$property->owners()->attach($owner['user_id'],['main_owner' => $owner['main_owner']]);
		}
        return $property;
	}

	/** 
     * Delete a property. 
     * @param  int  $id 
     * @return  \App\Models\Property 
     */  
	public function deleteProperty($id)
	{
		$property = Property::findOrFail($id);
		$property->owners()->detach();
		return $property->delete();
	}
}