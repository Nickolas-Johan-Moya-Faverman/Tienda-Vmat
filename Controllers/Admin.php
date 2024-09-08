<?php
class Admin extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Acceso al sistema';
        $this->views->getView('admin', "login", $data);
    }
    public function validar()
    {
        if (isset($_POST['email']) && isset($_POST['clave'])) {
            if (empty($_POST['email']) || empty($_POST['clave'])) {
                $respuesta = array('msg' => 'TODOS LOS CAMPOS NECESITAN SER RELLENADOS', 'icono' => 'warning');
            }else{
                $data = $this->model->getUsuario($_POST['email']);
                if (empty($data)) {
                    $respuesta = array('msg' => 'EL CORREO NO EXISTE', 'icono' => 'warning');
                }else{
                    if ($data['estado'] == 0) {
                        $respuesta = array('msg' => 'USTED ESTA INHABILITADO', 'icono' => 'warning');
                    } else {
                        if (password_verify($_POST['clave'], $data['clave'])) {
                            $_SESSION['email'] = $data['correo'];
                            $_SESSION['nombre_usuario'] = $data['nombres'];
                            $respuesta = array('msg' => 'DATOS CORRECTOS', 'icono' => 'success');
                        }else{
                            $respuesta = array('msg' => 'CONTRASEÑA INCORRECTA, REVISE LOS DATOS INGRESADOS', 'icono' => 'warning');
                        }
                    }
                }
            }
        }else{
            $respuesta = array('msg' => 'ERROR DESCONOCIDO', 'icono' => 'error');
        }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function home()
    {
        $data['title'] = 'Panel Administrativo';
        $data['pendientes'] = $this->model->getTotales(1);
        $data['procesos'] = $this->model->getTotales(2);
        $data['finalizados'] = $this->model->getTotales(3);
        $data['productos'] = $this->model->getProductos();
        $this->views->getView('admin/administracion', "index", $data);
    }
    public function productosMinimos()
    {
        $data = $this->model->productosMinimos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function topProductos()
    {
        $data = $this->model->topProductos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function salir()
    {
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}