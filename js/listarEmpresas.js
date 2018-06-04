//function myFunction() {
//    var x = document.getElementById("mySelect");
//    var option = document.createElement("option");
//    option.text = "Kiwi";
//    x.add(option);
//}
function cargarEmpresa() {
    $.get("controller/listarempresas.php", function (data) {


        for (var i = 0; i < data.length; i++) {
            var option = document.createElement("option"); //Creas el elemento opción
            $(option).html(data[i].descripcionEmpresa); //Escribes en él el nombre de la provincia
            $(option).appendTo("#empresa"); //Lo metes en el select con id provincias

        }
    });
}
;