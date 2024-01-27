/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

document.getElementById('dynamicCombo').addEventListener('change', function() {
    var currentValue = this.value;
    var optionExists = false;
    var options = document.getElementById('dynamicOptions').getElementsByTagName('option');
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === currentValue) {
            optionExists = true;
            break;
        }
    }
    if (!optionExists) {
        var newOption = document.createElement('option');
        newOption.value = currentValue;
        document.getElementById('dynamicOptions').appendChild(newOption);
    }
});


document.getElementById('dynamicCombo1').addEventListener('change', function() {
    var currentValue = this.value;
    var optionExists = false;
    var options = document.getElementById('dynamicOptions1').getElementsByTagName('option1');
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === currentValue) {
            optionExists = true;
            break;
        }
    }
    if (!optionExists) {
        var newOption = document.createElement('option1');
        newOption.value = currentValue;
        document.getElementById('dynamicOptions1').appendChild(newOption);
    }
});




"use strict";

