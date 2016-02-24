<?php namespace App\Core\DB;

use PDO;
use PDOException;

/**
 * Class PDOConnection
 * Handles PDO-related connection
 *
 * @package App\Core\DB
 */
class PDOConnection implements ConnectionInterface
{
    /**
     * The connection handle
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * @param array|null $config
     *
     * @return PDOConnection
     */
    public static function getInstance(array $config = null) {
        if (!is_array($config)) {



        } else {

        }
    }

    /**
     * @return PDO
     */
    public function getDriver() {
        return $this->pdo;
    }

    /**
     * PDOConnection constructor.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function selectOne($table, array $bindings = [], $columns = '*')
    {
        $result = $this->select($table, $bindings, $columns);

        return count($result) > 0 ? reset($result) : null;
    }

    public function select($table, array $bindings = [], $columns = '*')
    {
        $query = "SELECT {$columns} FROM {$table} ";
        if (!empty($bindings)) {
            $query .= "WHERE ";

            $bindingParams = array_keys($bindings);
            $bindingCount = count($bindingParams);

            for ($i = 0; $i < $bindingCount; $i++) {
                $currentBinding = $bindingParams[$i];

                // if the value is only a string/number/etc,
                // then the operator value will be assigned with a '='.
                if ($i === $bindingCount - 1) {
                    if (is_array($bindings[$currentBinding])) {
                        assert(isset($bindings[$currentBinding]['op']) and isset($bindings[$currentBinding]['value']));

                        $query .= "{$currentBinding} {$bindings[$currentBinding]['op']} :{$currentBinding}";
                    } else {
                        $query .= "{$currentBinding}=:{$currentBinding}";
                    }
                } else {
                    if (is_array($bindings[$currentBinding])) {
                        assert(isset($bindings[$currentBinding]['op']) and isset($bindings[$currentBinding]['value']));

                        $query .= "{$currentBinding} {$bindings[$currentBinding]['op']} :{$currentBinding},";
                    } else {
                        $query .= "{$currentBinding}=:{$currentBinding},";
                    }
                }
            }
        }

        $statement = $this->prepare($query);
        foreach ($bindings as $key => $value) {
            if (is_array($value)) {
                assert(isset($value['op']) and isset($value['value']));

                $statement->bindParam(":{$key}", $value['value']);
            } else {
                $statement->bindParam(":{$key}", $value);
            }
        }

        return $statement->fetchAll(PDO::FETCH_BOTH);
    }

    public function insert($table, array $bindings)
    {
        if (empty ($bindings)) {
            throw new \RuntimeException('Cannot insert empty values!');
        }

        $query = str_replace('<values>', implode(',', array_keys($bindings)), "INSERT INTO {$table} (<values>) VALUES ");

        // two modes:
        // if it is an array, then do batch insert
        // assume that the rest are also arrays with equal number elements
        if (is_array(current($bindings))) {
            $count = 1;
            $_bindings = [];

            foreach ($bindings as $values) {
                $keys = array_keys($values);
                assert (!empty($keys));

                $keyCount = count($keys);
                $query .= '(';
                for ($i = 0; $i < $keyCount; $i++) {
                    $paramBinding = ":{$keys[$i]}{$count}";
                    if ($i === $keyCount-1) {
                        $query .= "$paramBinding";
                    } else {
                        $query .= "$paramBinding,";
                    }

                    $_bindings[$paramBinding] = $values[$keys[$i]];
                }
                $query .= ')';

                $count++;
            }

            $statement = $this->pdo->prepare($query);
            return $statement->execute($_bindings);
        } else {
            $keys = array_keys($bindings);
            assert (!empty($keys));

            $keyCount = count($keys);
            $query .= '(';

            for ($i = 0; $i < $keyCount; $i++) {
                if ($i === $keyCount-1) {
                    $query .= ":{$keys[$i]}";
                } else {
                    $query .= ":{$keys[$i]},";
                }
            }
            $query .= ')';

            $statement = $this->pdo->prepare($query);
            return $statement->execute($bindings);
        }
    }

    public function update($table, array $updateBindings = [], array $whereBindings = [])
    {
        // TODO: Implement update() method.
    }

    public function delete($table, array $bindings = [])
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param $query
     * @param bool $select
     * @param array $options
     * @return int|\PDOStatement
     */
    public function rawQuery($query, $select = false, array $options)
    {
        if ($select) {
            return $this->pdo->query($query);
        } else {
            return $this->pdo->exec($query);
        }
    }

    public function beginTransaction()
    {
        return $this->pdo->beginTransaction();
    }

    public function commit()
    {
        return $this->pdo->commit();
    }

    public function rollback()
    {
        return $this->pdo->rollBack();
    }

    public function prepare($query, array $options = [])
    {
        return $this->pdo->prepare($query, $options);
    }

    public function bindValues(array $bindings = [])
    {
        // TODO: Implement bindValues() method.
    }

    public function executePrepared()
    {
        // TODO: Implement executePrepared() method.
    }
}