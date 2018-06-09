<!DOCTYPE html>
<html>
<head>
 <script>
 function myFunction() {
     document.getElementById("dem").innerHTML = "Paragraph changed.";
 }
 </script>
 </head>

<body>

                            <button class="btn btn-danger" name="delete"><i class="glyphicon glyphicon-trash">glyphicon</i></button>
<p id="p1">Please locate where 'locate' occurs!.</p>

<button onclick="myFunction()">Try it</button>

<p id="demo"></p>
<p>Math.floor() combined with Math.random() can return random integers.</p>

<button onclick="myFunction()">random integer</button>

<p id="demk"></p>

<p id="demm"></p>
<p id="demmm"></p>
<p id="demp"></p>
<p id="demy"></p>
<p id="demt"></p>
<u><p id="demq"></p></u>
<i><p id="dema"></p></i>
<p>The length property returns the length of an array.</p>

<p id="demn"></p><br>

<p>Adding elements with high indexes can create undefined "holes" in an array.</p>

<button onclick="myFunctiono()">array</button>

<p id="kai"></p>

<p>The best way to loop through an array is using a standard for loop:</p>

<button onclick="myFunctionn()">LOOP</button>

<p id="demob"></p>

<p id="dark"></p>

<p>The splice() method adds new elements to an array.</p>

<button onclick="myFunctionA()">SPLICE()</button>

<p id="DELL"></p>

<p>Click the button to sort the array in descending order.</p>

<button onclick="myFunctionk()">arraydescending</button>

<p id="demooo"></p>


<p>Click the button to join three arrays.</p>

<button onclick="myFunctionf()">join three arrays</button>

<p id="demosa"></p>

<p>The slice() method slices elements from an array.</p>

<button onclick="myFunctionna()"> slices elements from an array</button>

<p id="demoos"></p>

<script>
function myFunctionna() {
    var fruits = ["Banana", "Orange", "Lemon", "Apple", "Mango"];
    var citrus = fruits.slice(1,3); // where 1 represent the starting point and 3 means it should pick two elements
    document.getElementById("demoos").innerHTML = citrus;
}
</script>

<script>
function myFunctionf() {
    var arr1 = ["Cecilie", "Lone"];
    var arr2 = ["Emil", "Tobias", "Linus"];
    var arr3 = ["Robin", "Morgan"];
    document.getElementById("demosa").innerHTML =
    arr1.concat(arr2, arr3);
}
</script>

<script>
var points = [40, 100, 1, 5, 25, 10];
document.getElementById("demooo").innerHTML = points;

function myFunctionk() {
    points.sort(functionk(a, b){return b-a});
    document.getElementById("demooo").innerHTML = points;
}
</script>

<script>
var fruits = ["Banana", "Orange", "Apple", "Mango"];
document.getElementById("DELL").innerHTML = fruits;
function myFunctionA() {
    fruits.splice(2, 0, "Lemon", "Kiwi");  // The first parameter (2) defines the position where new elements should be added (spliced in).The second parameter (0) defines how many elements should be removed. The rest of the parameters ("Lemon" , "Kiwi") define the new elements to be added.
    document.getElementById("DELL").innerHTML = fruits;
}
</script>

<script>
var person = [];
person[0] = "John";
person[1] = "Doe";
person[2] = 46; 
document.getElementById("dark").innerHTML =
person[0] + " " + person.length;


var person = [];
 person["firstName"] = "John";
 person["lastName"] = "Doe";
 person["age"] = 46;
var x = person.length;         // person.length will return 0
var y = person[0];             // person[0] will return undefined
</script>

<script>
function myFunctionn() {
    var index;
    var text = "<ul>";
    var fruits = ["Banana", "Orange", "Apple", "Mango"];
    for (index = 0; index < fruits.length; index++) {
        text += "<li>" + fruits[index] + "</li>";
    }
    text += "</ul>";
    document.getElementById("demob").innerHTML = text;
}
</script>


<script>
var fruits = ["Banana", "Orange", "Apple", "Mango"];
document.getElementById("kai").innerHTML = fruits;

