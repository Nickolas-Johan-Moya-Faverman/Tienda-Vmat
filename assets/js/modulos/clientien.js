const frm = document.querySelector('#frmRegistro');
const titleModal = document.querySelector('#titleModal');
const btnAccion = document.querySelector('#btnAccion');
const habilitar = document.querySelector('#habilitar');
const myModal = new bootstrap.Modal(document.getElementById('nuevoModal'))
let tblClientien;


document.addEventListener('DOMContentLoaded', function(){
    tblClientien = $('#tblClientien').DataTable({
        ajax: {
            url: base_url + 'clientien/listarclien',
            dataSrc: '',
        },
        columns: [
            { data: 'id' },
            { data: 'nombre' },
            { data: 'correo' },
            { data: 'clave' },
            { data: 'perfil' },
            { data: 'accion' }
        ],
        language,
        dom,
        buttons,
    });
    //Registro de usuarios nuevos
    frm.addEventListener('submit', function(e) {
        e.preventDefault();
        let data = new FormData(this);
        const url = base_url + "clientien/registrarClien";
        const http = new XMLHttpRequest();
        http.open("POST", url, true)
        http.send(data);
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res.icono == 'success') {
                    myModal.hide();
                    tblClientien.ajax.reload();
                }
                Swal.fire('AVISO', res.msg.toUpperCase(), res.icono)
            }
        }
    });
});

function eliminarClien(idClien) {
    Swal.fire({
        title: 'AVISO',
        text: "Esta seguro de inhabilitar al cliente?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, INHABILITAR'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "clientien/deleteClien/" + idClien;
            const http = new XMLHttpRequest();
            http.open("GET", url, true)
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res.icono == 'success') {
                        tblClientien.ajax.reload();
                    }
                    Swal.fire('AVISO', res.msg.toUpperCase(), res.icono)
                }
            }
        }
    })
};

function editClien(idClien) {
    const url = base_url + "clientien/editClien/" + idClien;
    const http = new XMLHttpRequest();
    http.open("GET", url, true)
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.querySelector('#id').value = res.id;
            document.querySelector('#nombre').value = res.nombre;
            document.querySelector('#correo').value = res.correo;
            document.querySelector('#clave').value = res.clave;
            btnAccion.textContent = 'Actualizar';
            titleModal.textContent = 'MODIFICAR CLIENTE';
            myModal.show();
            //$('#nuevoModal').modal('show');
        }
    }
}