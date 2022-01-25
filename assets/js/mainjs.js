//// Display text to guide the user for special product type
let productType = document.getElementById("productType");
const textProductUnit = document.querySelector("#textProductUnit");
let book = document.getElementById("#book");
productType.onchange = function (){
    if (productType.value === 'Book') {
        document.getElementById("book").style.display= "block";
        document.getElementById("DVD").style.display= "none";
        document.getElementById("furniture").style.display= "none";
        document.getElementById("weight").disabled = false;
        document.getElementById("typeBook").disabled = false;
        document.getElementById("size").disabled = true;
        document.getElementById("height").disabled = true;
        document.getElementById("width").disabled = true;
        document.getElementById("length").disabled = true;
        document.getElementById("typeDVD").disabled = true;
        document.getElementById("typeFurniture").disabled = true;
        textProductUnit.textContent =  'Please, provide weight in kg.';
    }
    if (productType.value === 'DVD-disk') {
        document.getElementById("DVD").style.display= "block";
        document.getElementById("book").style.display= "none";
        document.getElementById("furniture").style.display= "none";
        document.getElementById("size").disabled = false;
        document.getElementById("typeDVD").disabled = false;
        document.getElementById("weight").disabled = true;
        document.getElementById("height").disabled = true;
        document.getElementById("width").disabled = true;
        document.getElementById("length").disabled = true;
        document.getElementById("typeBook").disabled = true;
        document.getElementById("typeFurniture").disabled = true;
        textProductUnit.textContent =  'Please, provide size in mb.';
    }
    if (productType.value === 'Furniture') {
        document.getElementById("furniture").style.display= "block";
        document.getElementById("book").style.display= "none";
        document.getElementById("DVD").style.display= "none";
        document.getElementById("weight").disabled = true;
        document.getElementById("size").disabled = true;
        document.getElementById("height").disabled = false;
        document.getElementById("width").disabled = false;
        document.getElementById("length").disabled = false;
        document.getElementById("typeFurniture").disabled = false;
        document.getElementById("typeDVD").disabled = true;
        document.getElementById("typeBook").disabled = true;
        textProductUnit.textContent =  'Please, provide dimensions HxWxL.';
    }   
};
////Adding product form validation
const addForm  = document.getElementsByTagName('form')[0];

/// Regular reference of inputs sku, name , price , weight, size, height, width and length
const sku = document.getElementById('sku');
const name = document.getElementById('name');
const price = document.getElementById('price');
const weight = document.getElementById('weight');
const size = document.getElementById('size');
const height = document.getElementById('height');
const width = document.getElementById('width');
const length = document.getElementById('length');

let sku_value = document.forms["product_form"]["sku"].value;

let error = sku;
let error_name = name;
let error_price = price;
let error_weight = weight;
let error_size = size;
let error_height = height;
let error_width = width;
let error_length = length;

/**nextSibling can be a text-node or other node type
checking if elem is not null before accessing the style attribute. */
while ((error = error.nextSibling).nodeType !== 1);
while ((error_name = error_name.nextSibling).nodeType !== 1);
while ((error_price = error_price.nextSibling).nodeType !== 1);
while ((error_weight = error_weight.nextSibling).nodeType !== 1);
while ((error_size = error_size.nextSibling).nodeType !== 1);
while ((error_height = error_height.nextSibling).nodeType !== 1);
while ((error_width = error_width.nextSibling).nodeType !== 1);
while ((error_length = error_length.nextSibling).nodeType !== 1);

const isNumRegex=/^[0-9]+$/;///Regular exp for Checking for number
const isApphaNumRegex=/^[a-zA-Z0-9]+$/;//Regular exp for Checking for Appha-number

