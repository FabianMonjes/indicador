window.onload = function () {
    var dataPoints = [];
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    var options = '';
    $.getJSON("https://mindicador.cl/api/", function(data) {  
        $.each(data, function(key, value){
            if(typeof(value.codigo)!="undefined"){
                options+='<option value="'+value.codigo+'">'+value.codigo+'</option>';
            }
        });
        $("#indicador").append(options);
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
        }
    }); 
    $.ajax({
        url:'ajaxdata',
        data:{'indicador': "uf", 'fecha' : today },
        type:'post',
        success: function (response) {
            $.each(response  , function(key, value) {
                dataPoints.push(
                    {
                        label: key, 
                        y: parseInt(value)
                    }
                );
            });
            chart.render();
        },
        statusCode: {
            404: function() {
                console.log('Error 404');
            }
        },
        error:function(x,xs,xt){
            console.log('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
        }
    });
    var chart = new CanvasJS.Chart("chartContainer",{
        title:{
            text:"Total de Indicadores"
        },
        data: [{
            type: "column",
            dataPoints : dataPoints,
        }]
    });
}
function load_graphic(){
    var dataPoints = [];
    var indicador = $("#indicador").val();
    var desde = $("#desde").val();
    var hasta = $("#hasta").val();
    var d = new Date(desde);
    var h = new Date(hasta);
    if(d>h){
        alert("Fecha desde debe ser menor a la fecha hasta");
    }else{
        var chart = new CanvasJS.Chart("chartContainer",{
            title:{
                text:"Indicadores "+indicador+""
            },
            data: [{
                type: "column",
                dataPoints : dataPoints,
            }]
        });
        $.ajax({
            url:'ajaxdataload',
            data:{'indicador': indicador, 'desde' : desde, 'hasta':hasta },
            type:'post',
            success: function (response) {
                $.each(response  , function(key, value) {
                    var valorp = value.serie[0].valor;
                    if(valorp == "undefined"){
                        valorp = 0;
                    }
                    dataPoints.push(
                        {
                            label: key, 
                            y: value.serie[0].valor
                        }
                    );
                });
                chart.render();
            },
            statusCode: {
                404: function() {
                    console.log('Error 404');
                }
            },
            error:function(x,xs,xt){
                console.log('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
        });
    }
}