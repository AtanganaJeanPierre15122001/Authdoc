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


document.addEventListener('DOMContentLoaded', function() {
    var downloadButton = document.getElementById('downloadButton');

    downloadButton.addEventListener('click', function() {
        var content = document.querySelector('.contents').innerHTML;
        console.log('ok');

        var printWindow = window.open('', 'Auth.doc');
        printWindow.document.write('<html><head><title>Auth.doc</title>');
        printWindow.document.write(
            '<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />');
        printWindow.document.write(
            '<link href="assets/css/card.css" rel="stylesheet" type="text/css" />');
        printWindow.document.write(
            '<style> @page { size: A4; margin: 0; } body { margin: 1cm; }</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<div class="print-page">' + content + '</div>');
        printWindow.document.write('</body></html>');

        printWindow.document.close();

        // Attendre que le contenu soit chargé dans la fenêtre d'impression
        printWindow.onload = function() {
            var printDocument = printWindow.document.documentElement;
            var printPage = printDocument.querySelector('.print-page');

            // Calculer la hauteur maximale d'une page A4
            var pageHeight = 11.7 * 96; // Hauteur en pixels

            // Réduire la hauteur des éléments pour s'adapter à une seule page
            var elements = printPage.querySelectorAll('*');
            for (var i = 0; i < elements.length; i++) {
                var element = elements[i];
                var elementHeight = element.offsetHeight;
                if (elementHeight > pageHeight) {
                    element.style.height = pageHeight + 'px';
                }
            }

            // Appeler la fonction d'impression de la fenêtre d'impression
            printWindow.print();
        };
    });
});




"use strict";

