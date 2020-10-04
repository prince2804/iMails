<?php 
session_start();
require '../database/db.inc.php';
include '../non-pages/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['submit'])) { 

        require 'signin.inc.php';
        
    }
}
?>
<link rel="stylesheet" href="../repository/css/forms.css" type="text/css">
<script type="text/javascript" src="../repository/js/main.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="box">
                <div class="logo logo-m">
                    iMails
                </div>
                <h1>Signin</h1>
                <h4>in your iMails Account</h4>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-box">
                                <input type="text" id="speechtotext" value="<?php 
                                            if(isset($_SESSION['mail']))echo $_SESSION['mail'];?>"
                                            onclick="record()" 
                                name="u_mail"  required/>&nbsp;
                                <label>Email *</label>
                                <spam >eg.demo@imails.tk</spam>
                            </div>
                            <script>
                            function record() {
                            var recognition = new webkitSpeechRecognition();
                                     recognition.lang = "en-GB";

                            recognition.onresult = function(event) {
                            // console.log(event);
                            document.getElementById('speechtotext').value = event.results[0][0].transcript.replace(/ /g, '')+"@imails.tk";
                                }
                            recognition.start();

                             }
                            </script>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-box">
                                <input type="password" id="pass" name="u_password" onclick="record1()" required/>
                                <label>Password *</label>&nbsp;
                            </div>
                            <script>
                            function record1() {
                            var recognition = new webkitSpeechRecognition();
                                     recognition.lang = "en-GB";

                            recognition.onresult = function(event) {
                            // console.log(event);
                            document.getElementById('pass').value = event.results[0][0].transcript.replace(/ /g, '')
                                }
                            recognition.start();

                             }
                             </script>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="next-button">
                            <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                    <label id="forgot-label"><a href="signup.php">Create Account?</a></label>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>      

<?php  include '../non-pages/footer.php';  ?>   