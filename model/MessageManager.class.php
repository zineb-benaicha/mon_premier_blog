<?php
require_once 'Manager.class.php';
class MessageManager extends Manager{

    public function setMessage($firstName, $lastName, $email, $message)
    {
        $db = $this->dbConnect();
        $message = $db->prepare('INSERT INTO message(first_name, last_name, email, content) VALUES (?, ?, ?, ?)');
        return $message->execute(array($firstName, $lastName, $email, $message));
    }

}