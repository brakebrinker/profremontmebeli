<footer>
  <div class="footer-home-contacts container">
     <h2>Контактная информация</h2>
     <div class="content-subtitle">Позвоните нам или оставьте заявку и мы свяжемся с вами.</div>
     <div class="footer-home-contacts_wrapper">
       <div class="address left">
         <h3>Адресы</h3>
         <div class="sub">Офис в Москве</div>
         <p>
           <span>+7 495 514-73-72</span>
           Нагатинская набережная, д. 12, к. 2 <br>г. Москва, 113355
         </p>
         <div class="sub">Офис в Санкт-Петербурге</div>
         <p>
           <span>+7 812 905-37-06</span>
           5-й Верхний пер., д. 15 <br>г. Санкт-Петербург, 194292
         </p>
         <a href="mailto:info@profremontmebeli.ru" class="mail-link">info@profremontmebeli.ru</a>
         <p>
           Также вы можете написать и скинуть нам  фотографии для оценки ремонта в Whatsapp и Viber:
           <span>+7 925 514-73-72</span> 
         </p>
       </div>

       <form class="right">
         <h3>Напишите нам</h3> 
         <div class="group"><input type="text" required><label>Вас зовут</label></div>
         <div class="group"><input type="tel" name="phone" required><label>Ваш телефон</label></div>
         <div class="group"><input type="text" name="mail" required><label>Электоронная почта</label></div>
         <textarea placeholder="Ваше сообщение"></textarea>
         <div class="checkbox">
           <input type="checkbox" name="checkbox">
           <label>Я даю свое согласие на обработку персональных данных в соответствие с законом №152-ФЗ «О персональных данных» и принимаю условия политики об обработке персональных данных</label>
         </div>
         <input type="submit" name="submit" value="Отправить сообщение" class="button-orange">
       </form>
     </div>
  </div>
  <div class="container">

    <div class="footer-contacts left">
      <a href="#" class="footer-logo left">
        <img src="images/footer_logo.png" alt="logo">
      </a>
      <div class="footer-social left">
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </div>
      <div class="footer-phone right">
        <p class="inline">+7 495 357-72-73</p>
        <a href="#" class="call-me trans-orange-button inline">Перезвоните мне</a>
      </div>
    </div>

    <div class="footer-menu left">
      <ul>
        <li class="current_page_item"><a href="#">Частным клиентам</a></li>
        <li><a href="#">Корпоративным клиентам</a></li>
      </ul>

      <ul>
        <li><a href="#">О компании</a></li>
        <li><a href="#">Цены</a></li>
        <li><a href="#">Примеры работ</a></li>
        <li><a href="#">Отзывы</a></li>
        <li><a href="#">Подбор материала</a></li>
        <li><a href="#">Вопрос-ответ</a></li>
        <li><a href="#">Контакты</a></li>
      </ul>

      <ul>
        <li><a href="#">Ремонт мебели</a></li>
        <li><a href="#">Перетяжка мебели</a></li>
        <li><a href="#">Обивка мебели</a></li>
        <li><a href="#">Реставрация мебели</a></li>
      </ul>
    </div>
    <div class="mobile-show">
      <p class="bottom-phone">+7 495 514-73-72</p>
      <a href="#" class="call-me-button">Перезвоните мне</a>
    </div>
    <div class="footer-copy left">
      <p class="left">© 2010–2017, ООО «Франч-гид». Все права защищены.</p>
      <p class="right">Профессиональный ремонт<br> мебели на дому и в мастерской</p>
    </div>

    <div class="footer-info left">
      Обращаем ваше внимание на то, что данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой, определяемой положениями статьи 437 Гражданского кодекса Российской Федерации. Порядок оформления гражданско-правовых отношений, объем, точная стоимость услуг, сроки их оказания, а также иные условия оказания услуг определяются при выезде мастера к клиенту.
    </div>

  </div>
</footer>
<a href="#" class="scrollup"></a>

<script type="text/javascript">
    jQuery(document).ready(function($){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
        
          $('.filters-block .widget').click(function(){
            $('.filters-block .widget').removeClass('active');
            $( this ).addClass('active');
        });


    });
</script>


<div id="callback" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="callback-close" data-dismiss="modal"><img src="images/close-btn.png" alt="..."></div>
      <form class="right">
          <h2>Обратный звонок</h2>
          <div class="subtitle">Оставьте свои контактные данные и мы вам перезвоним вам в течении 15 минут.</div>
          <div class="group"><input type="text" required><label>Вас зовут</label></div>
          <div class="group"><input type="tel" name="phone" required><label>Ваш телефон</label></div>
          <textarea placeholder="Ваше сообщение"></textarea>
          <div class="checkbox">
            <input type="checkbox" name="checkbox">
            <label>Я даю свое согласие на обработку персональных данных в соответствие с законом №152-ФЗ «О персональных данных» и принимаю условия политики об обработке персональных данных</label>
          </div>
          <input type="submit" name="submit" value="Отправить сообщение" class="button-green">
        </form>


    </div>

  </div>
</div>

<?php wp_footer(); ?>
</body>

<!-- Mirrored from webdego.com/sites/profRemont/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Oct 2017 15:31:42 GMT -->
</html>