//addEvent Function to handle addEventListener method.
function addEvent (element, event, callback) {
    let previousEventCallBack = element["on"+event];
    
    element["on"+event] = function (e) {
    let output = callback(e);
    
    // A callback that returns `false` stops the callback chain
    // and interrupts the execution of the event callback.
    if (output === false) return false;

    if (typeof previousEventCallBack === 'function') {
      output = previousEventCallBack(e);
      if(output === false) return false;
    }
    };
};
//load css default class for sku, name, price , weight, size, height, width and length fields
addEvent(window, 'load', function () {
    sku.classList.add("default");
    name.classList.add("default");
    price.classList.add("default");
    weight.classList.add("default");
    size.classList.add("default");
    height.classList.add("default");
    width.classList.add("default");
    length.classList.add("default");
});
////rebuild our validation constraint for sku, name, price, weight, size, height, width and length fields
addEvent(window, 'load', function () {
  // Here, we test if the field is empty (remember, the field is not required)
  // If it is not, we check if its content is a well-formed e-mail address.
  if (sku.value.length === 0 || sku.value === null || sku.value.replace(/^\s+|\s+$/gm,'') === '' || sku.value.replace(/^\s+|\s+$/gm,'').length < 6 ||  sku.value.match(isNumRegex)) {
      sku.className = 'invalid';
  }else{
      sku.className = 'valid';
  }
  
  if (name.value.length === 0 || name.value === null || name.value.replace(/^\s+|\s+$/gm,'') === '' || name.value.replace(/^\s+|\s+$/gm,'').length < 2 || name.value.match(isNumRegex)) {
      name.className = 'invalid';
  }else{
      name.className = 'valid';
  }
  if (price.value === '0' || price.value.length === 0 || price.value === null || price.value.length < 1 || price.value.replace(/^\s+|\s+$/gm,'') === '' 
          || price.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !price.value.match(isNumRegex)) {
      price.className = 'invalid';
  }else{
      price.className = 'valid';
  }
  if (weight.value.length === 0 || weight.value === null || weight.value.length < 1 || weight.value.replace(/^\s+|\s+$/gm,'') === '' 
          || weight.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !weight.value.match(isNumRegex)) {
      weight.className = 'invalid';
  }else{
      weight.className = 'valid';
  }
  if (size.value.length === 0 || size.value === null || size.value.length < 1 || size.value.replace(/^\s+|\s+$/gm,'') === '' 
          || size.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !size.value.match(isNumRegex)) {
      size.className = 'invalid';
  }else{
      size.className = 'valid';
  }
  if (height.value.length === 0 || height.value === null || height.value.length < 1 || height.value.replace(/^\s+|\s+$/gm,'') === '' 
          || height.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !height.value.match(isNumRegex)) {
      height.className = 'invalid';
  }else{
      height.className = 'valid';
  }
  if (width.value.length === 0 || width.value === null || width.value.length < 1 || width.value.replace(/^\s+|\s+$/gm,'') === '' 
          || width.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !width.value.match(isNumRegex)) {
      width.className = 'invalid';
  }else{
      width.className = 'valid';
  }
  if (length.value.length === 0 || length.value === null || length.value.length < 1 || length.value.replace(/^\s+|\s+$/gm,'') === '' 
          || length.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !length.value.match(isNumRegex)) {
      length.className = 'invalid';
  }else{
      length.className = 'valid';
  }
});
// When the user try to enter sku in the field 
addEvent(sku, 'input', function (){
    if (sku.value.length === 0 || sku.value === null || sku.value.replace(/^\s+|\s+$/gm,'') === '' || sku.value.replace(/^\s+|\s+$/gm,'').length < 6 ||  sku.value.match(isNumRegex)) {
        sku.className = "invalid";
  } else {
      sku.className = "valid";
      error.textContent = "";
      error.className = "error"; 
  }
});
// When the user try to enter name in the field 
addEvent(name, 'input', function (){
    if (name.value.length === 0 || name.value === null || name.value.replace(/^\s+|\s+$/gm,'') === '' || name.value.replace(/^\s+|\s+$/gm,'').length < 2 || name.value.match(isNumRegex)) {
        name.className = "invalid";
  } else {
        name.className = "valid";
        error_name.textContent = "";
        error_name.className = "error"; 
  }
});
//Validate When the user try to enter price in the field 
addEvent(price, 'input', function (){
    if (price.value === '0' || price.value.length === 0 || price.value === null || price.value.length < 1 || price.value.replace(/^\s+|\s+$/gm,'') === '' 
          || price.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !price.value.match(isNumRegex)) {
        price.className = "invalid";
  } else {
        price.className = "valid";
        error_price.textContent = "";
        error_price.className = "error"; 
  }
});
//Validate When the user try to enter weight in the field 
addEvent(weight, 'input', function (){
    if ( weight.value=== 0 || weight.value.length === 0 || weight.value === null || weight.value.length < 1 || weight.value.replace(/^\s+|\s+$/gm,'') === '' 
          || weight.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !weight.value.match(isNumRegex)) {
        weight.className = "invalid";
  } else {
        weight.className = "valid";
        error_weight.textContent = "";
        error_weight.className = "error"; 
  }
});
//Validate When the user try to enter size in the field 
addEvent(size, 'input', function (){
    if (size.value=== 0 || size.value.length === 0 || size.value === null || size.value.length < 1 || size.value.replace(/^\s+|\s+$/gm,'') === '' 
          || size.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !size.value.match(isNumRegex)) {
        size.className = "invalid";
  } else {
        size.className = "valid";
        error_size.textContent = "";
        error_size.className = "error"; 
  }
});
//Validate When the user try to enter height  in the field 
addEvent(height, 'input', function (){
    if (height.value=== 0 || height.value.length === 0 || height.value === null || height.value.length < 1 || height.value.replace(/^\s+|\s+$/gm,'') === '' 
          || height.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !height.value.match(isNumRegex)) {
        height.className = "invalid";
  } else {
        height.className = "valid";
        error_height.textContent = "";
        error_height.className = "error"; 
  }
});
//Validate When the user try to enter  width in the field 
addEvent(width, 'input', function (){
    if (width.value.length === 0 || width.value === null || width.value.length < 1 || width.value.replace(/^\s+|\s+$/gm,'') === '' 
          || width.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !width.value.match(isNumRegex)) {
        width.className = "invalid";
  } else {
        width.className = "valid";
        error_width.textContent = "";
        error_width.className = "error"; 
  }
});
//Validate When the user try to enter  length in the field 
addEvent(length, 'input', function (){
    if (length.value.length === 0 || length.value === null || length.value.length < 1 || length.value.replace(/^\s+|\s+$/gm,'') === '' 
          || length.value.replace(/^\s+|\s+$/gm,'').length > 15 ||
          !length.value.match(isNumRegex)) {
        length.className = "invalid";
  } else {
        length.className = "valid";
        error_length.textContent = "";
        error_length.className = "error"; 
  }
});

