<?php
require_once 'Manager.class.php';
class MessageManager extends Manager {

    public function setMessage(Message $message) {
        $db = $this->dbConnect();
        $result = $db->prepare('INSERT INTO message (first_name, last_name, email, content) VALUES (?, ?, ?, ?)');
        return $result->execute(array($message->firstName(), $message->lastName(), $message->email(), $message->content()));
    }
}
