
</div><!-- end .container -->
</div> <!-- end .super-content -->
<div class="super-footer">
<section class="prefooter">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="prefooter__text-widget1">
                    <?php dynamic_sidebar('w_footer_1'); ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="prefooter__text-widget2">
                    <?php dynamic_sidebar('w_footer_2'); ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="prefooter__text-widget3">
                    <?php dynamic_sidebar('w_footer_3'); ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="prefooter__social">
                    <p>мы в соцсетях</p>
                    <a target="_blank" href="https://www.facebook.com/veronikaplus/"><img src="<?php echo get_template_directory_uri(); ?>/app/img/facebook.png"></a>
                    <a target="_blank" href="https://www.instagram.com/veronika_borispol/"><img src="<?php echo get_template_directory_uri(); ?>/app/img/instagram.png"></a>
                    <a target="_blank" href="https://vk.com/id183637344"><img src="<?php echo get_template_directory_uri(); ?>/app/img/vkontakte-logo.png"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="footer__copy">vera gira 2017 All rights reserved <a href="#">Разработано GOFriends digital</a></div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</footer>

</div> <!-- end .super-footer -->
</div> <!-- end .super-wrapper -->

<!-- Modal bron -->
<div class="modal my-bron fade" id="my-bron" tabindex="-1" role="dialog" aria-labelledby="my-bron" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Название модали</h4>
      </div>
      <script src='//clients.aihelps.com/module/module.js'></script>
      <div class="modal-body" id="aihelps">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary">Сохранить изменения</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal delivery -->
<div class="modal my-delivery fade" id="my-delivery" tabindex="-1" role="dialog" aria-labelledby="my-delivery" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Доставка</h4>
      </div>
      <div class="modal-body">
        <p class="courses-modal__desc">Есть 2 варианта доставки:<br>самовывоз с города Борисполь по адресу ул. Киевский Шлях, 79а или доставка Новой почтой.</p>
      </div>
    </div>
  </div>
</div>

<!-- Модалка записи на курс -->
<div class="modal courses-modal fade" id="courses-modal" tabindex="-1" role="dialog" aria-labelledby="courses-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="course-send" action="<?php echo get_template_directory_uri(); ?>/mailto.php">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">записаться на курс</h4>
            </div>
            <div class="modal-body align-center">
                <p class="courses-modal__desc"></p>
                <input type="hidden" name="course" id="post-var">
                <input type="hidden" name="course-title" class="course-value">
                <input type="text" name="name" placeholder="Ваше имя">
                <input type="text" name="phone" class="mask-phone" placeholder="телефон *" required>
                <input type="text" name="email" placeholder="e-mail">
            </div>
            <div class="modal-footer align-center">
                <button id="course-send-btn" type="button" class="courses-modal__btn">отправить</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Модалка записи на процедуру -->
<div class="modal service-modal fade" id="service-modal" tabindex="-1" role="dialog" aria-labelledby="service-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">записаться на процедуру</h4>
      </div>
      <div class="modal-body align-center">
        <p><a class="service-modal__phone" href="tel:0931234567">063-527-31-71</a></p>
        <p><a class="service-modal__phone" href="tel:0931234567">098-523-56-00</a></p>
        <p><a class="service-modal__phone" href="tel:0931234567">066-404-03-36</a></p>
      </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>



<script src="<?php echo get_template_directory_uri(); ?>/app/js/main.js"></script>
<?php if( is_front_page() ): ?>
<script src="//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
<script type="text/javascript">
    // Яндекс карта в модале
    ymaps.ready(init);

    function init () {
        var myMap = new ymaps.Map("maps", {
                center: [50.349641, 30.954935],
                zoom: 16
            }),
            myPlacemark = new ymaps.Placemark([50.349641, 30.954935], {
                // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
                balloonContentHeader: "Bluesun Украина",
                balloonContentBody: "Используй солнечную панель и экономь до 5 раз уже сейчас!",
                balloonContentFooter: "(095) или (068) или (063) + 5110077",
                hintContent: "Bluesun Украина"
            });

        myMap.geoObjects.add(myPlacemark);
        myMap.controls
            // Кнопка изменения масштаба.
            .add('zoomControl', { left: 5, top: 5 })
    }

    // отправка отзыва

    $(".sec_reviews__form").submit(function(){
        var form = $(this);
        var error = false;
        form.find('input').each( function(){
            if ($('.sec_reviews__input').val() == '') {
                sweetAlert("Ой...", "Необходимо заполнить поле для отзыва!", "error");
                error = true;
            }
        });
        if (!error) {
            var data = form.serialize();
            $.ajax({
                type: 'POST',
                url: '<?php echo get_template_directory_uri() . '/add_testimonal.php'; ?>',
                dataType: 'json',
                data: data,
                beforeSend: function(data) {
                    form.find('.sec_reviews__button').attr('disabled', 'disabled');
                },
                complete: function(data) {
                    swal("Отлично!", "Ваш отзыв появится после проверки!", "success");
                }

            });
        }
        return false;
    });

</script>
<?php endif; ?>

<script>
    jQuery('#aihelps').aihelps({id:887017, language: 'ru', sendSMS: false, sex: 'Female'}); 
</script> 


</body>
</html>