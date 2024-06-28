
$(document).ready(function () {
});

scolarite1Function();
function scolarite1Function() {
    let timeout = null;

    $(document).on('change', '#eleves_niveau, #eleves_scolarite1, #eleves_scolarite1, #eleves_scolarite2, #eleves_redoublement1, #eleves_redoublement2', function () {
        let $field = $(this);
        let $niveauField = $('#eleves_niveau');
        let $scolarite1Field = $('#eleves_scolarite1');
        let $scolarite2Field = $('#eleves_scolarite2');
        let $redoublement1Field = $('#eleves_redoublement1');
        let $form = $field.closest('form');
        let target = '#' + $field.attr('id').replace('redoublement2', 'redoublement3').replace('redoublement1', 'redoublement2').replace('scolarite2', 'redoublement1').replace('scolarite1', 'scolarite2').replace('niveau', 'scolarite1');
        let target1 = '#' + $field.attr('id').replace('niveau', 'classe');
        let target2 = '#' + $field.attr('id').replace('niveau', 'dateNaissance');
        let target3 = '#' + $field.attr('id').replace('niveau', 'dateRecrutement');
        let target4 = '#' + $field.attr('id').replace('niveau', 'dateExtrait');
        let target5 = '#' + $field.attr('id').replace('niveau', 'dateInscription');
        let target6 = '#' + $field.attr('id').replace('niveau', 'ecoleAnDernier');
        let target7 = '#' + $field.attr('id').replace('niveau', 'ecoleRecrutement');
        let target8 = '#' + $field.attr('id').replace('niveau', 'statut');


        let data = {};
        data[$niveauField.attr('name')] = $niveauField.val();
        data[$scolarite1Field.attr('name')] = $scolarite1Field.val();
        data[$scolarite2Field.attr('name')] = $scolarite2Field.val();
        data[$redoublement1Field.attr('name')] = $redoublement1Field.val();
        data[$field.attr('name')] = $field.val();

        clearTimeout(timeout);

        timeout = setTimeout(function () {
            if ($field.val() !== $field.data('previous-value')) {
                $field.data('previous-value', $field.val());
                $.ajax({
                    url: $form.attr('action'),
                    type: $form.attr('method'),
                    data: data,
                    complete: function (html) {
                        let $input = $(html.responseText).find(target);
                        let $input1 = $(html.responseText).find(target1);
                        let $input2 = $(html.responseText).find(target2);
                        let $input3 = $(html.responseText).find(target3);
                        let $input4 = $(html.responseText).find(target4);
                        let $input5 = $(html.responseText).find(target5);
                        let $input6 = $(html.responseText).find(target6);
                        let $input7 = $(html.responseText).find(target7);
                        let $input8 = $(html.responseText).find(target8);

                        $(target).replaceWith($input);
                        $(target1).replaceWith($input1);
                        $(target2).replaceWith($input2);
                        $(target3).replaceWith($input3);
                        $(target4).replaceWith($input4);
                        $(target5).replaceWith($input5);
                        $(target6).replaceWith($input6);
                        $(target7).replaceWith($input7);
                        $(target8).replaceWith($input8);

                    }
                });
            }
        }, 50);
    });


}


