$(document).ready(function() {
    $('.btn-update').on('click', function () {

        var adminNom = $(this).data('admin-nom');
        var adminPrenom = $(this).data('admin-prenom');
        var adminEmail = $(this).data('admin-email');
        var adminId = $(this).data('admin-id');
        console.log(adminNom);


        $('#nom').val(adminNom);
        $('#prenom').val(adminPrenom);
        $('#email').val(adminEmail);
        $('#adminId').val(adminId);
    });


    $('#updateForm').submit(function (e) {
        e.preventDefault();
        var adminId = $('#adminId').val();
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var email = $('#email').val();

        console.log(adminId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            method: 'POST',
            url: '/adminUpd',
            dataType: 'json',
            data: {
                adminId: adminId,
                nom: nom,
                prenom: prenom,
                email: email,
            },
            success: function (response) {
                console.log(response);
                if (response.statut === 200) {
                    $('#exampleModal').modal('hide');
                    swal({
                        title: "Succès",
                        text: "L'administrateur a été mis à jour avec succès.",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "OK",
                                value: true,
                                visible: true,
                                className: "btn btn-primary"
                            }
                        }
                    }).then(() => {
                        // Actualiser la liste des administrateurs ou effectuer d'autres actions nécessaires
                        var row = $('#adminRow-' + adminId);
                        row.find('.admin-nom').text(nom);
                        row.find('.admin-prenom').text(prenom);
                        row.find('.admin-email').text(email);
                    });
                }else {
                    swal({
                        title: "Erreur",
                        text: "Une erreur s'est produite lors de la mise à jour de l'administrateur.",
                        icon: "error",
                        buttons: {
                            confirm: {
                                text: "OK",
                                value: true,
                                visible: true,
                                className: "btn btn-primary"
                            }
                        }
                    });
                }

            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $('.btn-delete').click(function () {
        var adminId = $(this).data('admin-id');

        swal({
            title: "Confirmer la suppresion",
            text: "Êtes-vous sûr de vouloir supprimer?",
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
                    url: "/adminDel",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        adminId: adminId,
                    },
                    success: function (response) {
                        if (response.statut === 200) {
                            swal({
                                title: "Succès",
                                text: "L'administrateur a été supprimé  avec succès.",
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        text: "OK",
                                        value: true,
                                        visible: true,
                                        className: "btn btn-primary"
                                    }
                                }
                            }).then(() => {
                                // Actualiser la liste des administrateurs ou effectuer d'autres actions nécessaires
                                $('#adminRow-' + adminId).remove();

                            });
                        }else {
                            swal({
                                title: "Erreur",
                                text: "Une erreur s'est produite lors de la suppression de l'administrateur.",
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        text: "OK",
                                        value: true,
                                        visible: true,
                                        className: "btn btn-primary"
                                    }
                                }
                            });
                        }

                    },
                    error: function (xhr, status, error) {

                        swal("Erreur", "Une erreur s'est produite lors de la suppression.", "error");
                    }
                });
            }
        });
    });


    $('.btn-delete2').click(function () {
        var relId = $(this).data('rel-id');
        console.log(relId);

        swal({
            title: "Confirmer la suppresion",
            text: "Êtes-vous sûr de vouloir supprimer?",
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
                    url: "/relDel",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        relId: relId,
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.statut === 200) {
                            swal({
                                title: "Succès",
                                text: "Le relevé a été supprimé  avec succès.",
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        text: "OK",
                                        value: true,
                                        visible: true,
                                        className: "btn btn-primary"
                                    }
                                }
                            }).then(() => {
                                // Actualiser la liste des releve ou effectuer d'autres actions nécessaires
                                $('#releveRow-' + relId).remove();

                            });
                        }else {
                            swal({
                                title: "Erreur",
                                text: "Une erreur s'est produite lors de la suppression du releve.",
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        text: "OK",
                                        value: true,
                                        visible: true,
                                        className: "btn btn-primary"
                                    }
                                }
                            });
                        }

                    },
                    error: function (xhr, status, error) {

                        swal("Erreur", "Une erreur s'est produite lors de la suppression.", "error");
                    }
                });
            }
        });
    });
})
