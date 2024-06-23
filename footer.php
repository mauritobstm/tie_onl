<?php
    $get_query4 = "SELECT * FROM quienes";
    $from_db4 = mysqli_query($db_connect, $get_query4);
?> 

<footer class="section-p1">
        <div class="col" >
            <?php 
                $id = 1;
                foreach($from_db4 as $upload4):  
            ?>
            <h4><strong>Contacto</strong></h4>
            <p><i class="fal fa-map"></i> <?= nl2br($upload4['direccion']) ?></p>
            <p><i class="fas fa-phone-alt"></i> <?= nl2br($upload4['telefono']) ?></p>
            <p><i class="far fa-clock"></i> <?= nl2br($upload4['horario']) ?></p>
            <?php
                endforeach;
            ?> 
            <div class="follow">
                <h4><strong>Siguenos en</strong></h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col m-1">
            <h4><strong>Nosotros</strong></h4>
            <a href="about.php">Sobre Nosotros  </a>
            <a href="contact.php">Contactanos   </a>
        </div>

        <div class="col m-1">
            <h4><strong>Cuenta</strong></h4>
            <a href="/tienda-trabajo/panel/index.php" target="_blank">Iniciar Sesión</a>
            <a href="#">Ayuda Whats App</a>
        </div>

        

        <div class="copyright">
            <p>© 2024, Noche Caribeña - Ecommerce</p>
        </div>
  </footer>


