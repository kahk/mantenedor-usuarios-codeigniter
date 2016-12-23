$(document).ready(function(){
cargartabla();
 $('#btn_modificarUsuario').click(function(){
actualizar();
    });
});

function cargartabla(){      
    $('#tlbusuarios').html(
    '<tr>'+
         '<th>Id</th>'+'<th>|</th>'+
         '<th>Nombre</th>'+'<th>|</th>'+
         '<th>Apellido</th>'+'<th>|</th>'+
         '<th>Correo</th>'+'<th>|</th>'+
         '<th>Direccion</th>'+'<th>|</th>'+
         '<th>Telefono</th>'+'<th>|</th>'+
         '<th>Nick</th>'+'<th>|</th>'+
         '<th>Pass</th>'+'<th>|</th>'+
         '<th>Perfil</th>'+'<th>|</th>'+
         '<th>Modificar</th>'+'<th>|</th>'+
         '<th>Eliminar</th>'+
       '</tr>'
    );
    $.post(
        base_url+"Usuario/mostrar_usuarios",
    function(data){        
        var p = JSON.parse(data);
        $.each(p, function(i, item){
            $('#tlbusuarios').append(
                '<tr>'+
                '<td>'+item.id+'</td>'+'<td>|</td>'+
                '<td>'+item.nombre_usuario+'</td>'+'<td>|</td>'+
                '<td>'+item.apellido_usuario+'</td>'+'<td>|</td>'+
                '<td>'+item.correo_usuario+'</td>'+'<td>|</td>'+
                '<td>'+item.direccion_usuario+'</td>'+'<td>|</td>'+
                '<td>'+item.telefono_usuario+'</td>'+'<td>|</td>'+
                '<td>'+item.nick_usuario+'</td>'+'<td>|</td>'+
                '<td>'+item.pass_usuario+'</td>'+'<td>|</td>'+
                '<td>'+item.perfil_usuario+'</td>'+'<td>|</td>'+
                '<td><a href="#popup" class="buttom buttom-block" onclick="seleccionUsuario(\''+item.id+'\',\''+item.nombre_usuario+'\',\''+item.apellido_usuario+'\',\''+item.correo_usuario+'\',\''+item.direccion_usuario+'\',\''
                +item.telefono_usuario+'\',\''+item.nick_usuario+'\',\''+item.pass_usuario+'\',\''+item.perfil_usuario+'\');">Actualizar</a></td>'+'<td>|</td>'+
                '<td><a  class="buttom buttom-block" onclick="seleccionID(\''+item.id+'\');">Eliminar</a></td>'+
                '</tr>'
            );
        });
    });    

};

$('#btnrefrescar').click(function(){
cargartabla;
});

seleccionUsuario = function(id,nombre_usuario,apellido_usuario,correo_usuario,direccion_usuario,telefono_usuario,nick_usuario,pass_usuario,perfil_usuario){
    $('#frm_id').val(id);
    $('#frm_nombre').val(nombre_usuario);
    $('#frm_apellido').val(apellido_usuario);
    $('#frm_correo').val(correo_usuario);
    $('#frm_direccion').val(direccion_usuario);
    $('#frm_telefono').val(telefono_usuario);
    $('#frm_nick').val(nick_usuario);
    $('#frm_pass').val(pass_usuario);
    $('#frm_perfil').val(perfil_usuario);
};

 function actualizar(){
    var Id_U = $('#frm_id').val();
    var No_U = $('#frm_nombre').val();
    var Ap_U = $('#frm_apellido').val();
    var Co_U = $('#frm_correo').val();
    var Di_U = $('#frm_direccion').val();
    var Te_U = $('#frm_telefono').val();
    var Ni_U = $('#frm_nick').val();
    var Pa_U = $('#frm_pass').val();
    var Pe_U = $('#frm_perfil').val();
    $.post(base_url+"Usuario/actualizarUsuario",
    {
        id_usuario: Id_U,
        nombre_usuario: No_U,
        apellido_usuario: Ap_U,
        correo_usuario: Co_U,
        direccion_usuario: Di_U,
        telefono_usuario: Te_U,
        nick_usuario: Ni_U,
        pass_usuario: Pa_U,
        perfil_usuario: Pe_U
    },
    function(){
    cargartabla();  
    });
    
}


seleccionID = function(id){     //metodo eliminar
    //$('#id_eliminar').val(id);
    
    $.post(base_url+"Usuario/eliminar_usuario",
	{
    idU: id		
   },
   function(){
       cargartabla();       
   }
   
   );
}

function eliminarUsuario()
{

}

