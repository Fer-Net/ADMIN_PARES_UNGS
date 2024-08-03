<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\SuccessResponse;
use App\Models\Provider;
use Illuminate\Support\Facades\Storage;

class ProvidersController
{
    /**
     * @desc Get all producers
     * @param $request Request
     * @return JsonResponse
     */
    public function getList(Request $request)
    {
        try {
            $providers = Provider::all();
            return new SuccessResponse('Providers', $providers);
        } catch (Exception $e) {

        }
    }

    /**
     * @desc SoftDelete ELement
     * @param int $producerID
     * @return API Response with data
     */
    public function postDelete($providerID)
    {
        try {

            $data = Provider::find($providerID);

            
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
            
            $data = $request->all();
          
            $provider = new Provider();
            $provider->name = $data['newNameProvider'];
            $provider->description = $data['newDescription'];
            $provider->code = $data['newCode'];
            $provider->url_cancel_subscription = $data['newUrlCancelation'];
            $provider->active = isset($data['checkboxActive']) ? 1 : 0;
            $provider->url = $data['newUrl'];
            $provider->order = 100;
           
            if (isset($data['image']) && $request->file('image')) {
                $extWebp = $request->file('image')->getClientOriginalExtension();
                $nameWebp =  pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                $nameWebp = preg_replace('([^A-Za-z0-9])', '', $nameWebp);
                $nameWebp = time() . "_" . $nameWebp;
                $nameWebp = substr($nameWebp, 0, 45);
                $nameImageWebp = $nameWebp .".". $extWebp;
                Storage::disk('s3-images')->putFileAs(env('BUCKET_ENDPOINT').'/storage/providers/',$request->file('image'),$nameImageWebp);
                $provider->image = $nameImageWebp;
            }
           
            
           ($data['country'] != '0') ? $provider->country_id = (integer) $data['country']: NULL;
           
           $provider->save();

           if(isset($data['checkboxContent'])) {
            
            if(!isset($data['categories']))
                    {
                        throw new Exception('Agregue categorias', 12);
                    }
                    
                    if(!isset($data['plays']))
                    {
                        throw new Exception('Agregue obras', 12);
                    }

            $provider->limited_category = 1;

            $provider->plays()->sync($data['plays']);
            $provider->plays()->updateExistingPivot($data['plays'], ['status' => 1]);

            $provider->categories()->sync($data['categories']);

           $provider->save();
           }


            return new SuccessResponse('Se guardo ok');
        } catch (Exception $e) {
            //return ModelResponse::withException($e);
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
                $provider->name = $data['editNameProvider'];
                $provider->description = $data['editDescription'];
                $provider->code = $data['editCode'];
                $provider->url_cancel_subscription = $data['editUrlCancelation'];
                $provider->country_id = (integer) $data['editCountry'];
                $provider->url = $data['editUrl'];
                $provider->active = isset($data['checkboxActive']) ? 1 : 0;

                if (isset($data['image']) && $request->file('image')) {
                    $extWebp = $request->file('image')->getClientOriginalExtension();
                    $nameWebp =  pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $nameWebp = preg_replace('([^A-Za-z0-9])', '', $nameWebp);
                    $nameWebp = time() . "_" . $nameWebp;
                    $nameWebp = substr($nameWebp, 0, 45);
                    $nameImageWebp = $nameWebp .".". $extWebp;
                    Storage::disk('s3-images')->putFileAs(env('BUCKET_ENDPOINT').'/storage/providers/',$request->file('image'),$nameImageWebp);
                    $provider->image = $nameImageWebp;
                }

                
                
                if(isset($data['checkboxContent'])) {
                

                    if(!isset($data['categories']))
                    {
                        throw new Exception('Agregue categorias', 12);
                    }
                    
                    if(!isset($data['plays']))
                    {
                        throw new Exception('Agregue obras', 12);
                    }

                    $provider->limited_category = 1;
                    $provider->plays()->sync($data['plays']);

                    $provider->plays()->wherePivot('status', null)->updateExistingPivot($data['plays'], ['status' => 1]);

                    $provider->categories()->sync($data['categories']);

                $provider->save();
                }else{
                    $provider->limited_category = 0;
                    $provider->plays()->detach();
                    $provider->categories()->detach();
                    
           }
                $provider->save();
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
