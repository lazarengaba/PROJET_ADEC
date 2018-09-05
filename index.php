<?php

    $titre = "ADEC";
    require_once "includedPages/connect.php";
    require_once "includedPages/headerHtml.php";

    if (isset($_SESSION['user_name'])) {
        header("Location : indexAdmin.php");
    }

    
?>

<div>
    <div class="ui container">
        <div class="ui grid">
            <div class="row">
                
                <div class="column sixteen wide">
                    
                    
                    <div style="position: absolute; left: 20%; right: 20%; top: 30px;" id="infoPanelConnect"></div>
                
                    <br /><br /><br /><br /><br />
                   <center>
                        <h2 style='color: red'><i class="lock icon"></i><br />Authentification</h2><br />


                        <input style="border: 1px solid #ccc; padding: 5px; border-radius: 2px; width: 200px;" type="text" id="userName" placeholder="Nom d'utilisateur ...">
                        <input style="border: 1px solid #ccc; padding: 5px; border-radius: 2px; width: 200px;" type="password" id="password" placeholder="***********"><br />
                        <br />
                        <button class="ui violet button tiny" id="connectBtn" style="border-radius: 2px; width: 200px;">
                            Se connecter
                        </button><br /><br /><br />

                        <div style='border-top: 1px solid #bbb; width: 600px; font-size: 13px; line-height: 20px;'><br /><br />
                            <a href="#">
                                <b>ADEC</b>
                            </a> |
                            <a href="#">
                                Outil de gestion et d'administration d'école
                            </a><br />
                            <a href="#">
                                Copyright<i class="copyright icon"></i> 2018
                            </a> |
                            <a href="#">
                                Tous droits réservés.
                            </a><br />
                        </div>
                   </center>

                </div>
            </div>
        </div>
    </div>
</div>

<a href="#" style="display: none;">
    Powered by lazaro
</a>



<?php require_once "includedPages/bottomHtml.php";?>

<script>
    $(document).ready(function() {
        $('#connectBtn').click(function() {
            $('#infoPanelConnect').html("");

            var userName = $('#userName').val();
            var password = $('#password').val();

            if (userName=="" || password=="") {
                $('#infoPanelConnect').html("<div class='redSuccessMessageColored' style='border-radius: 2px;'><center><b><i class='exclamation icon'></i> Impossible de retouner un champs vide !</b></center></div>");
            } else {
                $.post("/PROJET_ADEC/traitementsForms/traitement2.php", {userName:userName, password:password} , function(data) {
                    $('#infoPanelConnect').html(data);
                });
            }

            $('.redSuccessMessageColored').click(function() {
                $(this).hide();
            });
        });

        
    });
</script>