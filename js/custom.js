function init()
{

	//some random names : 
	var names = ["John Doe", "Emir Ombasic", "Robert Niche", "Indiana Jones",
				 "Andro Indigo", "Albert Einstein", "Michael Duglas", "Tinki Winky"];

	//create the table DOM element 
	var table = document.createElement('table');
	
	
	//the table header :
	var rowH = document.createElement('tr');
	var cell = document.createElement('th');
		var id = document.createElement('p');
			var id_text = document.createTextNode("ID");
			id.appendChild(id_text);
		cell.appendChild(id);
	rowH.appendChild(cell);
	
	var cell2 = document.createElement('th');
		var id = document.createElement('p');
			var id_text = document.createTextNode("Name");
			id.appendChild(id_text);
		cell2.appendChild(id);
	rowH.appendChild(cell2);
	
	var cell3 = document.createElement('th');
		var id = document.createElement('p');
			var id_text = document.createTextNode("E-mail");
			id.appendChild(id_text);
		cell3.appendChild(id);
	rowH.appendChild(cell3);
	
	table.appendChild(rowH);
	
	
	//body of the table :
	for(i=1;i<9;i++){
		var row = document.createElement('tr');
		if(i%2 == 0) row.className = "second";
		
			var cell = document.createElement('td');
				var id = document.createElement('p');
					var id_text = document.createTextNode(i+".");
					id.appendChild(id_text);
				cell.appendChild(id);
			row.appendChild(cell);
			
			var random_name = names[Math.floor(Math.random()*8)]
			var cell2 = document.createElement('td');
				var name = document.createElement('p');
					var name_text = document.createTextNode(random_name);
					name.appendChild(name_text);
				cell2.appendChild(name);
			row.appendChild(cell2);
			
			var cell3 = document.createElement('td');
				var mail = document.createElement('a');
				mail_text = (random_name.toLowerCase() + "@google.com").replace(" ",".")
				mail.innerHTML  = mail_text;
				mail.href = "mailto:"+mail_text;
				cell3.appendChild(mail);
			row.appendChild(cell3);
			
		table.appendChild(row);
	}
	
	//append the table to #main element :
	document.getElementById('main').appendChild(table); 
	
}