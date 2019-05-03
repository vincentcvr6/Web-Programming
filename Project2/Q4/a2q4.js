var names = new array();
function a2q4(names){

  var count = 0;
  var p;

  for(p=0;p<names.length;p++){
    if(names[p].substring(0,2)=="po" || names[p].substring(0,2)=="pa"){
      if(names[p].search("u")==-1){
        count++;
      }
    }
  }
    document.write("The number of words starting with 'pa' or 'po' and not containing the letter 'u' is: "+ count);
}
