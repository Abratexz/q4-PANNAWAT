<?php include 'header.php'; ?>
<link rel="stylesheet" href="check.css">
    <script>
        var xmlHttp;

        function send() {
            xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = showResult;

            var keyword = document.getElementById("keyword").value;

            var url = "../routes/searchAjax.php?keyword=" +keyword;
            xmlHttp.open("GET", url);
            xmlHttp.send();  
        }

        function showResult() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {

                document.getElementById("result").innerHTML = xmlHttp.responseText;
            }
        }
    </script>
    <main>
    <article style="padding: 100px 160px 100px;">
  <h2 style="display: block;text-align: center;" >Search for Members</h2>
    <span style="display: block;text-align: center;">Search: <input type="text" id="keyword" onblur="send()"></span>
    <div id="result"></div>
      </article>
      
<?php include 'footer.php'; ?>