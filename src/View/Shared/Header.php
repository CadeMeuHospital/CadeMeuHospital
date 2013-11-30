<link rel="stylesheet" href="css/home.css" type="text/css">

<style>#states{display:none;}</style>
<style>#search{display:block;}</style>
<script>
    function verifyOption(option){
        if(option==4){
            document.getElementById('states').style.display = 'block';
            document.getElementById('search').style.display = 'none';
        } else {
            document.getElementById('states').style.display = 'none';
            document.getElementById('search').style.display = 'block';
        }
    }
    function verifyUF(){
        if(document.getElementById('searchType').value == 4 && document.getElementById('optionUF').value == "vazio"){
            alert('Selecione uma UF.');
            return false;
        } else {
            return true;
        }
    }
</script>
<div class="header">
    <div id="left">
        <a href="Home.php"><img src="/../View/Shared/img/LogoCMH.png" align="center" width="100%" height="100%"/></a>
    </div>
    <div id ="right">
            <form method="post" action="/../View/SearchUBS.php?page=1" id="formSearchUBS">	
                <table>
                    <tr>
                        <td><label> Buscar UBS:</label></td>
                        <td id="states">
                            <select style="width: 180px; height: 30px;" id='optionUF' name="SearchUBSbyState" onchange=" document.getElementById('search').
                                        value = (this.value);">
                            <option value="vazio">Selecione UF</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso de Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                        </td>
                        <td><input id='search' type="text" name="BuscaUBS" value=""/></td>
                    </tr>
                    <tr>
                        <td>
                            <select id="searchType" name="searchType" onchange='verifyOption(this.value);'>
                                <option value=1>Nome</option>
                                <option value=2>Cidade</option>
                                <option value=4>Estado</option>
                            </select>
                        </td>
                        <td><input type = "submit" value="Enviar" name="Enviar" onclick="return verifyUF();" /></td>
                    </tr>
                </table>
                </form>
    </div>
</div>
