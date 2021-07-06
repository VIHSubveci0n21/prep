/* --------------------------------------------------------------------------------------------------------------- */
/* FUNCIONES GENERALES */
/* --------------------------------------------------------------------------------------------------------------- */
$(document).ready(function()
  {
    //FORMATO DE MASCARAS
    $('#monetario').mask('99999999999.99', {placeholder: '00000000000.00'});
    $('#dpi').mask('9999 99999 9999', {placeholder: '0000 00000 0000'});
    $('#cuiconstruido').mask('S00000000000SSSS', {placeholder: 'A###########AAAA'});
    $('#expedienteclinica').mask('00000-0000');

    $('#frascosr').mask('99');
    $('#creatininar').mask('99.99999');


    //$('#formulario').mask('9999999999', {placeholder: '0000000000'});

    $('body, html').animate({scrollTop: '0px'}, 300);
  });


function tope(contenedor){$('body, html, #tope').scrollTop(0);}

function CargarPagina(contenedor, pagina){$(contenedor).load(pagina);}

function alertas(tipo,mensaje)
  {
    if(tipo == 1){alertify.success(mensaje);}
    if(tipo == 2){alertify.error(mensaje);}
  }



function alertas(tipo,mensaje)
  {

    if(tipo == 1){alertify.notify(mensaje,'success',10, null)}  // MENSAJE DE EXITO

    if(tipo == 2){alertify.notify(mensaje,'error',10, null)}  // MENSAJE DE ERROR

    if(tipo == 3){alertify.notify(mensaje,'warning',10, null)}  // MENSAJE DE ADVERTENCIA

    if(tipo == 4){alertify.alert(mensaje)}            // POPUP NORMAL


    if(tipo == 5)
      {
        alertify.confirm
          (
            'TITULO DE LA VENTANA', 'MENSAJE DLE CUERPO DEL POPUP'
            ,function(){ alertify.success('DATOS ELIMINADOS EXITOSAMETNE') }
                , function(){ alertify.error('PROCESO CANCELADO')}
              );
      }

  // VENTANA CON PREGUNTA
  if(tipo == 6)
    {
      alertify.prompt
        (
          'TITULO DE LA VENTANA', 'PREGUNTA', 'REPUESTA'
                    , function(evt, value) {alertify.success('SU RESPUESTA ES : ' + value)}
                    , function()           {alertify.error('Cancel')}
                );
    }

  }



function ActivarInicio()
  {
    $("#C_Secundario").html('<center><img src="img/prepnoigualpep.png" style="background-repeat: no-repeat; width: 60%; margin-top: 130px;"></center>');
  }

















/* --------------------------------------------------------------------------------------------------------------- */
/*                                                        LOGIN                                                    */
/* --------------------------------------------------------------------------------------------------------------- */
function ValidarUsuario() {
    var usuario = document.getElementById('usuario').value;
    var password = document.getElementById('password').value;

    var accion = "ValidarUsuario";

    $.ajax({
      type: "GET",
      url: "acciones.php",
      data: {accion: accion, usuario: usuario, password: password},
      success: function(datos) {
          if(datos == "BAJA") {
              alertas("2","EL USUARIO ESTA DADO DE BAJA.");
              setTimeout(function(){salir();}, 2000);
            }
          if(datos == "Exito") {
              CargarPagina('#C_Primario','paginas/menu/menu.php');
              document.getElementById('fondo').style.display = "block";
            }
          if(datos == "Error1") {
              alertas("2","Usuario y/o contraseña incorrectos.");
              document.getElementById('usuario').focus();
            }
        }
    });
  }


function salir(){window.location = "paginas/accesos/logout.php";}




















