
function confirmation(){
	Check=confirm("Etes vous sur?");
	return Check;
}


function formatPrix(total) {
	var tableau1 = total.split("");
	var tableau2 = [];
	var j = 1;
	for(var i=tableau1.length-1; i>=0;i--){
		tableau2.push(tableau1[i]);
		if(j%3==0 && i>0 && (tableau1[i-1] != "-")){
			tableau2.push(" ");
		}
		j++;
	}	
	tableau2.reverse();
	total = tableau2.join("");
    return total;
}

function comp_date(date1,date2){
	/((.+)\\)?(.+)\.([a-z]{1,7})$/.exec($("#"+nom2).val());
    var nom=new String(RegExp.$3);
	nom1=$("#"+nom1).text().trim();
	if(nom1==nom){
		return true;
	}
	else{
		alert('Les noms des fichiers sont différents');
		return false;
	}
}