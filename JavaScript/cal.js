// This function clear all the values
function clearScreen() {
    document.getElementById("result").value = "";
   }
   
   // This function display values
   function display(value) {
    document.getElementById("result").value += value;
   }

   // This function evaluates the expression and return result
   function calculate() {
    var p = document.getElementById("result").value;
    var q = eval(p);
    document.getElementById("result").value = q;
   }

   //  this function is for calculate profit
  function Calculate_Profit() {
    var cp = document.getElementById("cost__price").value;
    var sp = document.getElementById("selling__price").value;

    if (sp > cp) {
        const profit = sp - cp;
        const profit_percent = ((profit / cp) * 100);
        document.getElementById("profit__loss").innerHTML = "Profit : Rs." + profit + "/=";
        document.getElementById("profit_percentage").innerHTML = "Profit Percentage : " + profit_percent + "%";
    }
    if (sp < cp) {
      const loss = cp - sp;
      const loss_percent = ((loss / cp) * 100).toFixed(2);
    
      document.getElementById("profit__loss").innerHTML = "Profit : Rs." + loss + "/=";
      document.getElementById("profit_percentage").innerHTML = "Loss Percentage : " + loss_percent + "%" 
    }
    
    if (sp == cp) {
      document.getElementById("profit__loss").innerHTML = "No Profit No Loss";
    }
  }