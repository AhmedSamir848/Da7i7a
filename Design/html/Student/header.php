
<!DOCTYPE html>
<!-- 5od el header dh kolo w 4il code ely 3ndak w mt8ir4 7aga fe el links-->
<html>
    <head>
        <link rel="shortcut icon" href="../../images/pp.png" />
        <title>Da7i7a - Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../Css/Resources/css/bootstrap.min.css" rel="stylesheet" >
        <link href="../../Css/Resources/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../Css/Resources/css/bootstrap.css" rel="stylesheet" >
        <link href="../../Css/Resources/css/bootstrap-theme.css" rel="stylesheet">
        <link href="../../Css/Resources/js/bootstrap.min.js" >
        <link href="../../Css/Resources/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <style>
            body{
                background-image: url('../..//images/bg.jpg');   
            }

            .tools a:hover{
                color: white;
                text-decoration: none;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('.dropdown-toggle').dropdown();
            });
        </script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../Start/index.php">Home</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="student_profile.php">Profile <span class="sr-only">(current)</span></a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courses <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="registercourses.php">Register Courses</a></li>
                                <li><a href="updateregisteredcourses.php">Update Your Courses</a></li>

                            </ul>
                        </li>                        
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Competition <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="competS.php">Compete System</a></li>
                                <li class="disabled"><a href="" >Compete Random</a></li>
                                <li class="disabled"><a href="" >Compete Friend</a></li>
                            </ul>
                        </li>                       
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Team <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="team_1.php">Teams</a></li>
                                <li><a href="createteam.php">Create Team</a></li>
                                <li><a href="yourteams.php">Your Teams</a></li>
                                <li><a href="yourteams.php">Delete your Team</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Question <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="question.php">Questions</a></li>
                                <li><a href="askquestion.php">Ask Question</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Material <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="material.php">Materials</a></li>
                                <li><a href="uploadmaterial_student.php">Upload Material</a></li>
                            </ul>
                        </li>

                        <form class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

    </body>
</html>

