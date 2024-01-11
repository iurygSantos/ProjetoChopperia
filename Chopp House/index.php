<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> House Chopp Beer </title>	
    
    <link rel="icon" type="image/jpg" href="img/choppcup.png" />
    <link rel="stylesheet" href="css/style_produtos.css">
    <link rel="stylesheet" href="css/style_index.css">

</head>
<body>

<div class="carregando" id="carregando"></div>
<div class="corpo" id="corpo">
  
  <?php require_once 'index1.php'; ?>
  
  <div class="container--products">
    <div class="card-deck--product">  
        <?php
          $SQL_bd = "SELECT * FROM produtos WHERE desconto > 0"; 
          $result = mysqli_query($conectado, $SQL_bd) or die(mysqli_error($conectado));

          while ($registro = mysqli_fetch_assoc($result)) {
            $desconto = $registro['preco_barril'] * $registro['desconto']/100;
        ?>   
                <div class="card">
                  <div class="nome-produto" style="background-color: #A4A4A4;">
                    <?php echo $registro['nome_produto'];?>
                  </div>
                  <div class="card-body">
                    <?php 
                      echo '<img class="imgproduto" src="imagensLoja/' . $registro['imagemProduto'].'" />';
                      echo '<p class="preco"> De: R$ '.number_format($registro['preco_barril'], 2, ',', '.').'</p>';
                      echo '<p class="desconto"> Por: R$ '.number_format($desconto, 2, ',', '.').'</p>';
                      echo '<a href="carrinho.php?acao=add&idproduto='.$registro['idproduto'].'" class="btn btn-outline-primary btn-add"> Adicionar ao carrinho </a>'; 
                    ?> 
                  </div>
                </div> 
        <?php
          }
        ?>
    </div>
  </div>   


  <!-- slides -->
  <section class="body-slide">
    <div class="galeria-container"> 
      <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"><a href="#slide5"></a></li>
      </ol> 
      <div>    
        <div class="mySlides desap">
          <div class="numbertext">01 / 05</div>
          <img class="imgslide" src="slide/chopp1.png" alt="Arara Azul"/> 
        </div>

        <div class="mySlides desap">
          <div class="numbertext">02 / 05</div>
          <img class="imgslide" src="slide/chopp3.png" alt="Arara Azul"/>
        </div>

        <div class="mySlides desap">
          <div class="numbertext">03 / 05</div>
          <img class="imgslide" src="slide/chopp4.jpg" alt="Arara Azul"/>
        </div>

        <div class="mySlides desap">
          <div class="numbertext">04 / 05</div>
          <img class="imgslide" src="slide/chopp5.png" alt="Arara Azul"/>
        </div>

        <div class="mySlides desap">
          <div class="numbertext" id="slide5">05 / 05</div>
          <img class="imgslide" src="slide/chopp6.png" alt="Arara Azul"/>
        </div>
      </div>
      <a class="prev" onclick="showSlidePrev(-1)">
        <i class="fas fa-angle-left"></i>
      </a>
      <a class="next" onclick="showSlideNext(1)">
        <i class="fas fa-angle-right"></i>
      </a>
    </div>
  </section>   
  
    <section class="div-contact">
      <div class="img-homer">
        <img src="img/homer.png">
      </div>  
      <div class="contact">
        <div class="line"></div>
        <h3> Entre em contado conosco </h3>  
        <p><img title="whatsapp" src="data:image/png;base64,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">  
        </a>Fone: (55) 99962-2915</p>

        <p> 
        <img title="Gmail" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAR+SURBVGhD7Zbbb1RlFMXrf4ImPvkAvYkEqWjrrWIbRaLxAbyQFAFD0gciLxiMIERjIjcTEkwlJo3xwYITMsVeoKUtbWd6GTqdWmxLWoq0tE5nCjx2+62v+4xzWV/bBzNMzKxkJSfn22vt3+lMzrQgr7zyyuv/pyfPLgqzHue+GDysx7kvBg/rce6LwcN6nPti8LAe574YPKzHuS8GD+txbmndmcWvGOxajKzWPEaJPLHuTPwnBriSkUFWW/5bzez7aHus6qVHDyo2yuz+jyUU6JP+kT+d7o2MSVX9PAVlxiwyrMszdmI3GGJV5Y+mP92zW/FW1sz+D95G6EH5swkvbH9VIj4fXeS5Y2hMtl6IUuBkYwazrMMzdmFnMgOY7u/dXa2Ybs1Xlz9MCaoXX35Obp/8Vvojt+hSuGlgQkp+WKDgMM4ww7LWphs7sIsxzFdXPFRMtyJFhXJ3czEtgGcO1EgoOMABjBsCt+WZc/EMeNzDGcvA6EQ32wmDKVJcuPqb7Ob69QKPlxZK/MVSWhZ9p1JG/H4KAl/ompSnv//3IXCNe2wWRhc62S4wgMXjUky3Zp4vkfCG5eFI0QaZK+MPsfjKJpk4e8r5lfru2h15ysDDuGYzyKIDXWzHXFmJZQALmMCmmG4huGCeerR4OThk/MfxL53fy3u1e2Wwb5ACHm68a83OkEGWdWLX6PGjdjcYwAImnCmmW4kS46lNRbakoaVDOurrJbrj9ZRFnqPvbpPhpmYKyoxZZGiX2YFd2IndYACLd66YbiWXwfgK+a512cLL/ha5U7sv5dxz/LXNMn7+HAVONmYwyzqmTTd2YBd2sq+vYrqVHoCDw7fkSmfAFsOh06cMxJaMOfivz2plYDCcAY57OGMZdIVOn0z0X+kK2J1sVjHdYiEPoi0YkobWTruk5deLMrdzR8Ys/Pf7b0m4tTWRwzXusVl0oAudF003dng5Nq+YbrGQVwh3D43I5bZuu/C3pjYZ//yQ/ZVMz+CvOlZ33pp+WiaDLDrQhU50J+/KyBgrplsslFxqbV5/zd39djHcU/ejxKorMnIuY7a3ri6Rb+42/2uR1zHLKqZbLJRe7LljICyXri5/pfy+Rrn3yYcZ2XRjBrPIINtpOlg3zPKK6RYLsXLPveFR8V/vWQZqbZeRb07QHybcwxlm7ANf77VZ1uk5vQNWTLdYiJWn2Hz8VwODFgxu//kXib73ZiKPa9zzzjHr+gVPdjKDZ8V0i4VYOfONUMS8v29YSF9ji0wePGCNa3vPnGGGZZkZi2K6xUKs3OXg8Kj83hVM/LU94x7e7SzjMmNRTLdYiJWv5va+m/a9fskY12xmNTMWxXSLhVj5Wtxj3uswO1uLGYtiusVCrDwbZiyK6RYLsfJsmLEoplssxMqzYcaimG7FK7cspYdYeTaczhGvLFtSTLdma3ZOpwdZeTaczjFbs2tSMd2aOPFFZWzb1pRPgZVnw8kMYJo8dqRUMVfW1NdHNt7fs2sKH9njfoDYGy8szRqWNcPnlVdeeWVRBQX/AJG4dH6yGjHGAAAAAElFTkSuQmCC">  
        </a>modernplanning2018@gmail.com</p> 

        <p> 
        <img title="Facebook" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHsSURBVGhD7ZjNLgNhGEZ7ZS1i5a/TEvdDLCywE0sXoTMSEZZW4t8FWEqIlg0Lo41nIprzxfv1pWMxJzm7d56e9GfTWkVFRcX/ptFMk3orPa63Oi+NVpqPw8Frfb7m3oIyRqORpOv0AmN2TTlxTCSdJoyVYr2ZzSvLzuAjpLFSTNIjZdkZ53feYE9ZdmCkVJVlh0bKVFl2aMTr1FKWb+xc5efXD3m395q/v+ffoGcKlWWHRjxOLmb5yem9Uhl6rlBZdmjE42b/nf8Jeq5QWXZoxOPFzYMyw9BzhcqyQyMeu89vyvxidessn17ex/thlWWHRjwO/2AHTLYzvCWVZYdGPBJ0F1JZdmjEI0F3IZVlh0ZijeGp+4obhcqyQyOxxnB5+4gbhcqyQyOxxrB3cIcbhcqyQyOxxrC9e4sbhcqyQyMeCboLqSw7NOKRoLuQyrJDIx4JugupLDs04pGgu5DKskMjHgm6C6ksOzTikaC7kMqyQyMeCboLqSw7NOKRoLuQyrJDIx4JugupLDs04pGgu5DKskMjHgm6C6ksOzTikaC7kMqy89t/LRJ0F3CEvxaT9AiGynGkP3eb2TyOleBEqzOrrDj6D68Nj5XginJGo//xzenr1Bsa/kt7/d/gYb2dzSijoqKi4l9Sq30A+M9r/MIZv3oAAAAASUVORK5CYII=">
        </a>Siga nossa página no facebook  @House Chopp-JC</p> 

        <div class="line"></div>
      </div>  
    </section>

    <footer>
      <p>&copy; 2018 - HOUSE CHOPP</p>
    </footer>

</div>

<script src="JS/index.js"></script>
</body>
</html>