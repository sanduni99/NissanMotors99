    <h3>Basic Calculator</h3>
    <hr>

        <table class = "calculator" >
        <tr>
            <td colspan = "3"> <input class = "display-box" type = "text" id = "result" /> </td>
        <!-- clearScreen() function clear all the values -->
            <td> <input class = "button" type = "button" value = "C" onclick = "clearScreen()" style = "background-color: #147f8f;" /> </td>
        </tr>
        <tr>
        <!-- display() function display the value of clicked button -->
            <td> <input class = "button" type = "button" value = "1" onclick = "display('1')" /> </td>
            <td> <input class = "button" type = "button" value = "2" onclick = "display('2')" /> </td>
            <td> <input class = "button" type = "button" value = "3" onclick = "display('3')" /> </td>
            <td> <input class = "button" type = "button" value = "/" onclick = "display('/')" /> </td>
        </tr>
        <tr>
            <td> <input class = "button" type = "button" value = "4" onclick = "display('4')" /> </td>
            <td> <input class = "button" type = "button" value = "5" onclick = "display('5')" /> </td>
            <td> <input class = "button" type = "button" value = "6" onclick = "display('6')" /> </td>
            <td> <input class = "button" type = "button" value = "-" onclick = "display('-')" /> </td>
        </tr>
        <tr>
            <td> <input class = "button" type = "button" value = "7" onclick = "display('7')" /> </td>
            <td> <input class = "button" type = "button" value = "8" onclick = "display('8')" /> </td>
            <td> <input class = "button" type = "button" value = "9" onclick = "display('9')" /> </td>
            <td> <input class = "button" type = "button" value = "+" onclick = "display('+')" /> </td>
        </tr>
        <tr>
            <td> <input class = "button" type = "button" value = "." onclick = "display('.')" /> </td>
            <td> <input class = "button" type = "button" value = "0" onclick = "display('0')" /> </td>
        <!-- calculate() function evaluate the mathematical expression -->
            <td> <input class = "button" type = "button" value = "=" onclick = "calculate()" style = "background-color: #147f8f;" /> </td>
            <td> <input class = "button" type = "button" value = "*" onclick = "display('*')" /> </td>
        </tr>
    </table>
    
    <h3>Profit Calculator</h3>
    <hr>
    <div class="plcalculate row mt-2">
        <div class="row mt-2">
            <div class="col md-12">
                <lable>Cost Price(CP) : </lable>
                <input class="cost__price" name="cost__price" id="cost__price" type="number" />
            </div>
        </div>    
        <div class="row mt-2">
            <div class="col md-12">
                <lable>Selling Price(SP) :</lable>
                <input class="selling__price" id="selling__price" type="number" />
            </div>
        </div>   
        <div class="roe mt-2">
            <div class="col md-12"><input type="submit" name="submit" class="submit" onclick="Calculate_Profit()" value="Calculate"/></div>
        </div>
                <h2 class="profit__loss" id="profit__loss"></h2> 
                <h2 class="profit_percentage" id="profit_percentage"></h2>
    </div>
