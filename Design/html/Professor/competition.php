 <?php
 include 'proPage.php'
?>
      
<link href="../../Css/Student/CompStyle.css" rel="stylesheet">
   <center>
            <button type="Add" class="Options" id="Addbtn">Add</button>
            <br>
            <button type="Edite" class="Options" id="Editebtn">Edite</button>
            <br>
            <button type="Delete" class="Options" id="DeleteQuesbtn">Delete</button>
        </center>    
        <script type="text/javascript">
          var Add = document.getElementById('Addbtn');
          Add.addEventListener('click', function() {
          document.location.href = 'addQuestion.php';
          });      

          var Edite = document.getElementById('Editebtn');
          Edite.addEventListener('click', function() {
          document.location.href = 'editQuestion.php';
          }); 
             var Back = document.getElementById('DeleteQuesbtn');
          Back.addEventListener('click', function() {
          document.location.href = 'deleteQuestion.php';
          });     
        </script>
>