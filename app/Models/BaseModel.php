<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel.
 */
class BaseModel extends Model
{
    /**
     * Get Table name.
     *
     * @return string
     */
    public static function getTblName()
    {
        return (new static())->getTable();
    }

    /**
     * Get column name with alias table.
     *
     * @param $column
     *
     * @return string
     */
    public static function getColName($column)
    {
        return self::getTblName().'.'.$column;
    }
}
