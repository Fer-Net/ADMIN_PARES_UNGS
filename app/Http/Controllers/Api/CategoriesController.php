<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\SuccessResponse;
use App\Models\Provider;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoriesController
{
    /**
     * @desc Get all producers
     * @param $request Request
     * @return JsonResponse
     */
    public function getList(Request $request)
    {   
        try {
            $categories = Category::all();
          
            return new SuccessResponse('categories', $categories);
        } catch (Exception $e) {

        }
    }

    /**
     * @desc SoftDelete ELement
     * @param int $producerID
     * @return API Response with data
     */
    public function postDelete($categoryID)
    {
        try {

            $data = Provider::find($categoryID);

            
            if (null === $data) {
                throw new Exception("El elemento no existe", 1);
            }

            $data->delete();

            return new SuccessResponse('Elemento deleted', $data);
        } catch (Exception $e) {
            //return ModelResponse::withException($e);
        }
    }

    /**
     * @desc Create element in DB
     * @param $request Request
     * @return API Response with data
     */
    public function postCreate(Request $request)
    {
        try {
            // Validación de los datos
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
    
            // Si deseas ver los datos recibidos
            // dd($validatedData);
    
            // Crear el proveedor
            $category = Category::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);
    
            return new SuccessResponse('Se guardo ok', $category);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    /**
     * @desc Edit element in DB
     * @param $request Request
     * @return JsonResponse
     */
    public function postEdit(Request $request,$ID)
    {
        try {
                $data = $request->all();
              
                $provider = Provider::find($ID);

                // Update the provider's fields
                $provider->update([
                    'name' => $data['name'],
                    'description' => $data['description'],
                ]);
                    return new SuccessResponse('Proveedor editado');
        } catch (Exception $e) {
           // return ModelResponse::withException($e);
        }
    }
    public function postOrder(Request $request)
    {
        try {
        
            foreach ($request->get('order') as $order => $collection) {
            Provider::where('id', $collection['id'])->update(['order' => $order]);
            }
            return new SuccessResponse('Providers order');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
        }
    }
}
