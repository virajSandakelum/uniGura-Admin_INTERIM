<?php

class DeleteSubject extends Controller
{
    public function index()
    {
        if (isset($_GET['subject_id'])) {

            $subject = new Subject;

            $subject_id = $_GET['subject_id'];

            $subject->delete($subject_id, 'subject_id');

            header("location:" . ROOT . "/public/AddNewSubject?error=delete_success");
            die();
        }
    }
}
