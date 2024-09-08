<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Usuarios';
        $this->views->getView('admin/usuarios', "index", $data);
    }
    public function listar()
    {
        $data = $this->model->getUsuarios(1);
        for ($i = 0; $i < count($data); $i++) { 
            $data[$i]['accion'] = '<div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editUser('.$data[$i]['id'].')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-success" type="button" onclick="eliminarUser('.$data[$i]['id'].')">HABILITADO</button>
            </div>';
        }
        echo json_encode($data);
        die();
    }
    public function registrar()
    {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $id = $_POST['id'];
            $hash = password_hash($clave, PASSWORD_DEFAULT);
            if (empty($_POST['nombre'])  || empty($_POST['apellido'])) {
                $respuesta = array('msg' => 'TODOS LOS CAMPOS NECESITAN SER RELLENADOS', 'icono' => 'warning');
            } else {
                if (empty($id)) {
                    $result = $this->model->verificarCorreo($correo);
                    if (empty($result)) {
                        $data =  $this->model->registrar($nombre, $apellido, $correo, $hash);
                        if ($data > 0) {
                            $respuesta = array('msg' => 'USUARIO REGISTRO', 'icono' => 'success');
                        } else {
                            $respuesta = array('msg' => 'ERROR AL REGISTRAR', 'icono' => 'error');
                        }
                    } else {
                        $respuesta = array('msg' => 'CORREO YA EXISTENTE', 'icono' => 'warning');
                    }
                } else {
                    $data =  $this->model->modificar($nombre, $apellido, $correo, $id);
                    if ($data == 1) {
                        $respuesta = array('msg' => 'USUARIO MODIFICADO', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'ERROR AL MODIFICAR', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }
    //Funcion para eliminar usuarios
    public function delete($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->eliminar($idUser);
            if ($data == 1) {
                $respuesta = array('msg' => 'EL ADMINISTRADOR HA SIDO DADO DE BAJA', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'ERROR AL ELIMINAR', 'icono' => 'error');
            }
        }else{
            $respuesta = array('msg' => 'ERROR DESCONOCIDO', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }
    //Funcion para editar datos de usuarios
    public function edit($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->getUsuario($idUser);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
