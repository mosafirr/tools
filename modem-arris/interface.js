window.onload = function () {
	"use strict";
	
	var start_year = document.getElementById('start-year');
	var start_month = document.getElementById('start-month');
	var start_day = document.getElementById('start-day');
	
	var end_year = document.getElementById('end-year');
	var end_month = document.getElementById('end-month');
	var end_day = document.getElementById('end-day');

	var today = new Date();
	start_year.value = end_year.value = today.getFullYear();
	start_month.value = end_month.value = today.getMonth() + 1; 
	start_day.value = end_day.value = today.getDate();

	var table = document.getElementById('password-list');
	var table_parent = table.parentNode;
	var table_template = table.cloneNode(true);
	
	var go = document.getElementById('go');
	go.onclick = function () {

		var start_date = new Date(start_year.value, start_month.value - 1, start_day.value, 0, 0, 0, 0);
		var end_date = new Date(end_year.value, end_month.value - 1, end_day.value, 0, 0, 0, 0);
		var passwords = GenArrisPasswords(start_date.getTime(), end_date.getTime());
		
		table_parent.removeChild(table);
		table_parent.appendChild(table_template.cloneNode(true));
		table = document.getElementById('password-list');
		
		var table_guts = document.createDocumentFragment();
		
		var row;
		var col1;
		var col2;
		
		for(var pass in passwords) {
			if (passwords.hasOwnProperty(pass)) {
				row = document.createElement('tr');
			
				col1 = document.createElement('td');
				col1.textContent = (new Date(parseInt(pass, 10))).toLocaleDateString();
				row.appendChild(col1);
			
				col2 = document.createElement('td');
				col2.textContent = passwords[pass];
				row.appendChild(col2);
			
				table_guts.appendChild(row);
			}
		}
		
		table.appendChild(table_guts);
	};
};
