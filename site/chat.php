<?php
session_start();

if(!isset($_SESSION['id'])) {
    header('Location: index.php');
}
    include('header.php');
    include('nav.php');
?>

    <link rel="stylesheet" href="style.css">

    <!-- Page Content -->
    <div class="container">
        <div class="ipi_membres">

        </div>
        <div class="row">
            <div id="ipi_mainchat" class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
                <div id="chat"> </div>
            </div>
        </div>
        <div class="row">
                <div id="envoieMsg" class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12" >
                    <textarea id="sendTextArea" class="col-lg-10 col-md-10 col-sm-10 col-xs-10" name="" placeholder="ctrl + entrer pour envoyer"></textarea>
                    <input type="button" id="sendButton" value="envoyer" class="btn-primary col-lg-2 col-md-2 col-sm-2 col-xs-2" onclick="sendMsg()">
                </div>
        </div>

        <script type="text/javascript" src="ajax_chat.js"></script>
        <script>
        var lastMsgId= null;


        var textToSend = document.getElementById("sendTextArea");
        var buttonToSend = document.getElementById("sendButton");
        textToSend.addEventListener("keypress", function (e) {
        if ((e.keyCode == 10 || e.keyCode == 13) & e.ctrlKey)  {
                sendMsg();
            }
        });

        function sendMsg() {
            if(textToSend.value != "") {
                requestSend( <?php echo $_SESSION['id']?>, textToSend.value);
                textToSend.value="";
            }
        }
        function onLoad() {
            requestOnLoad(readData, <?php echo $_SESSION['id']?>, "status=onLoad");
            return refresh();
        }

        function refresh() {
            ret = setInterval( function() {
                requestOnLoad(readData, <?php echo $_SESSION['id']?>, "status=refresh&last=" + window.lastMsgId);
                        } , 1000);
                return ret;
        }
        onLoad();
    </script>
    <!-- /.container -->

<?php
include('footer.php');
?>
