<form action="./index.php" method="post">

    <label for="num1">{{::numero1::}}</label>
    <input type="text" name="num1" id="num1" value ="{{::numero1value::}}">
    <label for="num2">{{::numero2::}}</label>
    <input type="text" name="num2" id="num2" value ="{{::numero2value::}}">  

    <input type="radio" id="suma" name="operacion" value="suma" checked>
    <label for="suma">{{::suma::}}</label>

    <input type="radio" id="resta" name="operacion" value="resta">
    <label for="resta">{{::resta::}}</label>

    <input type="radio" id="multiplica" name="operacion" value="multiplica">
    <label for="multiplica">{{::multiplica::}}</label>

    <input type="radio" id="divide" name="operacion" value="divide">
    <label for="divide">{{::divide::}}</label>

    <input type="submit" name="calcula" value="calcula" />

</form>