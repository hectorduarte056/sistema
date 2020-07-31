/*=============================================
VARIABLE LOCAL STORAGE
=============================================*/

if(localStorage.getItem("capturarRango4") != null){

  $("#daterange-btn4 span").html(localStorage.getItem("capturarRango4"));


}else{

  $("#daterange-btn4 span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}

/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn4').daterangepicker(
  {
    ranges   : {
      // 'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn4 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn4 span").html();
   
    localStorage.setItem("capturarRango4", capturarRango);

    window.location = "index.php?ruta=reportes-compras&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensright .range_inputs .cancelBtn").on("click", function(){

  localStorage.removeItem("capturarRango4");
  localStorage.clear();
  window.location = "reportes-compras";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensright .ranges li").on("click", function(){

  var textoHoy = $(this).attr("data-range-key");

  if(textoHoy == "Hoy"){

    var d = new Date();
    
    var dia = d.getDate();
    var mes = d.getMonth()+1;
    var año = d.getFullYear();
 
    dia = ("0"+dia).slice(-2);
    mes = ("0"+mes).slice(-2);

    var fechaInicial = año+"-"+mes+"-"+dia;
    var fechaFinal = año+"-"+mes+"-"+dia; 

      localStorage.setItem("capturarRango4", "Hoy");

      window.location = "index.php?ruta=reportes-compras/&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

})