function myFunctiono() {
    fruits[10] = "Lemon";
    document.getElementById("kai").innerHTML = fruits[8];
}
</script>

<script>
var fruits = ["Banana", "Orange", "Apple", "Mango"];
document.getElementById("demn").innerHTML = fruits.length;

</script>

<p>The length property provides an easy way to append new elements to an array without using the push() method.</p>

<button onclick="myFunctions()">Try it</button>

<p id="demgg"></p>

<script>
var fruits = ["Banana", "Orange", "Apple", "Mango"];
document.getElementById("demo").innerHTML = fruits;

function myFunctions() {
    fruits[fruits.length] = "Kiwi";
    document.getElementById("demgg").innerHTML = fruits;
}
</script>

 <script>
 /*
 Access the Elements of an Array

You refer to an array element by referring to the index number.

This statement access the value of the first element in myCars:


var name = cars[0];
 */
 
 //array
 var cars = ["Saab", "Volvo", "BMW"];
 document.getElementById("dema").innerHTML = cars;
// Objects use names to access its "members". In this example, person.firstName returns John:
 var person = {firstName:"John", lastName:"Doe", age:46};
 
 
 
 //  JavaScript counts months from 0 to 11. January is 0. December is 11. 
 var today, someday, text;
today = new Date();
someday = new Date();
 someday.setFullYear(2100, 0, 14);

if (someday > today) {
    text = "Today is before January 14, 2100.";
} else {
    text = "Today is after January 14, 2100.";
}
document.getElementById("demq").innerHTML = text;
 
 
 
d = new Date();
 document.getElementById("demm").innerHTML = d.toString();
 document.getElementById("demmm").innerHTML = d.toUTCString();
 document.getElementById("demp").innerHTML = d.toDateString("d-m-y");
 document.getElementById("demy").innerHTML = d.getDay();
 var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
 document.getElementById("demt").innerHTML = days[d.getDay()];


 </script>

<script>
function myFunction() {
    document.getElementById("demk").innerHTML =
    Math.floor(Math.random() * 11);
}
</script>

<script>
function myFunction() {
    var str = document.getElementById("p1").innerHTML;
    var pos = str.search("where");
    document.getElementById("demo").innerHTML = pos;
}

/*
Extracting String Parts

There are 3 methods for extracting a part of a string:
•slice(start, end)
•substring(start, end)
•substr(start, length)
 
var txt = "a,b,c,d,e";   // String
 txt.split(",");          // Split on commas
 txt.split(" ");          // Split on spaces
 txt.split("|");          // Split on pipe
 
 var x = 100 / "Apple";  // x will be NaN (Not a Number)
 
 var x = 100 / "10";     // x will be 10
 
 var x = 100 / "Apple";
  isNaN(x);               // returns true because x is Not a Number

  var x = 123;              
 var y = new Number(123);
(x === y) // is false because x is a number and y is an object. 
  
var str = "HELLO WORLD";
 str.charAt(0);            // returns H 
 
 var str = "HELLO WORLD";

 str.charCodeAt(0);         // returns 72

var text1 = "Hello";
 var text2 = "World";
 text3 = text1.concat(" ",text2); 

var text1 = "Hello World!";       // String
 var text2 = text1.toUpperCase();  // text2 is text1 converted to upper
 var text2 = text1.toLowerCase();  // text2 is text1 converted to lower 

str = "Please visit Microsoft!";
 var n = str.replace("Microsoft","W3Schools");

*\
</script>

<h1 id="demoS">My Web Page</h1>

<p id="dem">A Paragraph</p>
<p id="dem1">A parosy</p><br>

<p id="dem3">locate vbhjkhbhjb v</p>
<button type="button" onclick="myFunction()">change</button>
<button onclick='getElementById("dem1").innerHTML=Date()'>The time is?</button>
<button onmouseover ='getElementById("dem1").innerHTML=Date()'>The time is?</button>
<button onload ='getElementById("dem1").innerHTML=Date()'>The time is?</button>
<button onclick="this.innerHTML=Date()">The time is?</button>

<script>
//The === operator expects equality in both type and value
//When using the == equality operator, equal strings looks equal:

var str = "Please locate where 'locate' occurs!";
var str = "Please locate where 'locate' occurs!";
 var pos = str.indexOf("please");
 
 var str = "Please locate where 'locate' occurs!";
 var pos = str.search("locate");

document.write(5 + 6);
document.getElementById("demoS").innerHTML=5 + 6;
console.log(5 + 6);

var person = {
     firstName:"John",
     lastName:"Doe",
     age:50,
     eyeColor:"blue"
 };
 //ACESSING OBJECT PROPERTIES
 // you can now acces the object in two ways 
 document.getElementById("dem1").innerHTML= person.firstName; //OR
 document.getElementById("dem").innerHTML= person["firstName"];
 
 //Accessing Object Methods
 //You access an object method with the following syntax:
  document.getElementById("dem1").innerHTML= person.lastName(); //OR 	
  
  var x = new String();        // Declares x as a String object
 var y = new Number();        // Declares y as a Number object
 var z = new Boolean();       // Declares z as a Boolean object 
 
</script>
 <button onclick="document.write(5 + 6)">Try it</button>

  */
  
  <p>Input your age and click the button:</p>

