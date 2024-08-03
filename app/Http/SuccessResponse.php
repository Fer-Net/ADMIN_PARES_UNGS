<?php

namespace App\Http;


use Illuminate\Contracts\Support\Responsable;

class SuccessResponse implements Responsable
{
    /**
     * @var
     */
    protected $name;
    /**
     * @var
     */
    public $success;

    /**
     * @var mixed
     */
    public $data;

    /**
     * SuccessResponse constructor.
     * @param $name
     * @param $data
     */
    public function __construct($name, $data = null)
    {
        $this->name    = $name;
        $this->data    = $data;
        $this->success = true;
    }

    
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return response()->json([
            'success' => true,
            'message' => $this->name ?? '',
            'data'    => $this->data ?? [],
        ]);
    }
}
