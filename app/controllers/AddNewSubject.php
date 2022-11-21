<?php

class AddNewSubject extends Controller
{
    public function index()
    {
        $this->view('addNewSubject/newSubject');
    }

    public function addNewSubject()
    {
        if (isset($_POST['add_subject'])) {

            $subjectName = $_POST['subjectName'];

            if (inputsEmpty($subjectName)) {
                header("Location:" . ROOT . "/public/AddNewSubject?error=inputsEmpty");
                die();
            } else {

                $subject1 = new Subject;

                $arr['subject_name'] = $subjectName;

                $subject1->insert($arr);

                header("location:" . ROOT . "/public/AddNewSubject?error=add_success");
                die();
            }
        }
    }
}
