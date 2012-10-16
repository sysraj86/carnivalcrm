function clearForm(form) {
    clearInputTexts(form.getElementsByTagName('input'));
    clearSelects(form.getElementsByTagName('select'));
}

function clearInputTexts(inputs) {
    for (i = 0; i < inputs.length; i++)
        if (inputs[i].type == 'text' || inputs[i].id == 'sendby_id')
            inputs[i].value = '';
}

function clearSelects(selects) {
    for (i = 0; i < selects.length; i++){
       selects[i].selectedIndex = -1;
    }
        
}