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

// $('#result').val('test');
function onScanSuccess(decodedText, decodedResult) {
    // alert(decodedText);
    $('#result').val(decodedText);
    let id = decodedText;
    console.log(decodedText);
    html5QrcodeScanner.clear().then(_ => {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('store') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                data: id // Utilisation de "data" au lieu de "qr_code"
            },
            success: function(response) {
                console.log(' Donnees recues: '+response);
                if (response.status == 200) {
                    document.getElementById("info-etu").style.display = "block";
                    let etudiant = response.data.etudiant;
                    let releve = response.data.releve;
                    console.log(etudiant[0]);
                    const nom = document.getElementById("nom");
                    const prenom = document.getElementById("pre");
                    const matricule = document.getElementById("mat");
                    const niveau = document.getElementById("niv");
                    const filiere = document.getElementById("fil");
                    const mgp = document.getElementById("mgp");
                    const decision = document.getElementById("dec");
                    const numero = document.getElementById("num");
                    nom.innerHTML = "<strong>Last Name :</strong> " + etudiant.nom;
                    prenom.innerHTML = "<strong>First Name:</strong> " + etudiant.prenom;
                    matricule.innerHTML = "<strong>Registration:</strong> " + etudiant.matricule;
                    niveau.innerHTML = "<strong>Level :</strong> " + releve.niveau;
                    filiere.innerHTML = "<strong>Discipline :</strong> " + releve.filiere;
                    numero.innerHTML = "<strong>Document number  :</strong> " + releve.id_releve;
                    mgp.innerHTML = "<strong>Mgp :</strong> " + releve.mgp;
                    decision.innerHTML = "<strong>" + releve.decision + "</strong>";
                    let id_releve = document.getElementById("id_releve");
                    let niveau_ = document.getElementById("niveau");
                    let matri = document.getElementById("matricule");
                    document.getElementById("type").value = response.type;
                    id_releve.value = releve.id_releve;

                    niveau_.value = releve.niveau;

                    matri.value = releve.etudiant;

                    let message = document.getElementById("message");
                    // message.textContent = "Authentic document"
                    // message.style.color = 'green';
                    $('#modalAuthentique').modal('show');
                    document.getElementById("mon-formulaire").style.display = "block";

                } else if (response.status == 400) {
                    let message = document.getElementById("message");
                    // message.style.color = 'red';
                    // message.textContent = "Document non authentique"
                    // Trouver la fenêtre modale par son ID
                    var modal = document.getElementById('exampleModal');

                    // Créer un nouvel objet Modal à partir de la fenêtre modale
                    var modalInstance = new bootstrap.Modal(modal);

                    // Ouvrir la fenêtre modale
                    modalInstance.show();
                    document.getElementById("mon-formulaire").style.display = "none";
                } else if (response.status == 402) {
                    // alert('Impossible de dechiffrer les informations contenues dans le Qr code!');
                    let message = document.getElementById("message");
                    message.style.color = 'red';
                    message.textContent = "Impossible to decipher the information contained in the Qr code!"
                    document.getElementById("mon-formulaire").style.display = "none";
                }

            }
        });
    }).catch(error => {
        alert('something wrong');
    });

}

function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    // console.warn(`Code scan error = ${error}`);
}

function fermerFenetreModale() {
    // Fermer la fenêtre modale en utilisant la méthode 'modal' de Bootstrap avec l'argument 'hide'
    $('#exampleModal').modal('hide');
}

function fermerFenetreModaleAuthentique() {
    // Fermer la fenêtre modale en utilisant la méthode 'modal' de Bootstrap avec l'argument 'hide'
    $('#modalAuthentique').modal('hide');
}

let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
        fps: 10,
        qrbox: {
            width: 250,
            height: 250
        }
    },
    /* verbose= */
    false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);

function scanner() {
    // document.getElementById("mon-formulaire").style.display = "none";
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    let message = document.getElementById("message");
    message.textContent = ""
    document.getElementById('info-etu').style.display = "none";
}


pdfcrowd.enableLinks(false); // Optionnel : désactiver les liens dans le PDF
pdfcrowd.setApiToken('YOUR_API_KEY');

var htmlContent = '<html><body><h1>Exemple de Document PDF</h1><p>Ceci est un exemple de contenu HTML converti en PDF avec PDFcrowd.</p></body></html>';

pdfcrowd.convertHtml(htmlContent, {filename: 'exemple.pdf'}, function(pdfStream) {
    var blob = new Blob([pdfStream], {type: 'application/pdf'});
    var url = URL.createObjectURL(blob);
    window.open(url);
});






"use strict";

