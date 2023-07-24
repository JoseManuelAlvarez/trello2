
// List 1
$('#items-1').sortable({
    group: 'list',
    animation: 200,
    ghostClass: 'ghost',
    onSort: reportActivity,
});

// List 2
$('#items-2').sortable({
    group: 'list',
    animation: 200,
    ghostClass: 'ghost',
    onSort: reportActivity,
});

// Arrays of "data-id"
$('#get-order').click(function() {
    var sort1 = $('#items-1').sortable('toArray');
    console.log(sort1);
    var sort2 = $('#items-2').sortable('toArray');
    console.log(sort2);
}); 

// Report when the sort order has changed
function reportActivity() {
    console.log('The sort order has changed');
};
function agregarNuevaTabla(){
    $('#demo').append('<div id="items-3" class="list-group col"><div id="item-3.1" data-id="3.1" class="list-group-item nested-1">Item 3.1</div> <div id="item-3.2" data-id="3.2" class="list-group-item nested-1">Item 3.2</div> <div id="item-3.3" data-id="3.3" class="list-group-item nested-1">Item 3.3</div> <div id="item-3.4" data-id="3.4" class="list-group-item nested-1">Item 3.4</div> <div id="item-3.5" data-id="3.5" class="list-group-item nested-1">Item 3.5</div></div>');
    $('#items-3').sortable({
        group: 'list',
        animation: 200,
        ghostClass: 'ghost',
        onSort: reportActivity,
    });
    
}
function showProyect(id){
    console.log('funciona: '+id)
    $.ajax({
        type: 'POST', 
        url: './php/consultar_proyecto_usuario.php',
        data: 'idProyect=' + id,
        dataType: 'json',
        success: function(data) {
            console.log(data);
            
            document.getElementById('contendor-principal').innerHTML = data.columns;
            let numColumn = Number(data.numColumn);
            addFunctionColumn(numColumn);
            //console.log(data.consulta);
            //contendor-principal
        },
        error: function(jqXHR, estado, error) {
            //console.log('Estado: ' + estado);
            //console.log('Error: ' + error)
            console.log(jqXHR);
        },
    });
}
function addFunctionColumn(num){
    for (let index = 1; index <= num; index++) {
        $('#column-'+index).sortable({
            group: 'list',
            animation: 200,
            ghostClass: 'ghost',
            onSort: reportActivity,
        });
        
    }
}
function editarTarea(id) {
    console.log('Tarea seleccionada: '+id)
    $.ajax({
        type: 'POST', 
        url: url,
        data: 'atribute=' + atribute+'&atribute1='+atribute1, 
        //dataType: 'json',
        success: function(data) {
            //console.log(data);
            //console.log(data.consulta);
        },
        error: function(jqXHR, estado, error) {
            //console.log('Estado: ' + estado);
            //console.log('Error: ' + error)
            console.log(jqXHR);
        },
    });
    
    document.getElementById('tarea-editar').style.display = 'block';

}

function cerrarEdicionTarea() {
    document.getElementById('tarea-editar').style.display = 'none';
}