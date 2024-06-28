select2Function();

function select2Function() {
    $(function () {
        $(".select-Peretelephone").select2({
            tags: true,
            tokenSeparators: [',', '  '],
            placeholder: 'Entrez un # de téléphone ',
            allowClear: true,
        }).on('change', function (e) {
            console.log("Change event triggered");
            let label = $(this).find("[data-select2-tag=true]");
            let telephoneId = $(this).val();
            if (label.length == 1) {
                console.log("Label length is 1"); // Message de débogage
                labelVal = label.val();
                if (labelVal) {
                    let labelLength = labelVal.length;
                    if (labelLength == 12 && $.inArray(label.val(), $(this).val() !== -1)) {
                        $.ajax({
                            url: "/telephones/ajout/ajax/" + label.val(),
                            type: "POST",
                        }).done(function (data) {
                            label.replaceWith(`<option selected value="${data.id}">${label.val()}</option>`);
                            //$('#parents_recherche_pere_telephone').empty().append($('<option></option>').attr('value', data.id).text(label.val()));
                            $.ajax({
                                url: "/peres/telephones/search/ajax/" + telephoneId,
                                type: "POST",
                            }).done(function (data) {
                                if (data.error) {
                                    alert(data.error);
                                    $('#parents_recherche_pere_nom').select2('val', null);
                                    $('#parents_recherche_pere_prenom').select2('val', null);
                                    $('#parents_recherche_pere_profession').select2('val', null);
                                    $('#parents_recherche_SearchPere').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                                    $('#parents_recherche_pere_telephone').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                                    $('#parents_recherche_pere_nina').select2('val', null);
                                } else {
                                    if (data.pereId !== null) {
                                        $('#parents_recherche_pere_nom').empty().append($('<option></option>').attr('value', data.nomId).text(data.nom));
                                        $('#parents_recherche_pere_prenom').empty().append($('<option></option>').attr('value', data.prenomId).text(data.prenom));
                                        $('#parents_recherche_pere_profession').empty().append($('<option></option>').attr('value', data.professionId).text(data.profession));
                                        $('#parents_recherche_pere_telephone').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                                        $('#parents_recherche_pere_nina').empty().append($('<option></option>').attr('value', data.ninaId).text(data.nina));
                                    } else {
                                        // Récupérer le numéro dans le champ #parents_recherche_pere_telephone
                                        $('#parents_recherche_pere_telephone').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                                        // Assurez-vous que le numéro est également défini dans le champ #parents_recherche_pere_numero si nécessaire
                                        $('#parents_recherche_pere_numero').val(data.telephone);
                                    }
                                }
                            })
                        })
                    } else {
                        alert("Le numéro de téléphone du père doit avoir au moins 12 caractères.");
                    }
                }
            }

            if (label.length == 0 && $.inArray(label.val(), $(this).val() !== -1)) {
                console.log("Label length is 0");
                $.ajax({
                    url: "/peres/telephones/search/ajax/" + telephoneId,
                    type: "POST",
                }).done(function (data) {
                    if (data.error) {
                        alert(data.error);
                        $('#parents_recherche_pere_nom').select2('val', null);
                        $('#parents_recherche_pere_prenom').select2('val', null);
                        $('#parents_recherche_pere_profession').select2('val', null);
                        $('#parents_recherche_pere_telephone').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                        $('#parents_recherche_pere_nina').select2('val', null);
                    } else {
                        if (data.pereId !== null) {
                            $('#parents_recherche_pere_nom').empty().append($('<option></option>').attr('value', data.nomId).text(data.nom));
                            $('#parents_recherche_pere_prenom').empty().append($('<option></option>').attr('value', data.prenomId).text(data.prenom));
                            $('#parents_recherche_pere_profession').empty().append($('<option></option>').attr('value', data.professionId).text(data.profession));
                            $('#parents_recherche_pere_telephone').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                            $('#parents_recherche_pere_nina').empty().append($('<option></option>').attr('value', data.ninaId).text(data.nina));
                        } else {
                            // Récupérer le numéro dans le champ #parents_recherche_pere_telephone
                            $('#parents_recherche_pere_telephone').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                            // Assurez-vous que le numéro est également défini dans le champ #parents_recherche_pere_numero si nécessaire
                            $('#parents_recherche_pere_numero').val(data.telephone);
                        }
                    }
                    if (data.errorTel) {
                        alert(data.errorTel);
                        $('#parents_recherche_SearchPere').select2('destroy').val("").select2();//.empty().append($('<option></option>').attr('value', data.nomId).text(data.nom));
                        $('#parents_recherche_pere_nom').select2('destroy').val("").select2();//.empty().append($('<option></option>').attr('value', data.nomId).text(data.nom));
                        $('#parents_recherche_pere_prenom').select2('destroy').val("").select2();//.empty().append($('<option></option>').attr('value', data.prenomId).text(data.prenom));
                        $('#parents_recherche_pere_profession').select2('destroy').val("").select2();//.empty().append($('<option></option>').attr('value', data.professionId).text(data.profession));
                        $('#parents_recherche_pere_telephone').select2('destroy').val("").select2();//.empty().append($('<option></option>').attr('value', data.professionId).text(data.telephone1));
                        $('#parents_recherche_pere_nina').select2('destroy').val("").select2();//.empty().append($('<option></option>').attr('value', data.ninaId).text(data.telephone2));
                    }
                    if (data.errorTele) {
                        alert(data.errorTele);
                        $('#parents_recherche_pere_nom').select2('destroy').val("").select2();//.empty().append($('<option></option>').attr('value', data.nomId).text(data.nom));
                        $('#parents_recherche_pere_prenom').select2('destroy').val("").select2();//.empty().append($('<option></option>').attr('value', data.prenomId).text(data.prenom));
                        $('#parents_recherche_pere_profession').select2('destroy').val("").select2();//.empty().append($('<option></option>').attr('value', data.professionId).text(data.profession));
                        $('#parents_recherche_pere_telephone').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                        $('#parents_recherche_pere_nina').select2('destroy').val("").select2();//.empty().append($('<option></option>').attr('value', data.ninaId).text(data.nina));

                    }

                })
            }
        });
        // Réinitialiser les champs Select2 lorsque la valeur de #parents_recherche_pere_telephone change
        $('#parents_recherche_SearchPere').on('change', function () {
            setTimeout(function () {
                $('#parents_recherche_pere_nom').select2('val', null);
                $('#parents_recherche_pere_prenom').select2('val', null);
                $('#parents_recherche_pere_profession').select2('val', null);
                $('#parents_recherche_pere_telephone').select2('val', null);
                $('#parents_recherche_pere_nina').select2('val', null);
            }, 100); // Délay en millisecondes
        });
    });
}
