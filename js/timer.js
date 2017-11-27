/*

<div id="clock">
	<input type="number" id="hour" value="0" min="0" max="2"/>
	<input type="number" id="minute" value="0" min="0" max="59"/>
	<input type="number" id="second" value="0" min="0" max="59"/>

	<button onclick="timeout();">Try it</button>
    <button onclick="clearTime();">Stop it</button>
	
</div>

*/

function timeout(){
	document.getElementById("hour").readOnly = true;
    document.getElementById("minute").readOnly = true;
    document.getElementById("second").readOnly = true;
    
	var hour = parseInt(document.getElementById("hour").value);
    var minute = parseInt(document.getElementById("minute").value);
    var second = parseInt(document.getElementById("second").value);
    
    var total = (hour*3600 + minute*60 + second)*1000;
    //alert(total);
	time = setTimeout(myFunction, total);
}

function myFunction() {
    alert('Time\'s Up!');
    document.getElementById("hour").readOnly = false;
    document.getElementById("minute").readOnly = false;
    document.getElementById("second").readOnly = false;   
}

function clearTime(){
	clearTimeout(time);

	document.getElementById("hour").readOnly = false;
    document.getElementById("minute").readOnly = false;
    document.getElementById("second").readOnly = false;
    
    document.getElementById("hour").value = "0";
    document.getElementById("minute").value = "0";
    document.getElementById("second").value = "0";
}