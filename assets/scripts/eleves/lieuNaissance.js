lieuNaissanceFunction();
function lieuNaissanceFunction() {
    let timeout = null;

    $(document).on('change', '#eleves_region, #eleves_cercle, #eleves_commune', function () {
        let $field = $(this);
        let $regionField = $('#eleves_region');
        let $cercleField = $('#eleves_cercle');
        let $form = $field.closest('form');
        let target = '#' + $field.attr('id').replace('commune', 'lieuNaissance').replace('cercle', 'commune').replace('region', 'cercle');
        let data = {};
        data[$regionField.attr('name')] = $regionField.val();
        data[$cercleField.attr('name')] = $cercleField.val();
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
                        $(target).replaceWith($input);
                    }
                });
            }
        }, 50);
    });


}
