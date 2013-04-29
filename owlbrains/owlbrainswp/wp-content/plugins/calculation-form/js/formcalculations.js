/*
This source is shared under the terms of LGPL 3
www.gnu.org/licenses/lgpl.html

You are free to use the code in Commercial or non-commercial projects
*/

 //Set up an associative array
 //The keys represent the size of the cake
 //The values represent the cost of the cake i.e A 10" cake cost's $35
 var type = new Array();
 type["0"]=0;
 type["One Word Answer"]=0;
 type["Short Answer"]=50;
 type["Essay"]=150;
 
 //Set up an associative array 
 //The keys represent the filling type
 //The value represents the cost of the filling i.e. Lemon filling is $5,Dobash filling is $9
 //We use this this array when the user selects a filling from the form
 var grade_lvl= new Array();
 grade_lvl["K"]=0;
 grade_lvl["1"]=0;
 grade_lvl["2"]=0;
 grade_lvl["3"]=0;
 grade_lvl["4"]=0;
 grade_lvl["5"]=0;
 grade_lvl["6"]=0;
 grade_lvl["7"]=0;
 grade_lvl["8"]=0;
 grade_lvl["9"]=50;
 grade_lvl["10"]=50;
 grade_lvl["11"]=100;
 grade_lvl["12"]=100;
 grade_lvl["99"]=0;
 
 //set up subject array
 var subject = new Array();
 subject["0"]=0;
 subject["Math"]=0;
 subject["Science"]=0;
 subject["History"]=0;
 subject["English"]=0;
 subject["Literature"]=0;
 subject["Health"]=0;
 subject["Music"]=50;
 subject["Art"]=0;
 
	 
	 
// getCakeSizePrice() finds the price based on the size of the cake.
// Here, we need to take user's the selection from radio button selection
function getTypePrice()
{  
    var typePrice=0;
    //Get a reference to the form id="cakeform"
    var theForm = document.forms["myform"];
    //Get a reference to the cake the user Chooses name=selectedCake":
    var selectedType = theForm.elements["type"];
  typePrice = type[selectedType.value];
  
    //We return the cakeSizePrice
    return typePrice;
}

//This function finds the filling price based on the 
//drop down selection
function getGradePrice()
{
    var grade_lvl_price=0;
    //Get a reference to the form id="cakeform"
    var theForm = document.forms["myform"];
    //Get a reference to the select id="filling"
     var selectedGrade = theForm.elements["grade_lvl"];
     
    //set cakeFilling Price equal to value user chose
    //For example filling_prices["Lemon".value] would be equal to 5
    grade_lvl_price = grade_lvl[selectedGrade.value];

    //finally we return cakeFillingPrice
    return grade_lvl_price;
}

function getSubjectPrice()
{
    var subject_price=0;
    //Get a reference to the form id="cakeform"
    var theForm = document.forms["myform"];
    //Get a reference to the select id="filling"
     var selectedSubject = theForm.elements["subject"];
     
    //set cakeFilling Price equal to value user chose
    //For example filling_prices["Lemon".value] would be equal to 5
    subject_price = subject[selectedSubject.value];

    //finally we return cakeFillingPrice
    return subject_price;
}
        
function calculateTotal()
{
    //Here we get the total price by calling our function
    //Each function returns a number so by calling them we add the values they return together
    var basePrice =100;
    var total_price = getTypePrice() + getGradePrice() + getSubjectPrice() + basePrice;
    
    //display the result
    var divobj = document.getElementById('tp');
    divobj.style.display='block';
    divobj.innerHTML = "Your Question Will Cost <font size=5>" + total_price + " </font>Points";
	//sets the cost value on myform
	document.myform.cost.value = total_price;

}

function hideTotal()
{
    var divobj = document.getElementById('totalPrice');
    divobj.style.display='none';
}