/* --------------------------------------------------------------------------------------------------------------- */
/*                                                      REGISTROS                                                  */
/* --------------------------------------------------------------------------------------------------------------- */
function CargarDatosUsuario(correlativo,expediente)
  {
    CargarPagina('#C_Secundario','paginas/registros/registrarusuario.php');

    accion = "CargarDatosUsuario";

    $.ajax({
      type: "GET",
      url: "acciones.php",
      data: {accion: accion, correlativo: correlativo, expediente: expediente},
      success: function(datos)
        {
          setTimeout(function(){CargarDatosEnfrmgenerales(datos);}, 1000);
        }
    });
  }

    function CargarDatosEnfrmgenerales(datos2)
      {
        registros = datos2.split("*");
        if(registros[0] == "PREP"){document.getElementById('clinicaprep').checked = true;}else{document.getElementById('clinicapep').checked = true;}
        document.getElementById('tipousuario').value = registros[1];
        document.getElementById('expedienteclinica').value = registros[2];
        document.getElementById('expedientevicit').value = registros[3];
        document.getElementById('nombres').value = registros[4];
        document.getElementById('apellidos').value = registros[5];
        document.getElementById('fechanacimiento').value = registros[6];
        document.getElementById('edad').value = registros[7];
        document.getElementById('sexonacer').value = registros[8];
        document.getElementById('etnia').value = registros[9];
        document.getElementById('escolaridad').value = registros[10];

        var paisnac = document.getElementById('paisnacimiento');
        for (var i = 0; i < paisnac.length; i++){if(paisnac[i].text == registros[11]){document.getElementById('paisnacimiento').value = i; LlenarComboDepartamento();}}

        setTimeout(function()
          {
            var deptonac = document.getElementById('deptonacimiento');
            for (var i = 0; i < deptonac.length; i++){if(deptonac[i].text == registros[12]){ubicacion = deptonac[i].value; document.getElementById('deptonacimiento').value = ubicacion; LlenarComboMunicipio();}}
          }, 1000);


        setTimeout(function()
          {
            var muninac = document.getElementById('muninacimiento');
            for (var i = 0; i < muninac.length; i++){if(muninac[i].text == registros[13]){ubicacion = muninac[i].value; document.getElementById('muninacimiento').value = ubicacion;}}
          }, 2000);


        document.getElementById('tipodocumento').value = registros[14];
        document.getElementById('numerocui').value = registros[15];
        document.getElementById('cuiconstruido').value = registros[16];


        var paisres = document.getElementById('paisresidencia');
        for (var i = 0; i < paisres.length; i++){if(paisres[i].text == registros[17]){document.getElementById('paisresidencia').value = i; LlenarComboDepartamento2();}}

        setTimeout(function()
          {
            var deptores = document.getElementById('deptoresidencia');
            for (var i = 0; i < deptores.length; i++){if(deptores[i].text == registros[18]){ubicacion = deptores[i].value; document.getElementById('deptoresidencia').value = ubicacion; LlenarComboMunicipio2();}}
          }, 1000);


        setTimeout(function()
          {
            var munires = document.getElementById('muniresidencia');
            for (var i = 0; i < munires.length; i++){if(munires[i].text == registros[19]){ubicacion = munires[i].value; document.getElementById('muniresidencia').value = ubicacion;}}
          }, 2000);


        document.getElementById('direccion').value = registros[20];
        document.getElementById('telefono').value = registros[21];
        document.getElementById('email').value = registros[22];
        document.getElementById('otromedio').value = registros[23];
        document.getElementById('poblacion').value = registros[24];

        setTimeout(function()
          {
            var orientacion = document.getElementById('orientacion');
            for (var i = 0; i < orientacion.length; i++){if(orientacion[i].text == registros[25]){ubicacion = orientacion[i].value; document.getElementById('orientacion').value = ubicacion;}}
          }, 1000);

        setTimeout(function()
          {
            var genero = document.getElementById('genero');
            for (var i = 0; i < genero.length; i++){if(genero[i].text == registros[26]){ubicacion = genero[i].value; document.getElementById('genero').value = ubicacion;}}
          }, 1000);

        document.getElementById('estado').value = registros[27];

        LlenarListadoCitas(registros[2]);
      }

        function LlenarListadoCitas(expediente)
          {
            accion = "LlenarListadoCitas";

            $.ajax({
              type: "GET",
              url: "acciones.php",
              data: {accion: accion, expediente: expediente},
              success: function(datos)
                {
                  $("#cuerpotablacitas").html(datos);
                }
            });
          }

            function LlenarComboDepartamento()
              {
                $("#deptonacimiento").html('');
                $("#muninacimiento").html('');

                pais = document.getElementById('paisnacimiento').value;

                if(pais == '1')
                  {

                    accion = "LlenarComboDepartamento";

                    $.ajax({
                      type: "GET",
                      url: "acciones.php",
                      data: {accion: accion, pais: pais},
                      success: function(datos)
                        {
                           $("#deptonacimiento").html(datos);
                        }
                    });
                  }
              }

                function LlenarComboMunicipio()
                  {
                    departamento = document.getElementById('deptonacimiento').value;

                    accion = "LlenarComboMunicipio";

                    $.ajax({
                      type: "GET",
                      url: "acciones.php",
                      data: {accion: accion, departamento: departamento},
                      success: function(datos)
                        {
                           $("#muninacimiento").html(datos);
                        }
                    });
                  }

                    function LlenarComboDepartamento2()
                      {
                        $("#deptoresidencia").html('');
                        $("#muniresidencia").html('');

                        pais = document.getElementById('paisresidencia').value;

                        if(pais == '1')
                          {

                            accion = "LlenarComboDepartamento";

                            $.ajax({
                              type: "GET",
                              url: "acciones.php",
                              data: {accion: accion, pais: pais},
                              success: function(datos)
                                {
                                   $("#deptoresidencia").html(datos);
                                }
                            });
                          }
                      }

                        function LlenarComboMunicipio2()
                          {
                            departamento = document.getElementById('deptoresidencia').value;

                            accion = "LlenarComboMunicipio";

                            $.ajax({
                              type: "GET",
                              url: "acciones.php",
                              data: {accion: accion, departamento: departamento},
                              success: function(datos)
                                {
                                   $("#muniresidencia").html(datos);
                                }
                            });
                          }

                            function ConstruirCUI()
                              {
                                sexo     = document.getElementById('sexonacer').value;
                                fecha    = document.getElementById('fechanacimiento').value;
                                pais     = document.getElementById('paisnacimiento').value;
                                muni     = document.getElementById('muninacimiento').value;
                                nombre   = document.getElementById('nombres').value;
                                apellido = document.getElementById('apellidos').value;

                                if(pais == 1)
                                  {
                                    document.getElementById('cuiconstruido').value = sexo.substr(0,1) + fecha.substr(8,2) + fecha.substr(5,2) + fecha.substr(2,2) + pais + muni + nombre.substr(0,2) + apellido.substr(0,2);
                                  }
                                else
                                  {
                                    document.getElementById('cuiconstruido').value = sexo.substr(0,1) + fecha.substr(8,2) + fecha.substr(5,2) + fecha.substr(2,2) + pais + "0000" + nombre.substr(0,2) + apellido.substr(0,2);
                                  }
                              }


