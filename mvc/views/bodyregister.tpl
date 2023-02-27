<form action="./index.php" method="post">
    <label for="user">{{::usuario::}}</label>
    <input type="text" name="user" id="user" value ="{{::uservalue::}}">
    <label for="mail">{{::email::}}</label>
    <input type="text" name="mail" id="mail" value ="{{::mailvalue::}}">
    <input type="hidden" name="action" value="NuevoUsuario">
    <input type="submit" name="registrar" value="Registrar" />
</form>

{{::foo::}}