// This defines what happens when the user tries to submit the data
addEvent(addForm, "submit", function () {
    let errors = 0;
    ///Submit Sku validation
    if (sku.value.length === 0 || sku.value === null || sku.value.replace(/^\s+|\s+$/gm,'') === '' || sku.value.replace(/^\s+|\s+$/gm,'').length < 6 ||  sku.value.match(isNumRegex)) {
        sku.className = "invalid";
        error.textContent = "Please, provide the data of string type in sku field!";
        error.className = "error active";
        errors +=1;
    } else {
        sku.className = "valid";
        error.textContent = "";
        error.className = "error";
     }
     ///Submit name validation
    if (name.value.length === 0 || name.value === null || name.value.replace(/^\s+|\s+$/gm,'') === '' || name.value.replace(/^\s+|\s+$/gm,'').length < 2 || name.value.match(isNumRegex)) {
        name.className = "invalid";
        error_name.textContent = "Please, provide the data of string type in name field!";
        error_name.className = "error active";
        errors +=1;
    } else {
        name.className = "valid";
        error_name.textContent = "";
        error_name.className = "error";
     }
    ///Submit price validation
    if (price.value === '0' || price.value.length === 0 || price.value=== 0 || price.value === null || price.value.replace(/^\s+|\s+$/gm,'') === '' || price.value.replace(/^\s+|\s+$/gm,'').length < 1 || price.value.replace(/^\s+|\s+$/gm,'').length > 15 || !price.value.match(isNumRegex)) {
        price.className = "invalid";
        error_price.textContent = "Please, provide the data of number type in price field!";
        error_price.className = "error active";
        errors +=1;
    } else {
        price.className = "valid";
        error_price.textContent = "";
        error_price.className = "error";
    }
    
    ///Submit weight validation
    if(weight.disabled === false){
        if (weight.value.length === 0 || weight.value === null || weight.value.replace(/^\s+|\s+$/gm,'') === '' || weight.value.replace(/^\s+|\s+$/gm,'').length < 1 || weight.value.replace(/^\s+|\s+$/gm,'').length > 15 || !weight.value.match(isNumRegex)) {
            weight.className = "invalid";
            error_weight.textContent = "Please, provide the data of number type in weight field!";
            error_weight.className = "error active";
            errors +=1;
        } else {
            weight.className = "valid";
            error_weight.textContent = "";
            error_weight.className = "error";
        }
    }
    ///Submit size validation
    if(size.disabled === false){
        if (size.value.length === 0 || size.value === null || size.value.replace(/^\s+|\s+$/gm,'') === '' || size.value.replace(/^\s+|\s+$/gm,'').length < 1 || size.value.replace(/^\s+|\s+$/gm,'').length > 15 || !size.value.match(isNumRegex)) {
            size.className = "invalid";
            error_size.textContent = "Please, provide the data of number type in size field!";
            error_size.className = "error active";
            errors +=1;
        } else {
            size.className = "valid";
            error_size.textContent = "";
            error_size.className = "error";
        }
    }
    ///Submit  height validation
    if(height.disabled === false){
        if (height.value.length === 0 || height.value === null || height.value.replace(/^\s+|\s+$/gm,'') === '' || height.value.replace(/^\s+|\s+$/gm,'').length < 1 || height.value.replace(/^\s+|\s+$/gm,'').length > 15 || !height.value.match(isNumRegex)) {
            height.className = "invalid";
            error_height.textContent = "Please, provide the data of number type in size field!";
            error_height.className = "error active";
            errors +=1;
        } else {
            height.className = "valid";
            error_height.textContent = "";
            error_height.className = "error";
        }
    }
    ///Submit  width validation
    if(width.disabled === false){
        if (width.value.length === 0 || width.value === null || width.value.replace(/^\s+|\s+$/gm,'') === '' || width.value.replace(/^\s+|\s+$/gm,'').length < 1 || width.value.replace(/^\s+|\s+$/gm,'').length > 15 || !width.value.match(isNumRegex)) {
            width.className = "invalid";
            error_width.textContent = "Please, provide the data of number type in size field!";
            error_width.className = "error active";
            errors +=1;
        } else {
            width.className = "valid";
            error_width.textContent = "";
            error_width.className = "error";
        }
    }
    ///Submit  length  validation
    if(length.disabled === false){
        if (length.value.length === 0 || length.value === null || length.value.replace(/^\s+|\s+$/gm,'') === '' || length.value.replace(/^\s+|\s+$/gm,'').length < 1 || length.value.replace(/^\s+|\s+$/gm,'').length > 15 || !length.value.match(isNumRegex)) {
            length.className = "invalid";
            error_length.textContent = "Please, provide the data of number type in size field!";
            error_length.className = "error active";
            errors +=1;
        } else {
            length.className = "valid";
            error_length.textContent = "";
            error_length.className = "error";
        }
    }

     
    ///Return false if there are any errors in the fields of the form then prevent the form from submission
    if (errors > 0) {
        return false;
    }else { 
        sku.className = "valid";
        name.className = "valid";
        price.className = "valid";
        weight.className = "valid";
        size.className = "valid";
        height.className = "valid";
        width.className = "valid";
        length.className = "valid";
        
        error.textContent = "";
        error_name.textContent = "";
        error_price.textContent = "";
        error_weight.textContent = "";
        error_size.textContent = "";
        error_height.textContent = "";
        error_width.textContent = "";
        error_length.textContent = "";
         
        error.className = "error";
        error_name.className = "error";
        error_price.className = "error";
        error_weight.className = "error";
        error_size.className = "error";
        error_height.className = "error";
        error_width.className = "error";
        error_length.className = "error";
        return true;
    }
});