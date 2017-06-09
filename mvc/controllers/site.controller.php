<?php
class SiteController extends Controller {
    public function indexAction() {
        $modelReview = new Review();

        // Save review
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Filter
            $data = [
                'author' => isset($_POST['author']) ? strip_tags(trim($_POST['author'])) : '',
                'email' => isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '',
                'message' => isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : ''
            ];
            // Validate
            if(! empty($data['author']) && ! empty($data['email']) && ! empty($data['message'])) {
                if(! empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                    $data['image'] = Image::upload($_FILES['image']);
                }

                if($modelReview->save($data)) {
                    Session::setFlash('Thank you! Your review has been sent successfully!');
                }
            } else {
                Session::setFlash('The form is filled in with errors.');
            }
        }

        $paramOrder = isset($this->params[0]) ? $this->params[0] : '';
        switch($paramOrder) {
            case 'author':
                $order = 'author ASC';
                break;
            case 'email':
                $order = 'email ASC';
                break;
            default:
                $order = 'created DESC';
                break;
        }
        $this->data['reviews'] = $modelReview->getList(true, $order);
    }

    public function adminIndexAction() {
        $modelReview = new Review();
        $this->data['reviews'] = $modelReview->getList(false);
    }

    public function adminEditAction() {
        $modelReview = new Review();

        if(isset($this->params[0]) && $review = $modelReview->getById($this->params[0])) {
            // Save review
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Filter
                $data = [
                    'author' => isset($_POST['author']) ? strip_tags(trim($_POST['author'])) : '',
                    'email' => isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '',
                    'message' => isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '',
                    'is_modified' => 1
                ];
                // Validate
                if(! empty($data['author']) && ! empty($data['email']) && ! empty($data['message'])) {
                    if($modelReview->save($data, $review['id'])) {
                        Router::redirect('/admin');
                    }
                } else {
                    Session::setFlash('The form is filled in with errors.');
                }
            }

            $this->data['review'] = $review;
        } else {
            Router::redirect('/admin');
        }
    }

    public function adminApproveAction() {
        $modelReview = new Review();

        if(isset($this->params[0]) && isset($this->params[1])) {
            $modelReview->approve($this->params[0], $this->params[1]);
        }

        Router::redirect('/admin');        
    }
}