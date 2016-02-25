<?php namespace App\Core\DB;

use App\Core\ConfigLoader;
use PDO;

class MySqlSessionHandler implements \SessionHandlerInterface
{

    /**
     * Name of the session table
     *
     * @var string
     */
    protected $table;

    /**
     * The database connection instance
     *
     * @var \PDO
     */
    protected $connection;

    /**
     * MySqlSessionHandler constructor.
     *
     * @param PDO $connection
     * @param string $table
     */
    public function __construct($connection, $table = null) {
        $this->connection = $connection;
        $this->table = !empty($table) ? $table : ConfigLoader::env('SESSION_TABLE', 'sessions');
    }

    /**
     * Get the name of the session table
     *
     * @return string
     */
    public function getTable() {
        return $this->table;
    }

    /**
     * Get the connection handler.
     *
     * @return PDO
     */
    public function getConnection() {
        return $this->connection;
    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function destroy($session_id)
    {
        $preparedStatement = $this->connection->prepare("DELETE FROM {$this->table} WHERE id=:id");

        return $preparedStatement->execute([
            ':id' => $session_id
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function gc($maxlifetime)
    {
        $preparedStatement = $this->connection->prepare("DELETE FROM {$this->table} WHERE last_activity <= :last_activity");

        return $preparedStatement->execute([
            ':last_activity' => time() - $maxlifetime
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function open($save_path, $session_id)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function read($session_id)
    {
        $preparedStatement = $this->connection
            ->prepare("SELECT * FROM {$this->table} WHERE id=:id");

        if ($preparedStatement->execute([':id' => $session_id])) {
            $result = current($preparedStatement->fetchAll(PDO::FETCH_ASSOC));
            $payload = base64_decode($result['payload']);

            return $payload;
        } else {
            throw new \PDOException("Cannot fetch session from database!");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function write($session_id, $session_data)
    {
        $preparedStatement = $this->connection->prepare("REPLACE INTO {$this->table} VALUES (:id, :payload, :last_activity)");

        $result = $preparedStatement->execute([
            ':id' => $session_id,
            ':payload' => base64_encode($session_data),
            ':last_activity' => time()
        ]);
        if (!$result) {
            throw new \RuntimeException('Cannot write session to database!', 500);
        }

        return $result;
    }
}