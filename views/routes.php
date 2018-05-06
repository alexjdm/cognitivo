<?php

function breadcrumb(){

    $pagesWeb = array(
        'home' => ['home/', 'Inicio', 'Cognitivo'],
        'ados' => ['ados/', 'ADOS', 'ADOS - 2'],
        'equipo' => ['equipo/', 'Equipo Cognitivo', 'Equipo Cognitivo'],
        'blog' => ['blog/', 'Blog Cognitivo', 'Blog Cognitivo']
    );

    $url = rtrim($_SERVER["REQUEST_URI"],"/");
    $crumbs = explode("/", $url);
    unset($crumbs[0]);
    unset($crumbs[1]);

    $numItems = count($crumbs);
    $i = 0;
    foreach ($crumbs as $crumb)
    {
        if(++$i === $numItems) {
            echo '<li class="active">' . $pagesWeb[$crumb][1] . '</li>';
        }
        else
        {
            echo '<li><a href="' . $pagesWeb[$crumb][0] . '">' . $pagesWeb[$crumb][1] . '</a></li>';
        }
    }

}

function call($controller, $action, $post) {
    // require the file that matches the controller name
    require_once('controllers/' . $controller . 'Controller.php');

    // create a new instance of the needed controller
    switch($controller) {
        case 'home':
            $controller = new homeController();
            break;
        case 'blog':
            $controller = new blogController();
            break;
        case 'contact':
            $controller = new contactController();
            break;
        case 'account':
            $controller = new accountController();
            break;
        case 'admin':
            $controller = new adminController();
            break;
        case 'user':
            $controller = new userController();
            break;
//        case 'Inscritos':
//            $controller = new InscritosController();
//            break;
        case 'curso':
            $controller = new cursoController();
            break;
    }

    // call the action
    $controller->{ $action }($post);

}

// just a list of the controllers we have and their actions
// we consider those "allowed" values
$controllers = array(
    'home' => ['index', 'ados', 'equipo', 'condicionesplanes',
        'cursoteamanejoconductascomplejas', 'cursoteamanejoconductascomplejasprocess', 'cursoteamanejoconductascomplejasfinish', 'cursoteamanejoconductascomplejasnotifyjs',
        'cursodificultadessensorialesredsensorial', 'cursodificultadessensorialesredsensorialprocess', 'cursodificultadessensorialesredsensorialfinish', 'cursodificultadessensorialesredsensorialnotifyjs',
        'cursointegracionsensorialalimentacion', 'cursointegracionsensorialalimentacionprocess', 'cursointegracionsensorialalimentacionfinish', 'cursointegracionsensorialalimentacionnotifyjs',
        'error'],
    'blog' => ['index', 'cuantotiempousochupete', 'fenomenocausaefectobebe', 'aporteterapeutaocupacional', 'queeslapsicopedagogia',
        'queeslafonoaudiologia', 'tramitestea', 'integracionsensorial', 'juegoterapias',
        'error'],
    'contact' => ['contactpage', 'ados', 'error'],
    'account' => ['login', 'logout', 'dologin', 'remember', 'rememberMail', 'error'],
    'admin' => ['home',
        'cursos', 'inscritos', 'pagados', 'cursoedit', 'editcurso', 'createnewcurso', 'deletecurso',
        'inscritodetalle', 'updateinscrito', 'deleteinscrito', 'enviarcorreoconfirmacion',
        'enviarcorreomasivo',
        'error'],
    'user' => ['index', 'newUser', 'createNewUser', 'userEdit', 'editUser', 'deleteUser', 'fichas', 'profesionales',
        'sesiones', 'newSesion', 'createNewSesion', 'sesionEdit', 'editSesion', 'deleteSesion', 'recalcularNumeroSesion',
        'contacto', 'error'],
//    'Inscritos' => ['index', 'newInscritos', 'createNewInscritos', 'inscritosEdit', 'editInscritos', 'deleteInscritos', 'error'],
//    'Paciente' => ['index', 'newPaciente', 'createNewPaciente', 'viewPaciente', 'pacienteEdit', 'editPaciente', 'deletePaciente', 'error'],
    'curso' => ['index', 'inscritos', 'pagados', 'inscritoDetalle', 'deleteInscrito', 'updateInscrito', 'createNewCurso', 'cursoEdit', 'editCurso', 'deleteCurso', 'error']
);

// check that the requested controller and action are both allowed
// if someone tries to access something else he will be redirected to the error action of the home controller
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action, $post);
    } else {
        call('home', 'error');
    }
} else {
    call('home', 'error');
}