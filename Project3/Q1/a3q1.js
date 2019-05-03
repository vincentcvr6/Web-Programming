function evaluate(input, res, mat){
    let result1=new RegExp(res,mat);

    let result=0;
    for(let j=0;j<input.length;j++){
        if(input[j].match(result1)){
            result=result+1;
        }
      }
    return result;
  }

function search() {
    let mat=mod();
    let res=expression();
    let input=spt(document.getElementById("textarea").value);
    let result= evaluate(input,res,mat);
    let output="There is a total of "+input.length+" non empty words in the text, including "+result.toString()+" words matching the regex."
    document.getElementById("output").textContent=output;
}

function reset(){
    document.getElementById("splitch").value="";
    document.getElementById("output").textContent="";
    document.getElementById("regex").value ="";
    document.getElementById("textarea").value="";
    document.getElementById("mod").value="";
}

function expression() {
    return document.getElementById("regex").value;
}

function spt(str){
    if(document.getElementById("splitch").value==""){
        return str;
    }else{
        let result = str.split(document.getElementById("splitch").value)
         return result;
    }
}
function mod(){
    return document.getElementById("mod").value;
}
