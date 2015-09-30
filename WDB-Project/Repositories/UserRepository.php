<?php
namespace ShoppingCart\Repositories;

use ShoppingCart\Database;
use ShoppingCart\Models\User;

class UserRepository
{
    /**
     * @var \ShoppingCart\Database
     */
    private $db;

    /**
     * @var UserRepository
     */
    private static $inst = null;

    private function __construct(\ShoppingCart\Database $db)
    {
        $this->db = $db;
    }

    public static function create()
    {
        if (self::$inst == null)
        {
            self::$inst = new self(Database::getInstance());
        }

        return self::$inst;
    }

    /**
     * @param $fullName
     * @param $password
     * @return bool|User
     */
    public function getOneByDetails($username, $password)
    {
        $query = "SELECT id, firstname, middlename, lastname, username, password
        FROM users WHERE username = ? AND password = ?";

        $this->db->query($query, [$username, md5($password)]);

        $result = $this->db->row();

        if (empty($result)) {
            return false;
        }

        return new User(
            $result['firstname'],
            $result['middlename'],
            $result['lastname'],
            $result['username'],
            $result['password'],
            $result['id']
        );
    }

    /**
     * @param $id
     * @return bool|User
     */
    public function getOne($id)
    {
        $query = "SELECT id, firstname, middlename, lastname, username, password
        FROM users WHERE id = ?";

        $this->db->query($query, [$id]);

        $result = $this->db->row();

        if (empty($result)) {
            return false;
        }

        return new User(
            $result['firstname'],
            $result['middlename'],
            $result['lastname'],
            $result['username'],
            $result['password'],
            $result['id']
        );
    }

    /**
     * @return User[]
     */
    public function getAll(){
        $query = "SELECT id, firstname, middlename, lastname, username, password
        FROM users";

        $this->db->query($query);

        $result = $this->db->fetchAll();
        $collection = [];

        foreach ($result as $row){
            $collection[] = new User(
                $row['firstname'],
                $row['middlename'],
                $row['lastname'],
                $row['username'],
                $row['password'],
                $row['id']
            );
        }

        return $collection;
    }

    public function save(User $user)
    {
        $query = "INSERT INTO users (firstname, middlename, lastname, username, password)
                  VALUES (?, ?, ?, ?, ?)";

        $params = [
            $user->getFirstName(),
            $user->getMiddleName(),
            $user->getLastName(),
            $user->getUsername(),
            $user->getPassword()
        ];

        if ($user->getId()) {
            $query = "UPDATE users SET firstname = ?, middlename = ?, lastname = ?, username = ?, password = ? WHERE id = ?";
            $params[] = $user->getId();
        }

        $this->db->query($query, $params);

        return $this->db->rows() > 0;
    }
}