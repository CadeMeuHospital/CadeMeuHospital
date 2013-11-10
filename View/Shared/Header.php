<div class="header">
    <div id="left">
        <a href="home.php"><img src="../view/shared/img/LogoCMH.png" align="center" /></a>
    </div>
    <div id ="right">

        <form method="post" action="../view/SearchUBS.php?page=1" id="formSearchUBS">	
            <label> Buscar UBS:</label>
            <input type="text" name="BuscaUBS" value="" required/>

            <select name="searchType">
                <option value=1>Nome</option>
                <option value=2>Cidade</option>
                <option value=3>Bairro</option>

            </select>

            <input type = "submit" value="Enviar" name="Enviar" />
        </form>

    </div>

</div>
