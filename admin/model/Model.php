<?php

class Model
{

    /**
     *Table name and primary table
     */
    protected static $tableName = '';
    protected static $primaryKey = '';
    protected static $columnName = '';


    /**
     * Function common to get query
     * return String query
     */
    protected static function actionSelect($action = null, $optionSelect = null, $condition = null)
    {
        $db = Database::getInstance();
        $query = "select " . $optionSelect . " from " . static::$tableName;
        switch ($action) {
            case 'sort':
                $query .= " order by ";
                break;
            case 'where':
                $query .= " where ";
                break;
        }
        $query .= $condition;
        return $query;
    }


    /**
     * Sort item
     */
    protected static function sort($item, $typesort, $limit)
    {
        $db = Database::getInstance();
        $condition = " " . $item . " " . $typesort . " " . $limit;
        $query = self::actionSelect('sort', '*', $condition);
        $result = $db->query($query);
        return $result->fetchAll();
    }

    /**
     * Search and sort
     */
    protected static function searchSort($item, $typesort, $limit, $string = null, $column = array())
    {
        if (!empty($string)) {
            $data = array();
            $data = explode(' ', $string);
            $db = Database::getInstance();
            $query = self::actionSelect('where', '*', '');
            foreach ($data as $key => $value) {
                foreach ($column as $k => $v) {
                    $query .= $v . " like '%" . $value . "%' or " . $v . " like '%" . $value . "%' or ";
                }
            }
            $query = rtrim($query, ' or');
            $query .= " order by " . $item . " " . $typesort . " " . $limit;
            $s = $db->prepare($query);
            $s->execute();
            $dataResult = array();
            $dataResult['result'] = $s->fetchAll();
            $dataResult['count'] = $s->rowCount();

            return $dataResult;
        }
    }

    /**
     * Count all record in table
     */
    protected static function countRecord()
    {
        $db = Database::getInstance();
        $option = "count(" . static::$primaryKey . ")";
        $query = self::actionSelect('', $option, '');
        $s = $db->query($query);
        $result = $s->fetchColumn();
        return $result;
    }


    /**
     * Get all record in table
     */
    protected static function getAllRecord($limit)
    {
        $db = Database::getInstance();
        $query = self::actionSelect('', '*', " " . $limit);
        $s = $db->query($query);
        $result = $s->fetchAll();
        return $result;
    }


    /**
     * Update active record
     */
    protected static function activeRecord($item_id, $column, $data = array(), $value)
    {
        $db = Database::getInstance();
        $query = "UPDATE " . static::$tableName . " SET ";
        foreach ($data as $key => $value) {
            $query .= $key . " = '" . $value . "', ";
        }
        $query = rtrim($query, ' ,');
        $query .= " WHERE $column = " . $item_id;
        $s = $db->prepare($query);
        $s->execute();
        return $s->rowCount();
    }


    /**
     * Count record by condition
     */
    protected static function countRowByColumn($column, $value)
    {
        $db = Database::getInstance();
        $option = "count(" . $column . ")";
        $condition = " " . $column . " = '" . $value . "'";
        $query = self::actionSelect('where', $option, $condition);
        $s = $db->query($query);
        $result = $s->fetchColumn();
        return $result;
    }


    /**
     * Get item by id
     */
    protected static function getItemById($item_id)
    {
        $db = Database::getInstance();
        $condition = " " . static::$primaryKey . " = '" . $item_id . "'";
        $query = self::actionSelect('where', '*', $condition);
        $s = $db->query($query);
        $result = $s->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Insert data into table
     */
    protected static function insertDataToTable($data = array())
    {
        $db = Database::getInstance();
        $query = "INSERT INTO " . static::$tableName . "(";
        foreach ($data as $key => $value) {
            $query .= $key . ", ";
        }

        $query = rtrim($query, ' ,');
        $query .= ") VALUES(";

        foreach ($data as $key => $value) {
            $query .= ":" . $key . ", ";
        }

        $query = rtrim($query, ' ,');
        $query .= ")";

        $s = $db->prepare($query);
        $s->execute($data);
    }


    /**
     * Update table
     */
    protected static function updateDataInTable($id, $data = array())
    {
        $db = Database::getInstance();
        $query = "UPDATE " . static::$tableName . " SET ";
        foreach ($data as $key => $value) {
            $query .= $key . " = :" . $key . ", ";
        }
        $query = rtrim($query, ' ,');
        $query .= " WHERE " . static::$primaryKey . " = " . $id;

        $s = $db->prepare($query);
        $s->execute($data);
    }


    /**
     * Count id itemt by id
     */
    protected static function getIdItem($id)
    {
        $db = Database::getInstance();
        $option = "count(" . static::$primaryKey . ")";
        $condition = " " . static::$primaryKey . " = '" . $id . "'";
        $query = self::actionSelect('where', $option, $condition);
        $s = $db->query($query);
        return $s->fetchColumn();
    }


    /*
     * Add and edit item
     */

    protected static function updateItem($data = array(), $id = null)
    {
        $db = Database::getInstance();
        $model = static::$tableName;
        $count = self::countRowByColumn(static::$columnName, $data[static::$columnName]);
        $check = false;
        if ($id == null) {
            if ($count == 0) {
                $model::insertDataToTable($data);
                $check = true;
            }
        } else {
            $data3 = array(
                'name' => $model::getItemById($id)
            );
            $name = ($data3['name'][static::$columnName]);
            if (($count == 0) || (($count == 1) && ($data[static::$columnName] == $name))) {
                $model::updateDataInTable($id, $data);
                $check = true;
            }
        }
        return $check;
    }
}