<?php
/**
 * Created by PhpStorm.
 * User: alexj
 * Date: 09-04-2017
 * Time: 22:38
 */

function getNavBar () {

    echo "
    
        <div class=\"navbar navbar-default navbar-fixed-top\">
			<div class=\"container\">
				<div class=\"navbar-header\">
					<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
						<span class=\"icon-bar\"></span>
						<span class=\"icon-bar\"></span>
						<span class=\"icon-bar\"></span>
					</button>
					<meta itemprop=\"image\" content=\"http://www.cognitivo.cl/\"><img src=\"images/logo-cognitivo.png\" alt=\"Logo Cognitivo\" title=\"Cognitivo\" class=\"img-responsive\"/></a>
				</div>
				<div class=\"navbar-collapse collapse\">
					<ul class=\"nav navbar-nav navbar-right\">
						<li><a href=\"#home\">INICIO</a></li>
						<li class=\"dropdown\">
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">CENTRO <b class=\"caret\"></b></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"#staff\">Terapia</a></li>
								<li><a href=\"#mission\">Misión</a></li>
								<li><a href=\"#activities\">Talleres</a></li>
								<li><a href=\"#gallery\">Espacios terapéuticos</a></li>
								<li><a href=\"equipo/\">Equipo</a></li>
							</ul>
						</li>
						<li><a href=\"#membership\">VALORES</a></li>
						<li><a href=\"ados/\">ADOS-2</a></li>
						<li class=\"dropdown\">
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">BLOG <b class=\"caret\"></b></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"#news\">Últimos Post</a></li>
								<li><a href=\"blog/\">Nuestro Blog</a></li>
							</ul>
						</li>
						<li><a href=\"#contact\">CONTACTO</a></li>
					</ul>
				</div>
			</div>
		</div>
    
    ";

}

function getNavBar2 () {

    echo "
    
        <div class=\"navbar navbar-default navbar-fixed-top\">
			<div class=\"container\">
				<div class=\"navbar-header\">
					<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
						<span class=\"icon-bar\"></span>
						<span class=\"icon-bar\"></span>
						<span class=\"icon-bar\"></span>
					</button>
					<meta itemprop=\"image\" content=\"http://www.cognitivo.cl/\"><img src=\"../images/logo-cognitivo.png\" alt=\"Logo Cognitivo\" title=\"Cognitivo\" class=\"img-responsive\"/></a>
				</div>
				<div class=\"navbar-collapse collapse\">
					<ul class=\"nav navbar-nav navbar-right\">
						<li><a href=\"../index.php#home\">INICIO</a></li>
						<li class=\"dropdown\">
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">CENTRO <b class=\"caret\"></b></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"../index.php#staff\">Terapia</a></li>
								<li><a href=\"../index.php#mission\">Misión</a></li>
								<li><a href=\"../index.php#activities\">Talleres</a></li>
								<li><a href=\"../index.php#gallery\">Espacios terapéuticos</a></li>
								<li><a href=\"../equipo/\">Equipo</a></li>
							</ul>
						</li>
						<li><a href=\"../index.php#membership\">VALORES</a></li>
						<li><a href=\"../ADOS-2/\">ADOS-2</a></li>
						<li class=\"dropdown\">
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">BLOG <b class=\"caret\"></b></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"../index.php#news\">Últimos Post</a></li>
								<li><a href=\"../blog/\">Nuestro Blog</a></li>
							</ul>
						</li>
						<li><a href=\"../index.php#contact\">CONTACTO</a></li>
					</ul>
				</div>
			</div>
		</div>
    
    ";

}

function getFooter (){
    echo "
    
        <footer>
			<div class=\"container\">
				<div class=\"row text-center\">
					<div class=\"col-sm-12\">
						<p>&copy; 2017 Cognitivo. <span itemprop=\"address\" itemscope itemtype=\"http://schema.org/PostalAddress\">
							<span itemprop=\"streetAddress\">Canela Alta 2803, Puente Alto</span>, 
							<span itemprop=\"addressLocality\">Santiago</span>
							<meta itemprop=\"addressCountry\" content=\"Chile\">
							<meta itemprop=\"addressRegion\" content=\"Metropolitana\"></span>.<br/>
							<span itemprop=\"telephone\">+569 513 48 700, +562 240 75 677</span>, <a href=\"mailto:hola@cognitivo.cl\">
							<span itemprop=\"email\">hola@cognitivo.cl</span></a><br/>
						Development by <a href=\"http://www.iongroup.cl/\" target=\"_blank\">Ion Group</a></p>
						<ul>
							<li><a href=\"https://www.facebook.com/cognitivocentro\" target=\"_blank\"><i class=\"fa fa-facebook fa-lg\"></i></a></li>
							<!-- <li><a href=\"http://twitter.com/\" target=\"_blank\"><i class=\"fa fa-twitter fa-lg\"></i></a></li>
							<li><a href=\"http://plus.google.com/\" target=\"_blank\"><i class=\"fa fa-google-plus fa-lg\"></i></a></li>
							<li><a href=\"http://tumblr.com/\" target=\"_blank\"><i class=\"fa fa-tumblr fa-lg\"></i></a></li>
							<li><a href=\"http://dribbble.com/\" target=\"_blank\"><i class=\"fa fa-dribbble fa-lg\"></i></a></li>
							<li><a href=\"http://xing.com/\" target=\"_blank\"><i class=\"fa fa-xing fa-lg\"></i></a></li>
							<li><a href=\"http://youtube.com/\" target=\"_blank\"><i class=\"fa fa-youtube fa-lg\"></i></a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</footer>
    
    ";
}