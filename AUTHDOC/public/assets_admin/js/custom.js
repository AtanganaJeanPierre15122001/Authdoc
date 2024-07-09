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






var decodeT;
function onScanSuccess(decodedText, decodedResult) {
    $('#continue').prop('disabled', true);
    // alert(decodedText);
    $('#result').val(decodedText);
    decodeT = decodedText;
    console.log(decodedText);

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/qr",
            method: "POST",
            dataType: 'json',
            data: {
                data: decodeT
            },
            success: function(response) {
                console.log(' Donnees recues: ' + response['statut']);
                if (response['statut'] === 200) {
                    swal({
                        title: "QR Code authentique! Veillez passer a la prochaine étape",
                        text: `Id releve: ${response.data.releve.id_releve}\nNom: ${response.data.etudiant.nom}\nPrénom: ${response.data.etudiant.prenom}\nMatricule: ${response.data.matricule}\nNiveau: ${response.data.niv.nom_niveau}\nMgp: ${response.data.releve.moy_gen_pon}\nFiliere: ${response.data.releve.filiere}\nDecision releve: ${response.data.releve.decision_rel}\nVeuillez passer a la 2eme partie   `,
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "OK",
                                value: true,
                                visible: true,
                                className: "btn btn-primary"
                            }
                        }
                    }).then((willContinue) => {
                        if (willContinue) {
                            $('#continue').prop('disabled', false); // Activer le bouton "Continuer"
                        }
                    });

                } else if (response['statut'] === 400) {
                    // Affichage d'un message d'erreur dans une SweetAlert
                    swal("Erreur", "Format du QR code invalide", "error");
                }else if (response['statut'] === 408) {
                    // Affichage d'un message d'erreur dans une SweetAlert
                    swal("Erreur", "Informations du QR non valide");
                }
                else {
                    // Affichage d'un message d'erreur dans une SweetAlert
                    swal("Erreur", "Une erreur s'est produite lors du traitement du QR code.", "error");
                }
            },
                error: function(xhr, status, error) {
                    swal("Erreur", "Une erreur s'est produite lors du traitement du QR code.", "error");
                }




        });
    $('#continue').on('click', function() {
        var url = $(this).data('url');
        window.location.href = url; // Rediriger vers la page suivante
    });



}



function onScanFailure(error) {

    console.warn(`Code scan error = ${error}`);
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

// pdfcrowd.convertHtml(htmlContent, {filename: 'exemple.pdf'}, function(pdfStream) {
//     var blob = new Blob([pdfStream], {type: 'application/pdf'});
//     var url = URL.createObjectURL(blob);
//     window.open(url);
// });





function verification1(encodedData) {
    swal({
        title: "Confirmer la vérification",
        text: "Êtes-vous sûr que les informations recuperées sont valides?",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Annuler",
                value: null,
                visible: true,
                className: "btn btn-danger"
            },
            confirm: {
                text: "Confirmer",
                value: true,
                visible: true,
                className: "btn btn-primary"
            }
        }
    }).then((isConfirm) => {
        if (isConfirm) {
            $('#loader').show();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/ver1",
                method: "POST",
                dataType: 'json',
                data: {
                    data: encodedData
                },
                success: function(response) {
                    $('#loader').hide();

                    if (response.statut === 200) {
                        // let releve = response.data.releve;
                        // let etudiant = response.data.etudiant;
                        // let resultats = response.data.resultats;
                        // let niv = response.data.niv;
                        //
                        // let resultText = `Id releve: ${releve.id_releve}\nNom: ${etudiant.nom}\nPrénom: ${etudiant.prenom}\nMatricule: ${response.data.matricule}\nNiveau: ${niv.nom_niveau}\nMgp: ${releve.moy_gen_pon}\nFiliere: ${releve.filiere}\nDecision releve: ${releve.decision_rel}\nMatières:`;
                        //
                        // resultats.forEach(result => {
                        //     resultText += `\n\nCode UE: ${result.ue}\nIntitulé: ${result.nom_ue}\nCrédit: ${result.credit}\nMoyenne: ${result.moyenne}\nMention: ${result.mention}\nSemestre: ${result.semestre}\nDecision: ${result.decision_note}`;
                        // });

                        swal({
                            title: "Verification terminée, relevé authentique!",
                            text: 'relevé authentique!',
                            icon: "success",
                            buttons: {
                                confirm: {
                                    text: "OK",
                                    value: true,
                                    visible: true,
                                    className: "btn btn-primary"
                                }
                            }
                        });
                    } else if (response.statut === 400) {
                        swal("Erreur", "Format du QR code invalide", "error");
                    } else if (response.statut === 408) {
                        swal("Erreur", "Les informations du PDF et du QR code ne correspondent pas", "error");
                    } else {
                        swal("Erreur", "Une erreur s'est produite lors du traitement du QR code.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    $('#loader').hide();
                    swal("Erreur", "Une erreur s'est produite lors du traitement du QR code.", "error");
                }
            });
        }
    });
}

function verification2(encodedData) {
    swal({
        title: "Confirmer la vérification",
        text: "Êtes-vous sûr que les informations recuperées sont valides?",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Annuler",
                value: null,
                visible: true,
                className: "btn btn-danger"
            },
            confirm: {
                text: "Confirmer",
                value: true,
                visible: true,
                className: "btn btn-primary"
            }
        }
    }).then((isConfirm) => {
        if (isConfirm) {
            $('#loader').show();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/ver2",
                method: "POST",
                dataType: 'json',
                data: {
                    data: encodedData
                },
                success: function(response) {
                    $('#loader').hide();

                    if (response.statut === 200) {
                        // let releve = response.data.releve;
                        // let etudiant = response.data.etudiant;
                        // let resultats = response.data.resultats;
                        // let niv = response.data.niv;
                        //
                        // let resultText = `Id releve: ${releve.id_releve}\nNom: ${etudiant.nom}\nPrénom: ${etudiant.prenom}\nMatricule: ${response.data.matricule}\nNiveau: ${niv.nom_niveau}\nMgp: ${releve.moy_gen_pon}\nFiliere: ${releve.filiere}\nDecision releve: ${releve.decision_rel}\nMatières:`;
                        //
                        // resultats.forEach(result => {
                        //     resultText += `\n\nCode UE: ${result.ue}\nIntitulé: ${result.nom_ue}\nCrédit: ${result.credit}\nMoyenne: ${result.moyenne}\nMention: ${result.mention}\nSemestre: ${result.semestre}\nDecision: ${result.decision_note}`;
                        // });

                        swal({
                            title: "Verification terminée, relevé authentique!",
                            text: 'relevé authentique!',
                            icon: "success",
                            buttons: {
                                confirm: {
                                    text: "OK",
                                    value: true,
                                    visible: true,
                                    className: "btn btn-primary"
                                }
                            }
                        });
                    } else if (response.statut === 400) {
                        swal("Erreur", "Format du QR code invalide", "error");
                    } else if (response.statut === 408) {
                        swal("Erreur", "Les informations du PDF et du QR code ne correspondent pas", "error");
                    } else {
                        swal("Erreur", "Une erreur s'est produite lors du traitement du QR code.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    $('#loader').hide();
                    swal("Erreur", "Une erreur s'est produite lors du traitement du QR code.", "error");
                }
            });
        }
    });
}







"use strict";

