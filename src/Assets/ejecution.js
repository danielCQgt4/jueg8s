(function () {

    $('#sendLista').click(function () {
        if (evaluateList()) {
            $('#list-form').submit();
        } else {
            alert('Corrige los campos');
        }
    });

    function evaluateList() {
        var max = $('#max').val();
        var encontrado;
        for (i = 0; i < max; i++) {
            encontrado = false;
            for (j = 0; j < max; j++) {
                if ($('#field' + i).val() == j + 1) {
                    encontrado = true;
                    j = parseInt(max) + 1;
                }
            }
            if (!encontrado) {
                return false;
            }
        }
        return true;
    }

})();