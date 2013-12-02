<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<link rel="shortcut icon" href="Shared/img/favicon.ico">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../View/Shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <script type="text/javascript" src="/../V.iew/Shared/js/jquery.price_format.1.8.min.js"></script>
        <link href="/../Shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <title> CMH - Contatos</title>
    </head>
    <style>
        h2 {
            color: #990000;
            text-decoration: none;
            font-size: 30pt;
            border-bottom: 1px double #990000;
        }
    </style>

    <body align="center">
        <div class="root">                   
            <?php
            require '../View/Shared/Header.php';
            require '../View/Shared/Navigation_bar.php';
            require '../Controller/ControllerSuggestion.php';

            if (isset($_REQUEST['sugestao'])) {
                $suggestion = $_REQUEST['sugestao'];
                $email = $_REQUEST['email'];
                $suggestionController = ControllerSuggestion::getInstanceControllerSuggestion();
                $result = $suggestionController->saveSuggestion($suggestion, $email);
                if($result){
                    print "<script>alert('Sua sugestão foi gravada com sucesso! "
                    . "Obrigado por nos ajudar a melhorar o site.')</script>";
                }
            }
            ?>
            <h2>Deixe sua opinião</h2>
            <form action="Contact.php" method="post">
                <textarea name="sugestao" cols="91" rows="10" value="sugestao" maxlenght="1000" 
                          placeholder="Digite sua sugestão aqui..."></textarea>
                <input type="submit" name="enviarSugestao" value="Enviar">
                <input type="email" name="email" style="width: 300px; height: 24px" 
                       placeholder="Digite seu e-mail aqui..."/>
            </form>

            <div align ="center">
                <div class="content">
                    <table border = "1">                    
                        <b><font size="6">Equipe de Desenvolvimento</font></b>
                        <table width="760"border="1">
                            <tr>
                                <td>Atilla Gallio </td>
                                <td>atilla.gallio@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Euler Tiago </td>
                                <td>tiago6654@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Levi Moraes</td>
                                <td>levi.moraesds@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Maxwell de Oliveira</td>
                                <td>maxwell_oliveira2@hotmail.com</td>
                            </tr>
                            <tr>
                                <td>Paulo Tada</td>
                                <td>paulohtfs@gmail.com</td>
                            </tr>
                        </table>
                        <br /><br /><br />

                        <b><font size="6">Equipe de Gerenciamento</font></b>
                        <table width="760"border="1">
                            <tr>
                                <td>Beatriz Rezener</td>
                                <td>beatrizrezener@gmail.com</td>
                            </tr>
                            <tr>
                                <td>João Gabriel</td>
                                <td>joaogabrieldebrittoesilva@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Larissa Rodrigues</td>
                                <td>larissax55@gmail.com</td>
                            </tr>
                        </table>
                </div>
                <br /><br /><br />
                <?php require '../View/Shared/Footer.php'; ?>
            </div>
        </div>
    </body>
</html>