<input id="age" value="18" />

<button onclick="myFunctionvam()">confirm</button>

<p id="demoka"></p>


<script>
function myFunctionvam() {
    var age,voteable;
    age = document.getElementById("age").value;
    voteable = (age < 18) ? "Too young":"Old enough";
    document.getElementById("demoka").innerHTML = voteable + " to vote.";
}
</script>

<p>Click the button to get a time-based greeting:</p>

<button onclick="myFunctionkais()">time-based greeting</button>

<p id="demonam"></p>

<script>
function myFunctionkais() {
    var greeting;
    var time = new Date().getHours();
    if (time < 10) {
        greeting = "Good morning";
    } else if (time < 20) {
        greeting = "Good day";
    } else {
        greeting = "Good evening";
    }
document.getElementById("demonam").innerHTML = greeting;
}
</script>

<p>Click the button to display what day it is today:</p>

<button onclick="myFunctionnnam()">what day it is today</button>

<p id="demokda"></p>

<script>
function myFunctionnnam() {
    var day;
    switch (new Date().getDay()) {
        case 0:
            day = "Sunday";
            break;
        case 1:
            day = "Monday";
            break;
        case 2:
            day = "Tuesday";
            break;
        case 3:
            day = "Wednesday";
            break;
        case 4:
            day = "Thursday";
            break;
        case 5:
            day = "Friday";
            break;
        case  6:
            day = "Saturday";
            break;
		default: 
        day = "Looking forward to the Weekend";
    }
    document.getElementById("demokda").innerHTML = "Today is " + day;
}
</script>


<p>Click the button to display a message based on what day it is:</p>

<button onclick="myFunctionnav()">display a message based on what day it is</button>

<p id="embark"></p>

<script>
function myFunctionnav() {
    var text;
    switch (new Date().getDay()) {
        case 1:
        case 2:
        case 3:
        default:
            text = "Looking forward to the Weekend";
            break;
        case 4:
        case 5:
            text = "Soon it is Weekend";
            break;
        case 0:
        case 6:
            text = "It is Weekend";
    }
    document.getElementById("embark").innerHTML = text;
}
</script>

<p>Click the button to loop through a block of code five times.</p>

<button onclick="myFunctionvan()">for loop</button>

<p id="forloop"></p>

<script>
function myFunctionvan() {
    var text = "";
    var i;
    for (i = 0; i < 5; i++) {
        text += "The number is " + i + "<br>";
    }
    document.getElementById("forloop").innerHTML = text;
}
</script>
<i>for loop in array output</i>
<p id="floopexample"></p>

<script>
cars = ["BMW", "Volvo", "Saab", "Ford"];
var i;
for (i = 0, l = cars.length, text = ""; i < l; i++) {
    text += cars[i] + "<br>";
}

document.getElementById("floopexample").innerHTML = text;
</script>
<i>for loop in to echo array  through the properties of an object output</i>
<p id="el"></p>

