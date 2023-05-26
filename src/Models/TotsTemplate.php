<?php

namespace Tots\Templates\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $title Description for variable
 * @property mixed $slug Description for variable
 * @property mixed $type Description for variable
 * @property mixed $status Description for variable
 * @property mixed $css_global Description for variable
 * @property mixed $js_global Description for variable
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
 *  property="css_global",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="js_global",
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
class TotsTemplate extends Model
{
    protected $table = 'tots_template';
    
    //protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;    
}