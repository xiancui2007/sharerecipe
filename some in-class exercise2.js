var daysOfWeek = new Array("Monday","Tuesday","Wednesday", "Thursday", "Friday");

daysOfWeek.push("Saturday");

daysOfWeek.unshift("Sunday");
document.write(daysOfWeek+"<br/>");

//display a table
document.write("<table border=1><tr>");
for (var i = 0; i < daysOfWeek.length; i++){
document.write("<th>"+daysOfWeek[i]+"</th>");

}
document.write("</tr>");

for (var x = 0; x <30/7; x++){

	document.write("<tr>");

	for (var i = 0; i < 7 && (i+7*x+1)<31; i++){
		document.write("<td>"+(i+7*x+1)+"</td>");
	};

	if (i+7*x+1>=31) {
		for(k=i+7*x+1;k<36; k++){document.write("<td></td>")
			};	
		}
	document.write("</tr>");
	}
	