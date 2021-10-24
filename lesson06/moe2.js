/////////////////////////////////////////////////////////////////////
//     code for index.html
////////////////////////////////////////////////////////////////////
function userForm() {

    let userFName = document.getElementById("firstname").value;
    let userLName = document.getElementById("lastname").value;
    let userEmail = document.getElementById("email").value;
    let userAddress = document.getElementById("address").value;
    let userCity = document.getElementById("city").value;
    let userProvince = document.getElementById("province").value;

    let myForm = document.mainform;

    console.log(myForm.firstname.value, myForm.lastname.value);

    if (userFName == "" || userLName == "" || userEmail == "" || userAddress == "" || userCity == "" || userProvince == "") {
        alert("Please enter valid data inside the field!");
    } else {
        document.getElementById("fullname").innerText = userFName + ' ' + userLName;
        document.getElementById("email-address").innerText = userEmail;
        document.getElementById("addr").innerText = userAddress;
        document.getElementById("mship").innerText = myForm.member.value
    }
}

/////////////////////////////////////////////////////////////////////
//     code for excel.html
////////////////////////////////////////////////////////////////////
function myExcelFuns() {

    let numberStr = document.getElementById("numbers").value;
    console.log(numberStr);

    let myForm = document.mainform;
    let myResult = 0;
    var finalNumericArray = [];

    if (numberStr == "") {
        alert("Please enter valid space seperated number(s)  inside the field!");
    } else {
        numberStr = numberStr.trim();
        console.log(numberStr);

        var numberArr = numberStr.split(" ");
        console.log(numberArr);

        for (let i = 0; i < numberArr.length; i++) {
            if (numberArr[i] != "" && !isNaN(numberArr[i])) {

                finalNumericArray.push(Number(numberArr[i]));
                console.log(...finalNumericArray);

            }
        } // end of loop

        console.log(myForm.function.value);

        switch (myForm.function.value) {
            case "AutoSum":
                for (let i = 0; i < finalNumericArray.length; i++) {
                    myResult += finalNumericArray[i];
                }
                break;
            case "Average":
                for (let i = 0; i < finalNumericArray.length; i++) {
                    myResult += finalNumericArray[i];
                }
                myResult /= finalNumericArray.length;
                break;
            case "Max":
                myResult = Math.max(...finalNumericArray);
                break;
            case "Min":
                myResult = Math.min(...finalNumericArray);
                break;

        }
        document.getElementById("result").innerHTML = myResult;
    }
}

/////////////////////////////////// end