<script>
var txt = "";
var person = {fname:"John", lname:"Doe", age:25}; 
var x;
for (x in person) {
    txt += person[x] + " ";
}
document.getElementById("el").innerHTML = txt;
</script>
<i>while loop in an array</i>
<p id="whileloop"></p>

<script>
cars = ["BMW","Volvo","Saab","Ford"];
var i = 0;
var text = "";
while (cars[i]) {
    text += cars[i] + "<br>";
    i++;
}
document.getElementById("whileloop").innerHTML = text;
</script>

<p>Search a string for "w3Schools", and display the position of the match:</p>

<button onclick="myFunctionnot()">search</button>

<p id="search"></p>

<script>
function myFunctionnot() {
    var str = "Visit W3Schools!"; 
    var n = str.search(/w3Schools/i);
    document.getElementById("search").innerHTML = n;
}
</script>


<p>Search a string for "W3Schools", and display the position of the match:</p>

<button onclick="searchAgain()">searchAgain</button>

<p id="searchAgain"></p>

<script>
function searchAgain() {
    var str = "Visit W3Schools!"; 
    var n = str.search("W3Schools");
    document.getElementById("searchAgain").innerHTML = n;
}
</script>


<p>Replace "microsoft" with "W3Schools" in the paragraph below:</p>

<button onclick="strreplace()">strreplace</button>

<p id="strreplace">Please visit Microsoft!</p>

<script>
function strreplace() {
    var str = document.getElementById("strreplace").innerHTML; 
    var txt = str.replace(/microsoft/i,"W3Schools"); //i Perform case-insensitive matching
	//g	Perform a global match (find all matches rather than stopping after the first match
	// m	Perform multiline matching
	
	/*
		\d	Find a digit
		\s	Find a whitespace character
		\b	Find a match at the beginning or at the end of a word
		
		Quantifier	Description
		n+			Matches any string that contains at least one n
		n*			Matches any string that contains zero or more occurrences of n
		n?			Matches any string that contains zero or one occurrences of n
	
	*/

    document.getElementById("strreplace").innerHTML = txt;
}
</script>

<p>Search for an "e" in the next paragraph:</p>

<p id="p01">The best things in life are free!</p>

<button onclick="myunction()">Search for an "e"</button>

<p id="get_e"></p>

<script>
function myunction() {
    text = document.getElementById("p01").innerHTML; 
    document.getElementById("get_e").innerHTML = /e/.test(text);
}

/*
Using exec()
The exec() method is a RegExp expression method.

It searches a string for a specified pattern, and returns the found text.

If no match is found, it returns null.

The following example searches a string for the character "e":
*/

</script>

<p>Search for an "e" in the next paragraph:</p>

<p id="p01">searching</p>

<button onclick="myFuncion()">searching</button>

<p id="searching"></p>

<script>
function myFuncion() {
    text = document.getElementById("p01").innerHTML; 
    document.getElementById("searching").innerHTML = /e/.exec(text);
}

</script>

<p>Please input a number between 5 and 10:</p>

<input id="throwcatch" type="text">
<button type="button" onclick="myFunctiontry()">Test Input</button>
<p id="message"></p>

<script>
function myFunctiontry() {
    var message, x;
    message = document.getElementById("message");
    message.innerHTML = "";
    x = document.getElementById("throwcatch").value;
    try { 
        x = Number(x);
        if(x == "") throw "is empty";
        if(isNaN(x)) throw "is not a number";
        if(x > 10) throw "is too high";
        if(x < 5) throw "is too low";
    }
    catch(err) {
        message.innerHTML = "Input " + err;
    }
    finally {
        document.getElementById("demo").value = "";
    }
}
</script>

<h1>My First Web Page</h1>

<script>
a = 5;
b = 6;
c = a + b;
console.log(c);
</script>

<script>
window.onload = downScripts;

function downScripts() {
    var element = document.createElement("script");
    element.src = "myScript.js";
    document.body.appendChild(element);
}
</script>

<p>A script on this page starts this clock:</p>

<p id="demark"></p>

<script>
var myVar=setInterval(function(){myTimer()},1000);

function myTimer() {
    var d = new Date();
    document.getElementById("demark").innerHTML = d.toLocaleTimeString();
}
</script>

</body>
 </html> 
	