
/*$("document").ready(function(){
 alert("conectado");
 });*/

$("#formularioCategorias").submit(function () {

    const categoria = $("#nombreCategoria").val();

    if (!$.trim(categoria)) {  //trim es para eliminar espacios en blanco al inicio y al final
        alert("Complete el campo");
        return false;
    }

//    alert(`Formulario enviado.\n Categoria "${categoria}" creada exitosamente`);
//    this.submit();
//    this.reset();
    return true;
});

$("#formularioProductos").submit(function () {

    const nombre = $("#nombreProducto").val();
//    const imagen = $("#imagenProducto").val();
    const descripcion = $("#descripcionProducto").val();
    const precio = $("#precioProducto").val();
    const categoria = $("#categoriaProducto").val();

    const errores = [];

    if (!$.trim(nombre)) errores.push(`"nombre"`);
//    if (!$.trim(imagen))errores.push(`"imagen"`);
    if (!$.trim(descripcion))errores.push(`"descripcion"`);
    if (!$.trim(precio))errores.push(`"precio"`);
    if (!$.trim(categoria))errores.push(`"categoria"`);
    
    if(errores.length > 0) {
        let mensaje = "Debe completar: ";
        errores.forEach((error) => {
            mensaje += "\n " + error;
        });
        alert(mensaje + "\n Manuel Gonzalez");
        return false;
    }

//    alert(`Formulario enviado.\n Producto "${nombre}" creado exitosamente`);
//    this.submit();
//    this.reset();
      return true;
});