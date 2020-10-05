<?php



namespace App\Http\Resources\Admin\Backlog;



use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Resources\Admin\Backlog\BacklogResource;

class BacklogCollection extends ResourceCollection

{

    /**

     * Transform the resource collection into an array.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return array

     */

    public function toArray($request)

    {

        return [

            'data' => BacklogResource::collection($this->collection),

            'recordsTotal' => $this->total(),

            'recordsFiltered' => $this->total(),

            'length' => $this->perPage(),

        ];

    }

}