function GuardarDatosUsuarioClinica() {

    if(document.getElementById('clinicaprep').checked){clinica = "PREP";}
    if(document.getElementById('clinicapep').checked){clinica = "PEP";}

    tipousuario       = document.getElementById('tipousuario').value;
    expedienteclinica = document.getElementById('expedienteclinica').value;
    expedientevicit   = document.getElementById('expedientevicit').value;
    nombres           = document.getElementById('nombres').value;
    apellidos         = document.getElementById('apellidos').value;
    fechanacimiento   = document.getElementById('fechanacimiento').value;
    edad              = document.getElementById('edad').value;
    sexonacer         = document.getElementById('sexonacer').value;
    etnia             = document.getElementById('etnia').value;
    escolaridad       = document.getElementById('escolaridad').value;
    paisnacimiento    = document.getElementById('paisnacimiento').options[document.getElementById('paisnacimiento').selectedIndex].text;
    deptonacimiento   = document.getElementById('deptonacimiento').options[document.getElementById('deptonacimiento').selectedIndex].text;
    muninacimiento    = document.getElementById('muninacimiento').options[document.getElementById('muninacimiento').selectedIndex].text;
    tipodocumento     = document.getElementById('tipodocumento').value;
    numerocui         = document.getElementById('numerocui').value;
    cuiconstruido     = document.getElementById('cuiconstruido').value;
    paisresidencia    = document.getElementById('paisresidencia').options[document.getElementById('paisresidencia').selectedIndex].text;
    deptoresidencia   = document.getElementById('deptoresidencia').options[document.getElementById('deptoresidencia').selectedIndex].text;
    muniresidencia    = document.getElementById('muniresidencia').options[document.getElementById('muniresidencia').selectedIndex].text;
    direccion         = document.getElementById('direccion').value;
    telefono          = document.getElementById('telefono').value;
    email             = document.getElementById('email').value;
    otromedio         = document.getElementById('otromedio').value;
    poblacion         = document.getElementById('poblacion').value;
    orientacion       = document.getElementById('orientacion').value;
    genero            = document.getElementById('genero').value;
    estado            = document.getElementById('estado').value;
    subreceptor       = document.getElementById('subreceptor').value;

    accion = "GuardarDatosUsuarioClinica";

    $.ajax({
      type: "GET",
      url: "acciones.php",
      data: {
        accion: accion,
        clinica: clinica,
        tipousuario: tipousuario,
        expedienteclinica: expedienteclinica,
        expedientevicit: expedientevicit,
        nombres: nombres,
        apellidos: apellidos,
        fechanacimiento: fechanacimiento,
        edad: edad,
        sexonacer: sexonacer,
        etnia: etnia,
        escolaridad: escolaridad,
        paisnacimiento: paisnacimiento,
        deptonacimiento: deptonacimiento,
        muninacimiento: muninacimiento,
        tipodocumento: tipodocumento,
        numerocui: numerocui,
        cuiconstruido: cuiconstruido,
        paisresidencia: paisresidencia,
        deptoresidencia: deptoresidencia,
        muniresidencia: muniresidencia,
        direccion: direccion,
        telefono: telefono,
        email: email,
        otromedio: otromedio,
        poblacion: poblacion,
        orientacion: orientacion,
        genero: genero,
        estado: estado,
        subreceptor: subreceptor
        },
      success: function(datos) {
          if (datos == "ExisteExito2") {
              alert(numerocui + " YA EXISTE!");
          } else if(datos == "Exito2") {
              alertas("1","Datos almacenados exitosamente.");
              CargarDatosUsuario('0',expedienteclinica);
          } else {
              alertas("2","Los datos no se han podido almacenar, por favor revise la información que digitó.");
            }
        }
    });
  }

function FiltrarUsuariosCita() {
    filtro = document.getElementById('filtro').value;

    accion = "FiltrarUsuariosCita";

    $.ajax(
        {
          type: "GET",
          url: "acciones.php",
          data: {accion: accion, filtro: filtro},
          success: function(datos)
            {
              $("#usuario2").html(datos);
            }
        });
  }



