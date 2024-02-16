const formValidation = (textArea, radios) => {
    const value = Array.from(radios).find(radio => radio.checked);

    console.log(value);
    if (textArea.value.length != 0 && value != undefined) {
        return true;
    } else {
        return false;
    }
}