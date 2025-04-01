<?php

require_once(__DIR__ . '/../models/Config.php');
require_once(__DIR__ . '/../models/Database.php');

class AuthController {
    private $input;
    private $db;

    public function __construct($input) {
        $this->input = $input;
        $this->db = new Database();
    }

    public function run() {
        if (isset($_SESSION["user_id"]) && in_array($this->input["command"], ["login", "signup"])) {
            header("Location: index.php?command=home");
            exit();
        }

        $command = $this->input['command'] ?? 'login';

        switch ($command) {
            case 'login':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->handleLogin();
                } else {
                    include(__DIR__ . '/../views/login.php');
                }
                break;

            case 'signup':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->handleSignup();
                } else {
                    include(__DIR__ . '/../views/signup.php');
                }
                break;

            case 'logout':
                session_unset();
                session_destroy();
                setcookie(session_name(), '', time() - 3600, '/'); // kill session cookie
                header("Location: index.php?command=home");
                exit();
        }
    }

    private function handleLogin() {
        if (!empty($_POST["email"]) && !empty($_POST["password"])) {
            $email = trim($_POST["email"]);
            $password = $_POST["password"];

            // Look up user by email
            $user = $this->db->query("SELECT * FROM musclemap_users WHERE email = $1;", $email);

            if (empty($user)) {
                $_SESSION["error"] = "Invalid email or password.";
                header("Location: index.php?command=login");
                exit();
            }

            $hashed = $user[0]["password"];
            $valid = password_verify($password, $hashed);

            if (!$valid) {
                $_SESSION["error"] = "Invalid email or password.";
                header("Location: index.php?command=login");
                exit();
            }

            // Save user data to session
            $_SESSION["user_id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["email"] = $user[0]["email"];

            // Redirect to home
            header("Location: index.php?command=home");
            exit();
        }
        else {
            $_SESSION["error"] = "Please enter both email and password.";
            header("Location: index.php?command=login");
            exit();
        }
    }

    private function handleSignup() {
        // Check if all required fields are filled
        if (!empty($_POST["username"]) && !empty($_POST["email"]) &&
        !empty($_POST["password"]) && !empty($_POST["confirmPassword"])) {
            $username = trim($_POST["username"]);
            $email = trim($_POST["email"]);
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];

            // Check if passwords match
            if ($password !== $confirmPassword) {
                $_SESSION["error"] = "Passwords do not match!";
                header("Location: index.php?command=signup");
                exit();
            }

            // Validate password strength with regex
            $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";
            if (!preg_match($pattern, $password)) {
                $_SESSION["error"] = "Password must be at least 8 characters long and include an uppercase letter, a lowercase letter, a number, and a special character.";
                header("Location: index.php?command=signup");
                exit();
            }

            // Check if email already exists
            $existingEmail = $this->db->query("SELECT * FROM musclemap_users WHERE email = $1;", $email);
            if (!empty($existingEmail)) {
                $_SESSION["error"] = "An account with this email already exists.";
                header("Location: index.php?command=signup");
                exit();
            }

            // Check if username exists
            $existingUsername = $this->db->query("SELECT * FROM musclemap_users WHERE username = $1;", $username);
            if (!empty($existingUsername)) {
                $_SESSION["error"] = "That username is already taken.";
                header("Location: index.php?command=signup");
                exit();
            }

            // Hash password and insert new user
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $this->db->query("INSERT INTO musclemap_users (username, email, password) VALUES ($1, $2, $3);",
                            $username, $email, $hashed);

            // Fetch user and log them in
            $user = $this->db->query("SELECT * FROM musclemap_users WHERE email = $1;", $email);
            $_SESSION["user_id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["email"] = $user[0]["email"];

            // Redirect to workout planner or home page
            header("Location: index.php?command=workout-plan");
            exit();
        }
        else {
            $_SESSION["error"] = "All fields are required!";
            header("Location: index.php?command=signup");
            exit();
        }
    }
}