function SiAsistio()
  {
    expediente1 = document.getElementById('expediente1').value;
    fecha1      = document.getElementById('fecha1').value;

    accion = "SiAsistio";

    $.ajax(
        {
          type: "GET",
          url: "acciones.php",
          data: {accion: accion, expediente1: expediente1, fecha1: fecha1},
          success: function(datos) {
              $("#DatosUsuario").modal('hide');
              setTimeout(function(){CargarPagina('#C_Secundario','paginas/calendario/calendario.php');}, 1000);
            }
        });
  }

function NoAsistio() {
    expediente1 = document.getElementById('expediente1').value;
    fecha1      = document.getElementById('fecha1').value;

    accion = "NoAsistio";

    $.ajax({
          type: "GET",
          url: "acciones.php",
          data: {accion: accion, expediente1: expediente1, fecha1: fecha1},
          success: function(datos) {
              $("#DatosUsuario").modal('hide');
              setTimeout(function(){CargarPagina('#C_Secundario','paginas/calendario/calendario.php');}, 1000);
            }
        });
  }

function GuardarNuevaCita() {
  organizacion2  = document.getElementById('organizacion2').value;
  subreceptor2   = document.getElementById('subreceptor2').value;
  usuario2      = document.getElementById('usuario2').value;
  fecha2        = document.getElementById('fecha2').value;
  hora2         = document.getElementById('hora2').value;

    accion = "GuardarNuevaCita";

    $.ajax({
          type: "GET",
          url: "acciones.php",
          data: {accion: accion, usuario2: usuario2, fecha2: fecha2, hora2: hora2, organizacion2: organizacion2, subreceptor2: subreceptor2},
          success: function(datos) {
              $("#NuevaCita").modal('hide');
              setTimeout(function(){CargarPagina('#C_Secundario','paginas/calendario/calendario.php');}, 1000);
            }
        });
  }

function EliminarCitaUsuario()
  {
    var respuesta = confirm("REALMENTE DESEA ELIMINAR ESTA CITA");
    if (respuesta) {
        expediente1 = document.getElementById('expediente1').value;
        fecha1 = document.getElementById('fecha1').value;

        accion = "EliminarCitaUsuario";

        $.ajax(
            {
              type: "GET",
              url: "acciones.php",
              data: {accion: accion, expediente1: expediente1, fecha1: fecha1},
              success: function(datos) {
                  $("#DatosUsuario").modal('hide');
                  setTimeout(function(){CargarPagina('#C_Secundario','paginas/calendario/calendario.php');}, 1000);
                }
            });
      }
  }



function CargarExpediente(correlativo,expediente)
  {
    if(correlativo == '1' && expediente == '1')
      {
        $("#DatosUsuario").modal('hide');
        expediente = document.getElementById('expediente1').value;
      }
    if(correlativo == '2' && expediente == '1')
      {
        $("#DatosUsuario").modal('hide');
        expediente = document.getElementById('expedienteclinica').value;
      }
     setTimeout(function(){CargarPagina('#C_Secundario','paginas/clinica/clinica.php?expediente=' + expediente);}, 1000);
  }

  function CargarHistorial(expediente)
    {
      $("#buscarPaciente").modal('hide');
       setTimeout(function(){CargarPagina('#C_Secundario','paginas/clinica/historial.php?expediente=' + expediente);}, 1000);
    }



function CargarGeneralesUsuario(correlativo,expediente)
  {
    if(correlativo == '1' && expediente == '1')
      {
        $("#DatosUsuario").modal('hide');
        expediente = document.getElementById('expediente1').value;

      }
    setTimeout(function(){CargarDatosUsuario('1',expediente);}, 1000);
  }



function MostrarModalMedicametnos()
{
  $("#ResultadoLaboratorios").modal('show');
  document.getElementById('fechar').value = "";
  document.getElementById('frascosR').value = "";
  document.getElementById('creatininar').value = "";
  document.getElementById('vihr').value = 0;
}



