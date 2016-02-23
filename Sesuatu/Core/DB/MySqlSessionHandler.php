<?php namespace App\Core\DB;

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
     * Existence state of the session
     *
     * @var bool
     */
    protected $exists;

    /**
     * MySqlSessionHandler constructor.
     *
     * @param PDO $connection
     * @param string $table
     */
    public function __construct($connection, $table) {
        $this->connection = $connection;
        $this->table = $table;
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

        $preparedStatement->bindParam(':id', $session_id);
        if ($preparedStatement->execute()) {
            return base64_decode($preparedStatement->fetch(PDO::FETCH_ASSOC)['payload']);
        } else {
            throw new \PDOException("Cannot fetch session from database!");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function write($session_id, $session_data)
    {
        $preparedStatement = null;
        if ($this->exists) {
            $preparedStatement = $this->connection
                ->prepare("UPDATE {$this->table} SET payload=:payload, last_activity=:last_activity WHERE id:id ");
        } else {
            $preparedStatement = $this->connection
                ->prepare("INSERT INTO {$this->table} (id, payload, last_activity) VALUES (:id, :payload, :last_activity)");
        }

        return $preparedStatement->execute([
            ':id' => $session_id,
            ':payload' => base64_encode($session_data),
            ':last_activity' => time()
        ]);
    }
}