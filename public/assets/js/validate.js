function validate() {
    let a = document.forms["myForm"]["name"].value;
    if (a === "") {
        alert("Укажите ваше имя");
        return false;
    }

    let b = document.forms["myForm"]["email"].value;
    if (b === "") {
        alert("Укажите ваш Е-майл");
        return false;
    }
}