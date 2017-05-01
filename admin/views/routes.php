<?php
function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controllers/' . $controller . 'Controller.php');

    // create a new instance of the needed controller
    switch($controller) {
        case 'Account':
            $controller = new AccountController();
            break;
        case 'Home':
            $controller = new HomeController();
            break;
        case 'User':
            $controller = new UserController();
            break;
//        case 'Inscritos':
//            $controller = new InscritosController();
//            break;
        case 'Curso':
            $controller = new CursoController();
            break;
    }

    // call the action
    $controller->{ $action }();
}

// just a list of the controllers we have and their actions
// we consider those "allowed" values
$controllers = array(
    'Account' => ['login', 'logout', 'validation', 'remember', 'rememberMail', 'error'],
    'Home' => ['index', 'error'],
    'User' => ['index', 'newUser', 'createNewUser', 'userEdit', 'editUser', 'deleteUser', 'fichas', 'profesionales',
        'sesiones', 'newSesion', 'createNewSesion', 'sesionEdit', 'editSesion', 'deleteSesion', 'recalcularNumeroSesion',
        'contacto', 'error'],
//    'Inscritos' => ['index', 'newInscritos', 'createNewInscritos', 'inscritosEdit', 'editInscritos', 'deleteInscritos', 'error'],
//    'Paciente' => ['index', 'newPaciente', 'createNewPaciente', 'viewPaciente', 'pacienteEdit', 'editPaciente', 'deletePaciente', 'error'],
    'Curso' => ['index', 'inscritos', 'pagados', 'inscritoDetalle', 'deleteInscrito', 'updateInscrito', 'createNewCurso', 'cursoEdit', 'editCurso', 'deleteCurso', 'error']
);

// check that the requested controller and action are both allowed
// if someone tries to access something else he will be redirected to the error action of the home controller
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('Home', 'error');
    }
} else {
    call('Home', 'error');
}
?>