<header class="background background3 background-image">
    <div class="container">
        <div class="row text-center no-fade">
            <div class="col-sm-12">
                <h1>Nuestro Blog</h1>
            </div>
        </div>
    </div>
</header>

<section id="blog">
    <div class="container">
        <div class="row no-fade">

            <!-- Posts Start -->

            <div class="col-sm-8 col-sm-offset-2">

                <?php foreach ($entradas as $entrada): ?>

                    <article class="post">
                        <h2 class="entry-title"><?php echo utf8_encode($entrada['TITULO']); ?></h2>
                        <div class="entry-meta">
                            <span class="date"><i class="fa fa-calendar"></i><?php echo $entrada['FECHA']; ?> Agosto 13, 2018</span>
                            <span class="author"><i class="fa fa-user"></i>Por <?php echo utf8_encode($entrada['AUTOR']); ?></span>
                        </div>
                        <div class="post-thumb">
                            <img src="<?php echo $entrada['URL_IMAGEN']; ?>" alt="<?php echo utf8_encode($entrada['ALT_IMAGEN']); ?>" class="img-responsive" />
                        </div>
                        <div class="entry-content">
                            <p><?php echo utf8_encode($entrada['DESCRIPCION']); ?></p>
                        </div>
                        <div class="post-more">
                            <a href="<?php echo $entrada['URL']; ?>" class="btn btn-primary">LEER MÁS</a>
                        </div>
                    </article>

                <?php endforeach; ?>

                <!-- <ul class="pager">
                    <li class="previous"><a href="#">&larr; Older</a></li>
                    <li class="next disabled"><a href="#">Newer &rarr;</a></li>
                </ul> -->

            </div>
            <!-- Posts End -->

        </div>
    </div>
</section>
