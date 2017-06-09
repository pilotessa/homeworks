<?php
class UsersController extends Controller {
    public function adminLoginAction() {
        $modelUser = new User();

        // Redirect if a user is already logged in
        if(Session::get('login')) {
            Router::redirect('/');
        }

        // Login functionality
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Filter
            $data = [
                'login' => isset($_POST['login']) ? strip_tags(trim($_POST['login'])) : '',
                'password' => isset($_POST['password']) ? strip_tags(trim($_POST['password'])) : ''
            ];
            // Validate
            if(! empty($data['login']) && ! empty($data['password'])) {
                $user = $modelUser->getByLogin($data['login']);
                $hash = md5(Config::get('salt') . $data['password']);
                // Credentials check
                if($user && $user['is_active'] && $hash == $user['password']) {
                    Session::set('login', $user['login']);
                    Session::set('role', $user['role']);
                    Router::redirect('/admin');
                }
            }
        }
    }

    public function adminLogoutAction() {
        Session::destroy();
        Router::redirect('/');
    }
}