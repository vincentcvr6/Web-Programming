function calculateTotal() {
var scalla = document.getElementById("scalla").value;
var orchid = document.getElementById("orchid").value;
var daisy = document.getElementById("daisy").value;
var rose = document.getElementById("rose").value;
var delivery = document.getElementsByName("delivery");
var lily = document.getElementById("lily").value;

if(isNaN(rose)||rose===""){
    alert("Unit for Red Rose can not be empty or should be digit");
}else if(isNaN(lily)||lily===""){
    alert("Unit for Lily can not be empty or should be digit");
}else if(isNaN(scalla)||scalla===""){
    alert("Unit for Scalla can not be empty or should be digit");
}else if(isNaN(orchid)||orchid===""){
    alert("Unit for orchid can not be empty or should be digit");
}else if(isNaN(daisy)||daisy===""){
    alert("Unit for daisy can not be empty or should be digit");
}else{

var delivp;
var whitescallacost = parseInt(scalla)*4.0;
var redrosecost = parseInt(rose)*5.5;
var pinkorchidcost = parseInt(orchid)*8.00;
var orangedaisycost = parseInt(daisy)*7.00;
var yellowlilycost = parseInt(lily)*7.5;

if(delivery[0].checked==true){
    delivp=2;
}else{
    delivp=6;
}
var output="Red Roses(units="+rose+"):$"+redrosecost+"<br/>";

output=output+"Pink Orchid(units="+orchid+"):$"+pinkorchidcost+"<br/>";
output=output+"White Mini Calla(units="+scalla+"):$"+whitescallacost+"<br/>";
output=output+"Yellow Lily(units="+lily+"):$"+yellowlilycost+"<br/>";
output=output+"Orange Daisy(units="+daisy+"):$"+orangedaisycost+"<br/>";
output=output+"Delivery:$"+delivp+"<br/><br/>";
var totcost= delivp+whitescallacost+redrosecost+pinkorchidcost+orangedaisycost+yellowlilycost;
output=output+"Final Total:$"+totcost;
document.getElementById("results").innerHTML=output;
  }
}
