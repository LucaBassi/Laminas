<?php

namespace Blog\Model;

use InvalidArgumentException;
use RuntimeException;
use Laminas\Db\Adapter\AdapterInterface;

class LaminasDbSqlRepository implements PostRepositoryInterface {

    /**
     * @var AdapterInterface
     */
    private $db;

    /**
     * @param AdapterInterface $db
     */
    public function __construct(AdapterInterface $db) {
        $this->db = $db;
    }

    /**
     * {@inheritDoc}
     */
    public function findAllPosts() {
        $sql = new Sql($this->db);
        $select = $sql->select('posts');
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        var_export($result);
        die();

        return $result;
    }

    /**
     * {@inheritDoc}
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function findPost($id) {
        
    }
}
