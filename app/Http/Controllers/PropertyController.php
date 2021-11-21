<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AnswerRepository;
use App\Repositories\PropertyRepository;

class PropertyController extends Controller
{
    /**
     * The property repository instance.
     */
    protected $property;

    /**
     * The answer repository instance.
     */
    protected $answer;

    /**
     * Create a new Property Controller instance.
     *
     * @return void
     */
    public function __construct(PropertyRepository $property, AnswerRepository $answer)
    {
        $this->property = $property;
        $this->answer = $answer;
    }

    /** 
     * Get a list of all properties
     * @return \Illuminate\Http\Response 
     */  
    public function index()  
    {  
        $this->answer->data = $this->property->getProperties();
        $this->answer->message = 'Success';
        $this->answer->success = true;
        return $this->answer->getAnswer();
    }  

    
    /** 
     * Store a new property. 
     * 
     * @param  \Illuminate\Http\Request   $request 
     * @return \Illuminate\Http\Response 
     */  
    public function store(Request $request)  
    {  
        $this->answer->data = $this->property->storeProperty($request->all());
        $this->answer->message = 'Success';
        $this->answer->success = true;
        return $this->answer->getAnswer();
    }
    
    /** 
     * Update a property. 
     * 
     * @param  \Illuminate\Http\Request   $request 
     * @param  int   $id
     * @return \Illuminate\Http\Response 
     */
    public function update(Request $request, $id)  
    {  
        $this->answer->data = $this->property->updateProperty($request->all(), $id);
        $this->answer->message = 'Success';
        $this->answer->success = true;
        return $this->answer->getAnswer();
    }

    /** 
     * Get a property
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */  
    public function show($id)  
    {  
        $this->answer->data = $this->property->getProperty($id);
        $this->answer->message = 'Success';
        $this->answer->success = true;
        return $this->answer->getAnswer();
    }  
 
    /** 
     * Delete the property. 
     * @param  int  $id 
     * @return  \Illuminate\Http\Response 
     */  
    public function destroy($id)  
    {
        $this->answer->data = $this->property->deleteProperty($id);
        $this->answer->message = $this->answer->data ? 'Property has been deleted successfully': 
            'Property can\'t be deleted. Please try after some time.';
        $this->answer->success = true;
        return $this->answer->getAnswer();
    }
}