function GuardarResultadosLaboratorio() {
    var expedienter = document.getElementById('expedienter').value;
    var fechar = document.getElementById('fechar').value;
    var frascosR = document.getElementById('frascosR').value;
    var creatininar = document.getElementById('creatininar').value;
    var filtradoGlomr = document.getElementById('filtradoGlomr').value;
    var vihr = document.getElementById('vihr').value;
    var sifilisr = document.getElementById('sifilisr').value;
    var hepatitisbr = document.getElementById('hepatitisbr').value;
    var hepatitiscr = document.getElementById('hepatitiscr').value;
    var rprSifr = document.getElementById('rprSifr').value;
    var itsr = $("#itsr").val();
    var notas = document.getElementById('notas').value;
    console.log(itsr);
    accion = "GuardarResultadosLaboratorio";

    $("#ResultadoLaboratorios").modal('hide');

    $.ajax( {
          type: "GET",
          url: "acciones.php",
          data: {
            accion: accion,
            expedienter: expedienter,
            fechar: fechar,
            frascosR: frascosR,
            creatininar: creatininar,
            filtradoGlomr: filtradoGlomr,
            vihr: vihr,
            sifilisr: sifilisr,
            hepatitisbr: hepatitisbr,
            hepatitiscr: hepatitiscr,
            rprSifr: rprSifr,
            itsr: itsr,
            notas: notas},
          success: function (datos)
            {
              if(datos == "Exito1"){alertas("1","DATOS ACTUALIZADOS EXITOSAMENTE");}
              if(datos == "Exito2"){alertas("1","DATOS ALMACENADOS EXITOSAMENTE");}
              if(datos == "Error1"){alertas("2","LOS DATOS NO SE PUDIERON ACTUALIZAR, INTENTELO NUEVAMENTE");}
              if(datos == "Error2"){alertas("2","LOS DATOS NO SE HAN PODIDO ALMACENAR, INTENTELO NUEVAMENTE");}
            }
        });
    setTimeout(function(){CargarPagina('#C_Secundario','paginas/clinica/clinica.php?expediente=' + expedienter);}, 2000);
  }



function BuscarUsuarioSistema()
  {

    registro = document.getElementById('ListadoUsuarios').value;

    accion = "BuscarUsuarioSistema";

    $.ajax(
        {
          tpe: "GET",
          url: "acciones.php",
          data: {accion: accion, registro: registro},
          success: function(datos)
            {
              resultado = datos.split('*');
              document.getElementById('id').value            = resultado['0'];
              document.getElementById('organizacion').value  = resultado['1'];
              document.getElementById('nombre').value        = resultado['2'];
              document.getElementById('ncompleto').value     = resultado['3'];
              document.getElementById('password1').value     = "";
              document.getElementById('password2').value     = "";
              document.getElementById('cargo').value         = resultado['5'];
              document.getElementById('registros').value     = resultado['6'];
              document.getElementById('citas').value         = resultado['7'];
              document.getElementById('laboratorios').value  = resultado['8'];
              document.getElementById('reportes').value      = resultado['9'];
              document.getElementById('configuracion').value = resultado['10'];
              document.getElementById('usuarios').value      = resultado['11'];
              document.getElementById('estado').value        = resultado['12'];
            }
        });
  }



function GuardarUsuariosSistema() {

    id            = document.getElementById('id').value;
    organizacion  = document.getElementById('organizacion').value;
    nombre        = document.getElementById('nombre').value;
    ncompleto     = document.getElementById('ncompleto').value;
    password1     = document.getElementById('password1').value;
    password2     = document.getElementById('password2').value;
    cargo         = document.getElementById('cargo').value;
    registros     = document.getElementById('registros').value;
    citas         = document.getElementById('citas').value;
    laboratorios  = document.getElementById('laboratorios').value;
    reportes      = document.getElementById('reportes').value;
    configuracion = document.getElementById('configuracion').value;
    usuarios      = document.getElementById('usuarios').value;
    estado        = document.getElementById('estado').value;
    subreceptor   = document.getElementById('subreceptor').value;

    if(password1 != password2)
      {
        alertas("2","LAS CONTRASEÑAS QUE DIGITO NO SON IGUALES. DIGITELAS NUEVAMENTE.");
        document.getElementById('password1').value = "";
        document.getElementById('password1').value = "";
        document.getElementById('password1').focus();
        exit();
      }

    accion = "GuardarUsuariosSistema";

    $.ajax(
      {
        type: "GET",
        url: "acciones.php",
        data: {
          accion: accion,
          id: id,
          organizacion: organizacion,
          nombre: nombre,
          ncompleto: ncompleto,
          password1: password1,
          cargo: cargo,
          registros: registros,
          citas: citas,
          laboratorios: laboratorios,
          reportes: reportes,
          configuracion: configuracion,
          usuarios: usuarios,
          estado: estado,
          subreceptor: subreceptor
          },
        success: function(datos)
          {
            if(datos == "Exito1"){alertas("1","DATOS ACTUALIZADOS EXITOSAMETNE."); setTimeout(function(){CargarPagina('#C_Secundario','paginas/configuracion/configuracion.php');}, 2000);}
            if(datos == "Exito2"){alertas("1","DATOS GUARDADOS EXITOSAMETNE.");  setTimeout(function(){CargarPagina('#C_Secundario','paginas/configuracion/configuracion.php');}, 2000);}
            if(datos == "Error1"){alertas("2","LOS DATOS NO SE PUEDIERON ACTUALIZAR, POR FAVOR REVISE SU INFORMACION.");}
            if(datos == "Error2"){alertas("2","LOS DATOS NO SE PUEDIERON GUARDAR, PRO FAVOR REVISE SU INFORMACION.");}
          }
      });
  }



