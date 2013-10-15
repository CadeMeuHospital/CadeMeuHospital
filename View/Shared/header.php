<div class="header">
    <div id="left">
        <img src="../view/shared/img/logo_cmh.png" align="center" />
    </div>
    <div id ="right">
    
        <form method="post" action="../view/SearchUBS.php" id="formSearchUBS">	
            <label> Buscar UBS:</label>
            <input type="text" name="BuscaUBS" value="" />
    
            <select name="searchType">
                <option value=1>Nome</option>
                <option value=2>Cidade</option>
                <option value=3>Bairro</option>

            </select>
            
            <input type = "submit" value="Enviar" name="Enviar" />
        </form>
            
    </div>

</div>
