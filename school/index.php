<?php 
    require_once("pages/header.php");
?>
<!--HEADER-->
<body>
    <section class="banner">
            <article class="text">
                <h1 class="title"><span>WF</span> Schools</h1>
                <p>Preparando o seu filho para o futuro.</p>
                <span class="desc">Na nossa escola, acreditamos que educar vai além da sala de aula. O verdadeiro propósito do ensino<br>é preparar os nossos alunos para um futuro repleto de desafios e oportunidades.</span>
                <button class="banner_button"><a href="#">Matrículas</a><span class="material-symbols-outlined">arrow_right_alt</span></button>
            </article>
        </section>
    <main class="main">
        <section class="introduction">
            <div id="about" class="introduction_text">
                <span class="dest">Sobre nós</span>
                <h2>Nossos Valores</h2>
                <article class="cards">
                    <div class="card_values">
                        <span class="material-symbols-outlined">school</span>
                        <h4 class="name">Educação</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, tempore impedit ab expedita totam quaerat qui nostrum veniam sunt quae in deleniti temporibus sit eius atque quod vitae consequatur quis?</p>
                    </div>
                    <div class="card_values">
                        <span class="material-symbols-outlined">import_contacts</span>
                        <h4 class="name">Desenvolvimento</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, tempore impedit ab expedita totam quaerat qui nostrum veniam sunt quae in deleniti temporibus sit eius atque quod vitae consequatur quis?</p>
                    </div>
                    <div class="card_values">
                        <span class="material-symbols-outlined">stars</span>
                        <h4 class="name">Compromisso</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, tempore impedit ab expedita totam quaerat qui nostrum veniam sunt quae in deleniti temporibus sit eius atque quod vitae consequatur quis?</p>
                    </div>
                </article>
            </div>
        </section>
        <section class="courses">
            <div id="courses" class="introduction_text">
                <span class="dest">Cursos</span>
                <h2>Nossa Educação</h2>
            </div>
            <article class="cards">
                <div class="card_courses">
                    <div class="img">
                        <span class="material-symbols-outlined">bookmark</span>
                        <img src="imgs/ensino_infantil.jpg" alt="">
                    </div>
                    <article class="text">
                        <h4>Ensino Infantil</h4>
                        <p>Oferecemos uma metodologia eficiente desde a base para o desevolvimento do(a) seu(s) filho(a)(s).</p>
                        <button class="matriculas"><a href="#">Matrículas</a><span class="material-symbols-outlined">arrow_right_alt</span></button>
                    </article>
                </div>
                <div class="card_courses">
                    <div class="img">
                        <span class="material-symbols-outlined">book</span>
                        <img src="imgs/ensino_fundamental.jpg" alt="">
                    </div>
                    <article class="text">
                        <h4>Ensino Fundamental</h4>
                        <p>Oferecemos uma metodologia eficiente desde a base para o desevolvimento do(a) seu(s) filho(a)(s).</p>
                    <button class="matriculas"><a href="#">Matrículas</a><span class="material-symbols-outlined">arrow_right_alt</span></button>
                    </article>
                </div>
                <div class="card_courses">
                    <div class="img">
                        <span class="material-symbols-outlined">book</span>
                        <img src="imgs/ensino_medio.jpg" alt="">
                    </div>
                    <article class="text">
                        <h4>Ensino Médio</h4>
                        <p>Oferecemos uma metodologia eficiente desde a base para o desevolvimento do(a) seu(s) filho(a)(s).</p>
                        <button class="matriculas"><a href="#">Matrículas</a><span class="material-symbols-outlined">arrow_right_alt</span></button>
                    </article>
                </div>
                <div class="card_courses">
                    <div class="img ec">
                        <span class="material-symbols-outlined">star</span>
                        <img class="ec" src="imgs/icons/graduacao.png" alt="">
                    </div>
                    <article class="text">
                        <h4>Ensino Complementar</h4>
                        <p>Oferecemos uma metodologia eficiente desde a base para o desevolvimento do(a) seu(s) filho(a)(s).</p>
                    <button class="matriculas"><a href="">Matrículas</a><span class="material-symbols-outlined">arrow_right_alt</span></button>
                    </article>
                </div>
            </article>
        </section>
        <section class="contato">
            <div id="contact">
                <span class="dest">Contato</span>
                <h2>Fale Conosco</h2>
                    <p class="infor">Para melhorarmos o nosso trabalho, estamos sempre abertos para novas ideais, sugestões. Deixe o seu feeback, será um prazer lhe responder.</p>
            </div>
            <article class="forms">
                <form action="" method="post">
                    <h3>Preencha o formulário:</h3>
                    <p class="divisor">
                        <span>
                            <label for="">*Nome</label><br>
                            <input type="text" name="" id="">
                        </span>
                        <span>
                            <label for="">*Sobrenome</label><br>
                            <input type="text" name="" id="">
                        </span>
                    </p>
                    <p>
                        <label for="">*Email</label><br>
                        <input type="text" name="" id="" placeholder="email@gmail.com">
                    </p>
                    <p>
                        <label for="">*Número</label><br>
                        <input type="text" name="" id="" placeholder="(DDD) ">
                    </p>
                    <textarea name="" id="" cols="27" rows="10" placeholder="Comentário"></textarea>
                    <button>Enviar</button>
                </form>
                <!-- <div class="image">
                    Image
                </div> -->
            </article>
        </section>
    </main>
<!--FOOTER-->
<?php
    include("pages/footer.php");
?>
</body>
</html>