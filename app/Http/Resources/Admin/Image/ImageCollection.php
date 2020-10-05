<?php



namespace App\Http\Resources\Admin\Image;



use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Resources\Admin\Image\ImageResource;

class ImageCollection extends ResourceCollection

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

            'data' => ImageResource::collection($this->collection),

            'recordsTotal' => $this->total(),

            'recordsFiltered' => $this->total(),

            'length' => $this->perPage(),

        ];

    }

}

