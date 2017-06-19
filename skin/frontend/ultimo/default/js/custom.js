function validate() {
    // check if input is bigger than 3
    var messages = document.getElementById('messages_product_view');
    var value = document.getElementById('reg_im').value;
    if (value.length < 15) {
        messages.innerHTML = '<p style="width:300px;padding:20px; background-color: indianred; color: darkred;">La longitud del texto introducido no es válida</p>';
        return false; // keep form from submitting
    }

    // else form is good let it submit, of course you will
    // probably want to alert the user WHAT went wrong.

    return true;
}


