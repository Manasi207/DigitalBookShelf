<?php
class AuthService {
    private $username = "admin";
    private $password = "admin";

    public function login($user, $pass) {
        return ($user === $this->username && $pass === $this->password);
    }
}
?>
