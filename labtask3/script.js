let firstNumber = "";
let secondNumber = "";
let operator = "";

function appendDisplay(value) {

    if (value == "+" || value == "-" || value == "*" || value == "/") {

        if (firstNumber != "" && operator != "" && secondNumber != "") {
            calculate();
            firstNumber = document.getElementById("result").innerText;
            secondNumber = "";
        }

        operator = value;
        document.getElementById("input").innerText = firstNumber + " " + operator;
    }
    else {

        if (operator == "") {
            firstNumber = firstNumber + value;
            document.getElementById("input").innerText = firstNumber;
        } 
        else {
            secondNumber = secondNumber + value;
            document.getElementById("input").innerText = firstNumber + " " + operator + " " + secondNumber;
        }

    }
}

function calculate() {

    let num1 = parseFloat(firstNumber);
    let num2 = parseFloat(secondNumber);
    let result = 0;

    if (operator == "+") {
        result = num1 + num2;
    }
    else if (operator == "-") {
        result = num1 - num2;
    }
    else if (operator == "*") {
        result = num1 * num2;
    }
    else if (operator == "/") {
        result = num1 / num2;
    }

    document.getElementById("result").innerText = result;
}

function clearDisplay() {
    firstNumber = "";
    secondNumber = "";
    operator = "";

    document.getElementById("input").innerText = "";
    document.getElementById("result").innerText = "";
}