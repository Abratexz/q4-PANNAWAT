<?php include 'header.php'; ?>
<link rel="stylesheet" href="check.css">
    <script>
        var xmlHttp;

        function checkUsername() {
            document.getElementById("username").className = "thinking";


            xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = showUsernameStatus;

            var username = document.getElementById("username").value;
            var url = "../routes/checkuser.php?username=" + username;  
            xmlHttp.open("GET", url);

            xmlHttp.send();
        }

        function showUsernameStatus() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                if (xmlHttp.responseText.trim() === "okay") {
                    document.getElementById("username").className = "approved";
                } else {
                    document.getElementById("username").className = "denied";
                    document.getElementById("username").focus();
                    document.getElementById("username").select();
                }
            }
        }
    </script>
    <main>
    <article style="padding: 100px 160px 100px;">
   <h1>Register</h1>
    <form>
        <span style="display: block;text-align: center;">Username: <input id="username" type="text" onblur="checkUsername()"><br></span>
    </form>
      </article>
      
<?php include 'footer.php'; ?>