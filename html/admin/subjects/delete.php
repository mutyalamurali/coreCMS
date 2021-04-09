<?php
require_once '../../../private/init.php';

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $id = (int) filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result = delete('subjects', $id);
    if ($result) {
        $_SESSION['danger'] = "Subject deleted";
        return session_messages('danger');
        //return TRUE;
    }
} else {
    redirect(url('admin/subjects/index.php'));
}
