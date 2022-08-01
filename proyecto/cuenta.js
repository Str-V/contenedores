
//Se selecciona con jquerry el item fecha ya que se llama fecha id , cuando cambie el valor, ejecute la funcion ru timer
$('#fecha').on('change', run_timer);
function run_timer(){
    var fecha = $('#fecha').val(),
    limite = new Date(fecha).getTime(),
    wrapper =$('.wrapper_timer'),
    ahora = new Date().getTime(),
    restante = limite-ahora,
    dias = Math.floor(restante /(1000* 60 * 60 * 24)),
    horas = Math.floor((restante % (1000*60*60*24)) /(1000*60*60)),
    minutos = Math.floor((restante % (1000*60*60)) /(1000*60)),
    segundos = Math.floor((restante % (1000*60)) /(1000)),
    texto = '';

    //validacion , si el dia ya expiro

    if(restante <0){
    weapper.html ('<div class = "alert alert-danger text-center"');
        return;
    }

    //Mostrar texto

    if(dias>0){
        texto+=dias + 'dias,';
    }
    if(horas>0){
        texto+=horas + 'horas,';
    }
    if(minutos>0){
        texto+=minutos + 'minutos,';
    }
    if(segundos>0){
        texto+=segundos + 'segundos,';
    }
    wrapper.html(text);
    setTimeout(num_timer, 1000);

}