// Create A request

var myRequest;
if (window.XMLHttpRequest){
    // if the browser support Chrome , Safari , Spark ,  IE 7+ , Firefox
    myRequest =  new XMLHttpRequest();
}
else{
    // if the browser is IE-6 , or any old browser
    myRequest =  new ActiveXobject ("Microsoft.XMLHTTP")
}
// the First Func in XMLHttpRequest is Open w dy liha 3 parameters
// Open (method :( $_GET | $_PSOST) * el tri2a el bnb3t biha * , URL *3noan el page* ,  asyn : (True | False) * bn7ddlh y3rd el page b3d ma ab3t el request wla y3rdha 3la tol *)
// hnb3t el request p method el get 
myRequest.open("GET","register.php?fname=Abokhaled",false);
// el 5toa dy lo ast5dmna el post lazm nb3tlh no3 el m7toa w ykon mnt4fr kda 3l4an dy Post method
myRequest.setRequestHeader("Content-Type","application/x-www-form-urlencodend");
// dy el method b2a el btb3t el request
myRequest.send();
// 3ndna input el id bta3h score w 3aizin ngib el value el fih
var score = document.getElementById("score");
// rg3holy f el request
score.innerHTML = myRequest.responseText;
