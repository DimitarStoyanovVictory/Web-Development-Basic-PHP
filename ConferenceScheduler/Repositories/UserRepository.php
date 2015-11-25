<?php
namespace ConferenceScheduler\Repositories;

use ConferenceScheduler\Database;
use ConferenceScheduler\Models\User;

class UserRepository
{
    private $db;

    private static $inst = null;

    private function __construct(\ConferenceScheduler\Database $db)
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

    public function getOneByDetails($user, $pass)
    {
        $query = "SELECT id, username, password
        FROM users WHERE username = ? AND password = ?";

        $this->db->query($query, [$user, md5($pass)]);

        $result = $this->db->row();

        if (empty($result))
        {
            return false;
        }

        return $this->getOne($result['id']);
    }

    /**
     * @param $id
     * @return bool|User
     */
    public function getOne($id)
    {
        $query = "SELECT id, username, password
        FROM users WHERE id = ?";

        $this->db->query($query, [$id]);

        $result = $this->db->row();

        if(empty($result))
        {
            return false;
        }

        return new User(
            $result['username'],
            $result['password'],
            $result['id']
        );
    }

    /**
     * @return Users
     */
    public function getAll()
    {
        $query = "SELECT id, username, password
        FROM users";

        $this->db->query($query);

        $result = $this->db->row();

        if(empty($result))
        {
            return false;
        }

        $result = $this->db->fetchAll();
        $collection = [];

        foreach ($result as $row)
        {
            $collection[] = new User(
                $row['username'],
                $row['password'],
                $row['id']
            );
        }
    }

    public function save(User $user)
    {
        $query = "INSERT INTO users (username, password)
                  VALUES (?, ?)
        ";

        $params = [
            $user->getUsername(),
            $user->getPassword()
        ];

        if ($user->getId())
        {
            $query = "UPDATE users SET username = ?, password = ? WHERE id = ?";
            $params[] = $user->getId();
        }

        $this->db->query($query, $params);

        return $this->db->rows() > 0;
    }
}