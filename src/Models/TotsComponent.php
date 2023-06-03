<?php

namespace Tots\Templates\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $template_id Description for variable
 * @property mixed $title Description for variable
 * @property mixed $slug Description for variable
 * @property mixed $type Description for variable
 * @property mixed $status Description for variable
 * @property mixed $data Description for variable
 * @property mixed $html Description for variable
 * @property mixed $css Description for variable
 * @property mixed $js Description for variable
 * @property mixed $created_at Description for variable
 * @property mixed $updated_at Description for variable

 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="template_id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="slug",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="type",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="status",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="data",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="html",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="css",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="js",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="created_at",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="updated_at",
 *  type="",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class TotsComponent extends Model
{
    protected $table = 'tots_template_component';
    
    protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;

    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function template()
    {
        return $this->belongsTo(TotsTemplate::class, 'template_id');
    }


    
}