function EliminarUsuariosSistema()
  {
    id = document.getElementById('id').value;

    accion = "EliminarUsuariosSistema";

    $.ajax(
      {
        type: "GET",
        url: "acciones.php",
        data: {accion: accion, id: id},
        success: function(datos)
          {
            if(datos == "Exito")
              {
                alertas("1","DATOS ELIMINADOS EXITOSAMETNE.");
              }
            else
              {
                alertas("2","LOS DATOS NO SE PUEDIERON ELIMINAR, PRO FAVOR INTENTELO MAS TARDE.");
              }
          }
      });
    setTimeout(function(){CargarPagina('#C_Secundario','paginas/configuracion/configuracion.php');}, 2000);
  }


function GuardarElementos(bd)
  {
    id        = document.getElementById('id').value;
    codigo    = document.getElementById('codigo').value;
    elemento  = document.getElementById('elemento').value;

    accion = "GuardarElementos";

    $.ajax(
        {
          type: "GET",
          url: "acciones.php",
          data: {accion: accion, bd: bd, id: id, codigo: codigo, elemento: elemento},
          success: function(datos)
            {
              if(datos == "Exito")
                {
                  alertas("1","DATOS ALMACENADOS EXITOSAMENTE.");
                  if(bd == 1){setTimeout(function(){CargarPagina('#ContenedorUsuarios','paginas/configuracion/tipodocumentos.php');}, 1000);}
                  if(bd == 2){setTimeout(function(){CargarPagina('#ContenedorUsuarios','paginas/configuracion/escolaridad.php');}, 1000);}
                  if(bd == 3){setTimeout(function(){CargarPagina('#ContenedorUsuarios','paginas/configuracion/etnia.php');}, 1000);}
                  if(bd == 4){setTimeout(function(){CargarPagina('#ContenedorUsuarios','paginas/configuracion/genero.php');}, 1000);}
                  if(bd == 5){setTimeout(function(){CargarPagina('#ContenedorUsuarios','paginas/configuracion/orientacion.php');}, 1000);}
                  if(bd == 6){setTimeout(function(){CargarPagina('#ContenedorUsuarios','paginas/configuracion/poblacion.php');}, 1000);}
                  if(bd == 7){setTimeout(function(){CargarPagina('#ContenedorUsuarios','paginas/configuracion/labits.php');}, 1000);}
                  if(bd == 8){setTimeout(function(){CargarPagina('#ContenedorUsuarios','paginas/configuracion/subreceptor.php');}, 1000);}
                }
              else
                {
                  alertas("2","LOS DATOS NO SE PUEDIERON ALMACENAR, INTENETLO NUEVAMENTE.");
                }
            }
        });

  }




function CargarReportes(contenedor, pagina)
  {
    inicio = document.getElementById('inicial').value;
    fin    = document.getElementById('final').value;

    $(contenedor).load(pagina+ "?inicio=" + inicio + "&fin=" + fin);
  }



//function Asignarcalendario()
//  {
//    anio = document.getElementById('anio').value;
//    $("#fecha1").html('<input type="date" name="inicial" id="inicial" style="width: 90%;" min="'+anio+'-01-01" max="'+anio+'-12-31" value="'+anio+'-01-01">');
//    $("#fecha2").html('<input type="date" name="final"   id="final"   style="width: 90%;" min="'+anio+'-01-01" max="'+anio+'-12-31" value="'+anio+'-12-31">');
//  }




function BuscarRegistrosDatos()
  {
    expedienter = document.getElementById('expedienter').value;
    fechar = document.getElementById('fechar').value;

    accion = "BuscarRegistrosDatos";

    $.ajax(
        {
          type: "GET",
          url: "acciones.php",
          data: {accion: accion, expedienter: expedienter, fechar: fechar},
          success: function(datos)
            {
              resultado = datos.split('*');
              document.getElementById('frascosR').value = resultado[0];
              document.getElementById('creatininar').value = resultado[1];
              document.getElementById('vihr').value = resultado[2];
              document.getElementById('sifilisr').value = resultado[3];
              document.getElementById('hepatitisbr').value = resultado[4];
              document.getElementById('hepatitiscr').value = resultado[5];
              document.getElementById('itsrr').value = resultado[6];
              document.getElementById('filtradoGlomr').value = resultado[7];
              document.getElementById('rprSifr').value = resultado[8];
              document.getElementById('notas').value = resultado[9];
            }
        });
  }

































































































































































/* --------------------------------------------------------------------------------------------------------------- */
/* FUNCIONES PARA LA SECCION DE LISTADO DE PUBLICACIONES */
/* --------------------------------------------------------------------------------------------------------------- */
// MUESTRA LOS TDR CARGADOS A CADA CONSULTORIA
function cargar_tdr(documento)
  {
    $("#PDFConsultoria").html("<iframe src='tdrs/" + documento + "' style='border: none; background: #88AEC5; width: 100%; height: 450px;'></iframe>");
  }



















