<?php
error_reporting(E_ERROR);
session_start();
$type = $_SESSION['type'];
$id = $_SESSION['id'];
//include_once './../../../classes/System.php';
//$sys = new System();
//$path = basename(__FILE__, '.php');
//if (!$sys->check_accessability($path, $type)) {
//    header("Location: ../Start/privent_admin.php");
//    exit();
//}
?>
<?php
include_once '../../../classes/Student.php';
include_once '../../../classes/Question.php';
include_once '../../../classes/Course.php';
error_reporting(E_ERROR);
$ques = $userid = $course_id = '';
if (empty($_POST['q'])) {
    echo "please enter the question";
} else {

    $ques = test_input($_POST['q']);
}
$user = new Student();
$user->setId($id);
$qq = new Question();
$course = new Course();
$course->setCourseID(1);        
$qq->setQuestion($ques);
if ($user->AskQuestion($qq, $user)) {
    echo "the question add Successfully";
} else {
    echo 'there was error ';
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Professor page</title>
        <link rel="stylesheet" href="../../css/Professor/ask_replyStyle.css">
    </head>
    <body>
        <?php include_once 'proPage.php'; ?>
        <div class="post">
            <form>
                <textarea class="form-control" placeholder="What's in your mind?" rows="5"></textarea>
                <button name="post" >Post</button>
            </form>
        </div>

        <div class="container">
            <article class="postt">
                <div class="meta">by <a href="#">halaaaaaa</a></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut sodales est. Donec congue tristique ipsum id rutrum. Praesent mattis accumsan purus eu tristique. Praesent vel volutpat odio. Nullam dictum congue vehicula. Nunc sit amet blandit magna, at ultrices lorem.</p>
                <input type="text" name="reply" value="" placeholder="reply to this...">
            </article>
        </div>

    </body>
</html>