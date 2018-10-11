<?php
/**
 * rio-sgps
 * Equipment.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2018
 *
 * @author Aryel Tupinamba <aryel.tupinamba@lqdi.net>
 *
 * Created at: 11/10/2018, 17:28
 */

namespace SGPS\Entity;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SGPS\Traits\IndexedByUUID;

/**
 * Class Equipment
 * @package SGPS\Entity
 *
 * @property string $id
 * @property string $type
 * @property string $code
 * @property string $name
 * @property string $address
 *
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 *
 * @property Sector[]|Collection $sectors
 */
class Equipment extends Model {

	use IndexedByUUID;
	use SoftDeletes;

	const TYPE_CRE = "CRE";
	const TYPE_CRAS = "CRAS";
	const TYPE_SMS = "SMS";

	const TYPES = [self::TYPE_CRE, self::TYPE_CRAS, self::TYPE_SMS];

	protected $table = 'equipments';
	protected $fillable = [
		'type',
		'code',
		'name',
		'address',
	];

	public function sectors() {
		return $this->belongsToMany(Sector::class, 'sector_equipments');
	}

}