/* --------------------------------------------------------------------------------------------------------------- */
/* FUNCIONES PARA LA SECCION DE PUBLICACIÓN */
/* --------------------------------------------------------------------------------------------------------------- */
// GUARDA LOS DATOS DE LA PUBLICACION
function GuardarPublicacion()
  {

    codigo = document.getElementById('codigo').value;
    categoria = document.getElementById('categoria').value;
    consultoria = document.getElementById('consultoria').value;
    carpeta = document.getElementById('carpeta').value;
    publicacion = document.getElementById('publicacion').value;
    fechainicio = document.getElementById('fechainicio').value;
    fechafin = document.getElementById('fechafin').value;
    partida = document.getElementById('linpresupuestaria').value;
    linpresupuestaria = document.getElementById("linpresupuestaria").options[document.getElementById("linpresupuestaria").selectedIndex].text;
    monto = document.getElementById('monto').value;
    publicado = document.getElementById('publicado').value;
    adjudicado = document.getElementById('adjudicado').value;
    finalizada = document.getElementById('finalizada').value;

    accion = "GuardarPublicacion";

    $.ajax(
      {
        type: "GET",
        url: "acciones.php",
        data: {accion: accion, codigo: codigo, categoria: categoria, consultoria: consultoria, carpeta: carpeta, publicacion: publicacion, fechainicio: fechainicio, fechafin: fechafin, partida: partida, linpresupuestaria: linpresupuestaria, monto: monto, publicado: publicado, adjudicado: adjudicado, finalizada: finalizada},
        success: function(datos)
          {
            if(datos == "Exito 01"){alertas("1","Publicación almacenada exitosamete."); upload(); document.getElementById('form').reset();}
            if(datos == "Error 01"){alertas("2","Los datos de esta publicación no pudieron ser almacenados, por favor revise su información.");}
            if(datos == "Error 02"){alertas("2","Los datos de esta publicación ya existen, por lo que no se a guardado la información.");}
          }
      });
    tope('contenedor01');
  }

    // SUBIR LOS TDR AL SERVIDOR
    function upload()
      {
        codigo = document.getElementById('codigo').value;

        var inputFileTdr = document.getElementById("tdr");
        var file = inputFileTdr.files[0];
        var data = new FormData();
        data.append('tdr',file);

        $.ajax(
          {
            url: "subirtdr.php",          // Url to which the request is send
            type: "POST",                 // Type of request to be send, called as method
            data: data,                   // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,           // The content type used when sending data to the server.
            cache: false,                 // To unable request pages to be cached
            processData:false,            // To send DOMDocument or non processed data file it is set to false
            success: function(datam)       // A function to be called if request succeeds
              {
                if(datam == 2)
                  {

                  }
                else
                  {
                    AgregarDocumento(codigo, datam);
                  }
              }
          });
      }

        function AgregarDocumento(codigo1, file1)
          {
            accion = "AgregarDocumento";
            $.ajax(
              {
                type: "GET",
                url: "acciones.php",
                data: {accion: accion, codigo: codigo1, archivo: file1},
                success: function(datos)
                  {

                  }
              });
          }

function BuscarPublicacion(correlb)
  {
    accion = "BuscarPublicacion";
    $.ajax(
      {
        type: "GET",
        url: "acciones.php",
        data: {accion: accion, correl: correlb},
        success: function(datos)
          {
            CargarPagina('publicacones.php');
            setTimeout(function(){CargarDatosConsultoria(datos);}, 1000);
          }
      });
  }

    function CargarDatosConsultoria(recibido)
      {
        resultado = recibido.split("*");
        document.getElementById('codigo').value = resultado[0];
        document.getElementById('categoria').value = resultado[1];
        document.getElementById('consultoria').value = resultado[2];
        document.getElementById('carpeta').value = resultado[3];
        document.getElementById('publicacion').value = resultado[4];
        document.getElementById('fechainicio').value = resultado[5];
        document.getElementById('fechafin').value = resultado[6];
        document.getElementById('linpresupuestaria').value = resultado[7];
        document.getElementById('monto').value = resultado[8];
        document.getElementById('publicado').value = resultado[9];
        document.getElementById('adjudicado').value = resultado[10];
        document.getElementById('finalizada').value = resultado[11];
      }



















/* --------------------------------------------------------------------------------------------------------------- */
/* FUNCIONES PARA LA RECEPCIÓN Y CONTROL DE PROPUESTAS */
/* --------------------------------------------------------------------------------------------------------------- */
// BUSCA EL CODIGO DE LA PROPUESTA SELECCIONADA Y ASIGNA LOS DATOS REQUERIDOS
function CargarPaginaPropuestas(codigo)
  {
    accion = "CargarPaginaPropuestas";
    $.ajax(
      {
        type: "GET",
        url: "acciones.php",
        data: {accion: accion, codigo: codigo},
        success: function(datos)
          {
            CargarPagina('propuestas.php?cod=' + codigo);
            setTimeout(function(){CargarDatosPropuestas(datos,codigo);}, 1000);
          }
      });
  }
    function CargarDatosPropuestas(dat,cod)
      {
        document.getElementById('correlativopropuesta').value = dat;
        document.getElementById('codigopropuesta').value = cod;

        document.getElementById('correlativoreunion').value = dat;
        document.getElementById('codigoreunion').value = cod;
      }

