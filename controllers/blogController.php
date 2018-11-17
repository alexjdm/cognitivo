<?php

require_once ("businesslogic/Entrada.php");

class blogController {

    public $pageTitle = "Cognitivo Centro de Terapias";
    public $pageDescription = "Centro de terapia especialista en Autismo. Contamos con especialidades en Fonoaudiología, Terapia Ocupacional, Psicología y Psicopedagogía.";
    public $page = 'views/home/index.php';
    public $navbar = 'navbar.php';
    public $navbarfooter = 'navbar-footer.php';

    public function index() {
        $this->pageTitle = 'Blog | Cognitivo';
        $this->pageDescription = "Blog orientado a autismo.";
        $this->pageKeywords = "Blog, Autismo, TEA";
        $this->page = 'views/blog/index.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        $entradaBusiness = new Entrada();
        $entradas = $entradaBusiness->getAll();

        require_once('views/layout.php');
    }

    public function cuantotiempousochupete() {
        $this->pageTitle = 'Blog | Cognitivo';
        $this->pageDescription = "Blog orientado a autismo.";
        $this->pageKeywords = "Blog, Autismo, TEA";
        $this->page = 'views/blog/cuanto-tiempo-uso-chupete.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function fenomenocausaefectobebe() {
        $this->pageTitle = 'Blog | Cognitivo';
        $this->pageDescription = "Blog orientado a autismo.";
        $this->pageKeywords = "Blog, Autismo, TEA";
        $this->page = 'views/blog/fenomeno-causa-efecto-bebe.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function aporteterapeutaocupacional() {
        $this->pageTitle = 'Blog | Cognitivo';
        $this->pageDescription = "Blog orientado a autismo.";
        $this->pageKeywords = "Blog, Autismo, TEA";
        $this->page = 'views/blog/aporte-terapeuta-ocupacional.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function queeslapsicopedagogia() {
        $this->pageTitle = '¿Qué es la Psicopedagogía? | Blog Cognitivo';
        $this->pageDescription = "Una breve descripción acerca de que es la psicopedagogía, el proceso en dificultades del aprendizaje y te orientamos para saber cuando acudir a una psicopedagoga/o.";
        $this->pageKeywords = "Problemas de aprendizaje,  prevención, dificultades, psicopedagogía";
        $this->page = 'views/blog/que-es-la-psicopedagogia.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function queeslafonoaudiologia() {
        $this->pageTitle = '¿Qué es la Fonoaudiología? | Blog Cognitivo';
        $this->pageDescription = "Una breve descripción acerca de qué es la fonoaudiología y te orientamos para saber cuándo acudir a un(a) fonoaudiologo/a.";
        $this->pageKeywords = "fonoaudiología, cuando asistir al fonoaudiologo, que es la fonoaudiología";
        $this->page = 'views/blog/que-es-la-fonoaudiologia.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function tramitestea() {
        $this->pageTitle = '¿Cómo hacer trámites con un niño TEA? | Blog Cognitivo';
        $this->pageDescription = "Te contamos sobre una alternativa para realizar trámites en el Registro Civil.";
        $this->pageKeywords = "tea, autismo, registro civil, atenciones en terreno";
        $this->page = 'views/blog/tramites-tea.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function integracionsensorial() {
        $this->pageTitle = '¿Qué significa que mi hijo tenga dificultades en el procesamiento sensorial? | Blog Cognitivo';
        $this->pageDescription = "Este artículo explica de manera clara y detalla que es la integración sensorial.";
        $this->pageKeywords = "tea, autismo, integración sensorial";
        $this->page = 'views/blog/integracion-sensorial.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function juegoterapias() {
        $this->pageTitle = '¿Por qué mi hijo juega en las sesiones de terapia?| Blog Cognitivo';
        $this->pageDescription = "Este artículo explica la utilización del juego en los procesos terapeúticos de psicología.";
        $this->pageKeywords = "juegos en terapias";
        $this->page = 'views/blog/juego-terapias.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function porquemihijonotoleraalimentos() {
        $this->pageTitle = '¿Por qué mi hijo no tolera los alimentos? | Blog Cognitivo';
        $this->pageDescription = "Los problemas de alimentación son cada vez más comunes, sobretodo si los asociamos a la condición del Espectro Autista.";
        $this->pageKeywords = "integración sensorial, alimentación";
        $this->page = 'views/blog/por-que-mi-hijo-no-tolera-alimentos.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function comomecomunicoconmihijosinohabla() {
        $this->pageTitle = '¿Cómo me comunico con mi hijo si no habla? | Blog Cognitivo';
        $this->pageDescription = "Los problemas de alimentación son cada vez más comunes, sobretodo si los asociamos a la condición del Espectro Autista.";
        $this->pageKeywords = "integración sensorial, alimentación";
        $this->page = 'views/blog/como-me-comunico-con-mi-hijo-si-no-habla.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function desarrollohabilidadesyaprendizajesescolares() {
        $this->pageTitle = '¿Cómo ayudo a mi hijo a desarrollar habilidades y aprendizajes escolares? | Blog Cognitivo';
        $this->pageDescription = "Muchos padres buscan como apoyar a sus hijos en el ámbito escolar, pero no siempre encuentran las herramientas para lograrlo. ";
        $this->pageKeywords = "aprendizaje, habilidaes, escolaridad";
        $this->page = 'views/blog/desarrollo-habilidades-y-aprendizajes-escolares.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function ayudahijosenfermedadesrespiratorias() {
        $this->pageTitle = '¿Cómo ayudar a mi hijo con enfermedades respiratorias? | Blog Cognitivo';
        $this->pageDescription = "Muchos padres buscan como apoyar a sus hijos en el ámbito escolar, pero no siempre encuentran las herramientas para lograrlo. ";
        $this->pageKeywords = "enfermedad respiratoria, infección respiratoria";
        $this->page = 'views/blog/ayuda-hijos-enfermedades-respiratorias.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function habilidadesparentales() {
        $this->pageTitle = '¿Cómo aplicar las habilidades parentales cuando existen conductas  difíciles de manejar? | Blog Cognitivo';
        $this->pageDescription = "Al hablar del bienestar de niños, niñas y adolescentes uno de los principales focos de atención es la forma en la que sus padres se comenzarán a relacionar con ellos (as) desde sus primeros años de vida hasta su adolescencia, esto será de suma importancia para un mejor y adecuado desarrollo tanto físico, social y emocional, siendo la base para la llegada de la adultez.";
        $this->pageKeywords = "habilidades parentales, psicología, parentalidad positiva, hijos, situaciones complejas";
        $this->page = 'views/blog/habilidades-parentales.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function manejoconductasinapropiadasdemihijo() {
        $this->pageTitle = '¿Cómo manejo las conductas inapropiadas de mi hijo? | Blog Cognitivo';
        $this->pageDescription = "Dentro de la población infantil son comunes las expresiones de enfado, descontrol o desregulación emocional por medio de pataletas o comportamientos disruptivos. Estas pueden ocurrir por diversos factores, ya sean personales o ambientales, y es más común observarlas en niños que presentan condición del Espectro Autista, debido a las dificultades que presentan para manifestar sus estados emocionales, sus necesidades fisiológicas, sus intereses o deseos, entre otros aspectos.";
        $this->pageKeywords = "terapia ocupacional, parentalidad, hijos, conductas inapropiadas, autismo, tea";
        $this->page = 'views/blog/manejo-conductas-inapropiadas-de-mi-hijo.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function error() {
        $this->pageTitle = 'Error | Librodeasistencia';
        $this->pageDescription = "librodeasistencia.com permite gestionar el reloj control de asistencia biométrico en forma online. Software 100% web.";
        $this->pageKeywords = 'Reloj control, Asistencia, biometrico, control de asistencia, asistencia de personal, control empleados, reloj control digital, reloj control horario, control de asistencia laboral, control de asistencia de personal, control de asistencia con huella digital';
        $this->page = 'views/error/error.php';
        $this->navbar = 'navbar.php';
        $this->navbarfooter = 'navbar-footer.php';
        
        require_once('views/layout.php');
    }
}