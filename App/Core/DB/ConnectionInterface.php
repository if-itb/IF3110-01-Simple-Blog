<?php namespace App\Core\DB;

/**
 * Interface ConnectionInterface
 * Inspired by Laravel's
 *
 * @package App\Core\DB
 */
interface ConnectionInterface
{
    /**
     * @param $table
     * @param array $bindings
     * @param $columns
     *
     * @return null|array
     */
    public function selectOne($table, array $bindings, $columns);

    public function select($table, array $bindings, $columns);

    public function insert($table, array $bindings);

    public function update($table, array $updateBindings, array $whereBindings);

    public function delete($table, array $bindings);

    public function rawQuery($query, $select, array $options);

    public function prepare($query, array $options);

    public function bindValues(array $bindings);

    public function executePrepared();

    /**
     * Begins a transaction
     *
     * @return boolean
     */
    public function beginTransaction();

    /**
     * Do a commit
     *
     * @return boolean
     */
    public function commit();

    /**
     * Rollbacks a transaction
     *
     * @return boolean
     */
    public function rollback();
}