function GuardarDatosPropuestas()
  {
    correlativopropuesta = document.getElementById('correlativopropuesta').value;
    codigopropuesta = document.getElementById('codigopropuesta').value;
    numeropropuesta = document.getElementById('numeropropuesta').value;
    nombreconsultor = document.getElementById('nombreconsultor').value;
    fechapropuesta = document.getElementById('fechapropuesta').value;
    horarecepcion = document.getElementById('horarecepcion').value;

    accion = 'GuardarDatosPropuestas';

    $.ajax(
      {
        type: "GET",
        url: "acciones.php",
        data: {accion: accion, correlativo: correlativopropuesta, codigo: codigopropuesta, numero: numeropropuesta, consultor: nombreconsultor, fecha: fechapropuesta, hora: horarecepcion},
        success: function(datos)
          {
            if(datos == "Exito")
              {
                CargarPagina('propuestas.php?cod=' + codigopropuesta);
                setTimeout(function(){CargarDatosPropuestas(correlativopropuesta,codigopropuesta);}, 1000);
                alertas("1","Datos almacenados exitosamete.");
                document.getElementById("form1").reset();
                document.getElementById('correlativopropuesta').value = correlativopropuesta;
                document.getElementById('codigopropuesta').value = codigopropuesta;
              }
            else
              {
                alertas("2","Existe un problema con la información, por favor revise sus datos.");
              }

          }
      });
  }



















/* --------------------------------------------------------------------------------------------------------------- */
/* FUNCIONES PARA LA SECCION DE PROGRAMAR REVISIÓN DE PROPUESTAS */
/* --------------------------------------------------------------------------------------------------------------- */
function GuardarDatosReunion()
  {
    correlativoreunion = document.getElementById('correlativoreunion').value;
    codigoreunion = document.getElementById('codigoreunion').value;
    fechareunion = document.getElementById('fechareunion').value;
    horareunion = document.getElementById('horareunion').value;
    correosreunion = document.getElementById('correosreunion').value;
    salonreunion = document.getElementById('salonreunion').value;

    accion = "GuardarDatosReunion";

    $.ajax(
      {
        type: "GET",
        url: "acciones.php",
        data: {accion: accion, correlativo: correlativoreunion, codigo: codigoreunion, fecha: fechareunion, hora: horareunion, correos: correosreunion, salon: salonreunion},
        success: function(datos)
          {
            if(datos == "Exito")
              {
                CargarPagina('propuestas.php?cod=' + codigoreunion);
                setTimeout(function(){CargarDatosReunion(correlativoreunion,codigoreunion);}, 1000);
                alertas("1","Datos almacenados exitosamete.");
                document.getElementById("form2").reset();
                document.getElementById('correlativoreunion').value = correlativoreunion;
                document.getElementById('codigoreunion').value = codigoreunion;
              }
            if(datos == "Error1")
              {
                alertas("2","No ha sido posible enviar el correo, por favor intentelo desde su correo institucional.");
              }
            if(datos == "Error2")
              {
                alertas("2","Los datos no han podido ser almacenados, por favor verifique su información.");
              }
          }
      });

  }
    function CargarDatosReunion(dat,cod)
      {
        document.getElementById('correlativopropuesta').value = dat;
        document.getElementById('codigopropuesta').value = cod;

        document.getElementById('correlativoreunion').value = dat;
        document.getElementById('codigoreunion').value = cod;
      }

function buscarPacientes(){
  var nombre = document.getElementById('nombre').value;
  var apellido = document.getElementById('apellido').value;
  var dpi = document.getElementById('dpi').value;

  accion = "buscarPaciente";

  $.ajax({
    type: "GET",
    url: "acciones.php",
    data: {accion: accion, nombre: nombre, apellido: apellido, dpi: dpi},
    success: function(datos){
      $("#resultados").html(datos);
    }
  });
}

function Deshabilitar(expediente)
  {
    var expediente1 = expediente;
    accion = "deshabilitar";

    $.ajax(
        {
          type: "GET",
          url: "acciones.php",
          data: {accion: accion, expediente1: expediente1},
          success: function(datos) {
              setTimeout(function(){CargarPagina('#C_Secundario','paginas/registros/registros.php');}, 1000);
            }
        });
  }
  function Trasladar(expediente, expediente2)
    {
      var expediente1 = expediente;
      var expediente2 = expediente2;

      accion = "trasladar";

      $.ajax(
          {
            type: "GET",
            url: "acciones.php",
            data: {accion: accion, expediente1: expediente1, expediente2: expediente2},
            success: function(datos) {
                setTimeout(function(){CargarPagina('#C_Secundario','paginas/registros/registros.php');}, 1000);
              }
          });
    }
