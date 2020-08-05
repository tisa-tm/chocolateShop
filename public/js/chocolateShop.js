function addNewItem(){
	var repeat = document.getElementById("repeat");
	var repeatedDiv = repeat.cloneNode(true);
	var parent = document.getElementById("parent");
	parent.appendChild(repeatedDiv);
}

function showCart(){
	var cart = document.getElementById("cart");
	cart.style.display = "block";
}

function closeCart(){
	var cart = document.getElementById("cart");
	cart.style.display = "none"; 
}

function closeCartQuantity(){
	var cartQuantity = document.getElementById("cartQuantity");
	cartQuantity.style.display = "none";
}

function closeMessage(){
	var message = document.getElementById("message");
	message.style.display = "none";
}

function addToCart(){
	var form = document.getElementById("addToCart");
	form.style.display = "block";
}

function alterChocolate(){
	var alter = document.getElementsByClassName("alter");
	for(i = 0; i<4 ; i++){
		alter[i].style.display = "block";
	}
	
	var initial = document.getElementsByClassName("initial");
	for(i = 0; i<4 ; i++){
		initial[i].style.display = "none"; 
	}	
}



	/*//creating required elements
	var parent = document.getElementById("parent");
	var div = document.createElement("DIV");
	var labelName = document.createElement("LABEL");
	var select = document.getElementById("select");
	var chocolateName = select.cloneNode(true);
	var options = document.getElementById("options");
	var quantity = document.createElement("INPUT");
	var labelQuantity = document.createElement("LABEL");
	var br = document.createElement("BR");
	var txt1 = document.createTextNode("Name of Item ");
	var txt2 = document.createTextNode(" Quantity ");

	//adding attribute to div element
	var attribute = document.createAttribute("class");
	attribute.value = "align";
	div.setAttributeNode(attribute);

	//adding attribute to input elements
	// var attribute1 = document.createAttribute("name");
	// attribute1.value = "chocolateName[]";
	// chocolateName.setAttributeNode(attribute1);
	var attribute2 = document.createAttribute("name");
	attribute2.value = "quantity[]";
	quantity.setAttributeNode(attribute2);

	//adding attribute to label elements
	var attribute3 = document.createAttribute("type");
	attribute3.value = "text";
	chocolateName.setAttributeNode(attribute3);
	var attribute4 = document.createAttribute("type");
	attribute4.value = "numeric";
	quantity.setAttributeNode(attribute4);

	//appending the created elements
	labelName.appendChild(txt1);
	labelQuantity.appendChild(txt2);
	// chocolateName.appendChild(options);
	div.appendChild(labelName);
	div.appendChild(chocolateName);
	div.appendChild(labelQuantity);
	div.appendChild(quantity);
	div.appendChild(br);
	parent.appendChild(div);*/