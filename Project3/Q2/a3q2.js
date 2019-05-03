var array = [];

function validatevariable() {

   let expression = /[%!@#&*]/g;
   let value = document.getElementById("value").value;

   if(value.match(expression)){
       document.getElementById("value").style.background="yellow";
       document.getElementById("value").style.color="red";
   } else {
       document.getElementById("value").style.background="none";
       document.getElementById("value").style.color="black";
   }
}

function addvariable() {

   let expression=/[%!@#&*]/g;
   let value = document.getElementById("value").value;
   var cnt=0;
   if(value.match(expression)){}

   else if(value.length==0){}

   else{
       for(var j=0;j<array.length;j++){
           if(array[j]==value){
               cnt++
           }
       }
       if(cnt==0){
           var a = document.createElement("li");
           var b = document.createTextNode(value);
           a.appendChild(b); document.getElementById("list").appendChild(a);
           array.push(value);
      }
   }
}
