<?php
require_once 'Manager.class.php';
class MessageManager extends Manager
{

    public function setMessage($firstName, $lastName, $email, $message)
    {
        $db = $this->dbConnect();
        $result = $db->prepare('INSERT INTO message (first_name, last_name, email, content) VALUES (?, ?, ?, ?)');
        return $result->execute(array($firstName, $lastName, $email, $message));
    }

}
