var colorset = ['#ffffcc','#fff2cc','#ffe6cc','#ffd9cc','#ffcccc'];
var num = 0;

function bgplus(){
	num++;
	document.getElementById('div-resp-id').style.backgroundColor = colorset[num];
	
}
function bgminus(){
	num--;
	document.getElementById('div-resp-id').style.backgroundColor = colorset[num];
}