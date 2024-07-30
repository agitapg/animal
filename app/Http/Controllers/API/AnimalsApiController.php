<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Animals;
use Validator;
use App\Http\Resources\AnimalsResource;
use Illuminate\Http\JsonResponse;

class AnimalsApiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $animals = Animals::all();
    
        return $this->sendResponse(AnimalsResource::collection($animals), 'Animals retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'type' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $animals = Animals::create($input);
   
        return $this->sendResponse(new AnimalsResource($animals), 'Animal created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $animal = Animals::find($id);
  
        if (is_null($animal)) {
            return $this->sendError('animal not found.');
        }
   
        return $this->sendResponse(new AnimalsResource($animal), 'Animal retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animals $animal): JsonResponse
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'type' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $animal->name = $input['name'];
        $animal->type = $input['type'];
        $animal->save();
   
        return $this->sendResponse(new AnimalsResource($animal), 'Animal updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $animal): JsonResponse
    {
        $animal->delete();
   
        return $this->sendResponse([], 'Animal deleted successfully.');
    }
}
