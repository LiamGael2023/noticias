<?php
/**
 * Auth Controller
 */

class AuthController extends Controller {

    public function login() {
        // If already logged in, redirect to admin
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/admin');
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $error = 'Por favor ingresa usuario y contraseña';
            } else {
                $userModel = $this->model('User');
                $user = $userModel->findByUsername($username);

                if ($user && $userModel->verifyPassword($password, $user['password'])) {
                    // Login successful
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_role'] = $user['role'];
                    $_SESSION['user_username'] = $user['username'];

                    $this->redirect('/admin');
                } else {
                    $error = 'Usuario o contraseña incorrectos';
                }
            }
        }

        $this->view('auth/login', [
            'title' => 'Iniciar Sesión',
            'error' => $error
        ]);
    }

    public function logout() {
        session_destroy();
        $this->redirect('/admin/login');
    }
}
