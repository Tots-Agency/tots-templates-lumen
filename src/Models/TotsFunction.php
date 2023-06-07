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
 * @property mixed $data Description for variable

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
 *  property="data",
 *  type="",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class TotsFunction extends Model
{
    const TYPE_LAST_ROWS_IN_DATABASE = 1;

    protected $table = 'tots_function';
    
    protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;    
}