(function () {

    //Lista
    var arreglo = [];

    $('#sendLista').click(function () {
        if (evaluateList()) {
            $('#list-form').submit();
        } else {
            alert('Corrige los campos');
        }
        arreglo = [];
    });

    function evaluateList() {
        var max = $('#max').val();
        for (i = 0; i < max; i++) {
            if (validate($('#field' + i).val(), max)) {
                arreglo.push($('#field' + i).val());
            } else {
                return false;
            }
        }
        return true;
    }

    function validate(number, max) {
        for (i = 0; i < arreglo.length; i++) {
            if (arreglo[i] == number || number > max) {
                return false;
            }
        }
        return true;
    }

    //Crucigrama
    $('#sendCrucigrama').click(function () {
        //Corroboraciones
        if (confirm('Esta seguro que desea enviar la informacion')) {
            $('#cru-form').submit();
        }
    });

})();