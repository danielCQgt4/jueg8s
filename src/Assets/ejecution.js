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

    //Deactivate
    function getTerminate() {
        var data;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                data = this.responseText;
                console.log(window.location.href);
                if (data == '{ "jugar":"1"}' && window.location.href == 'http://cycwebservice.cf/Jueg8s/src/Views/') {
                    window.location.replace("http://cycwebservice.cf/Jueg8s/src/Views/resultados.php");
                }
            }
        };
        xmlhttp.open("GET", "http://cycwebservice.cf/Jueg8s/src/Controller/general.php?api=123", true);
        xmlhttp.send();
    }
    setInterval(getTerminate, 2000);

    //Calificacion
    function getData() {
        var data;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                data = this.responseText;
                if (data == '{ "jugar":"1"}') {
                    var temp = $('#thx-btn').html();
                    if (temp == '') {
                        $('#thx-btn').html('<form action="../../../index.php" method="POST"><input type = "submit" name = "btn-evaluate" value = "Calificar" class= "btn btn-success w-50 d-block mx-auto" ></form > ');
                    }
                } else {
                    $('#thx-btn').html('');
                }
            }
        };
        xmlhttp.open("GET", "http://cycwebservice.cf/Jueg8s/src/Controller/general.php?api=123", true);
        xmlhttp.send();
    }
    setInterval(getData, 2000);

})();