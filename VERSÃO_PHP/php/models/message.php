<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Message {

    private $url;

    public function __construct($url) {
        $this->url = $url;
    }

    public function setMessage($msg, $type) {
        $_SESSION["msg"] = $msg;
        $_SESSION["type"] = $type;
    }

    public function getMessage() {
        if (!empty($_SESSION["msg"])) {
            return [
                "msg" => $_SESSION["msg"],
                "type" => $_SESSION["type"]
            ];
        } else {
            return false;
        }
    }

    public function clearMessage() {
        $_SESSION["msg"] = "";
        $_SESSION["type"] = "";
    }
}
