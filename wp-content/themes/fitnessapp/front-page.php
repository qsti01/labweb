<?php
/**
 * Template Name: Главная страница
 */

get_header();
?>

    <main>
        <section class="hero" id="hero">
            <div class="wrapper">
                <div class="hero_left-side">
                    <h1>Питание и тренировки - наконец в одном приложении</h1>
                    <p>FitnessApp объединяет дневник калорий и БЖУ, журнал тренировок и графики прогресса — без переключения между разными приложениями и заметками.</p>
                    <form class="lead-form" data-source="Hero секция" action="#" method="post">
                        <input type="email" name="email" placeholder="Ваш email" required>
                        <button type="submit" class="green-button">
                            <span>Оставить заявку</span>
                        </button>
                        <div class="lead-form-status"></div>
                    </form>
                    <p>Бесплатный ранний доступ</p>
                </div>
                <div class="hero_right-side">
                    <div class="hero_phone-border">
                        <div class="hero_phone-camer"></div>
                        <div class="hero_phone-loader"></div>
                        <div class="hero_phone-title"></div>
                        <div class="hero_phone-textare">
                            <div class="hero_phone-text"></div>
                        </div>
                    </div>
                    <p class="hero_underline">концепт приложения</p>
                </div>
            </div>
        </section>

        <section class="slogan">
            <div class="wrapper">
                <h2>Дневник питания — в одном приложении, тренировки — в заметках, прогресс — в голове.</h2>
                <p>Знакомая ситуация для каждого, кто пробовал следить за питанием и тренировками без единой системы.</p>
            </div>
        </section>

        <section class="functions" id="functions">
            <div class="wrapper">
                <div class="functions_item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image1.jpg" alt="Дневник питания и БЖУ" class="functions_img">
                    <div class="functions_text">
                        <h3>Дневник питания и БЖУ</h3>
                        <p>Отмечайте приёмы пищи — калории, белки, жиры и углеводы считаются автоматически, без формул и таблиц.</p>
                    </div>
                </div>

                <div class="functions_item">
                    <div class="functions_text">
                        <h3>Журнал тренировок</h3>
                        <p>Записывайте упражнения, подходы и вес — вся история тренировок всегда под рукой.</p>
                    </div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image3.jpg" alt="Журнал тренировок" class="functions_img">
                </div>

                <div class="functions_item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image4.jpg" alt="Статистика и графики прогресса" class="functions_img">
                    <div class="functions_text">
                        <h3>Статистика и графики прогресса</h3>
                        <p>Наглядные графики показывают, как меняются тело и результаты неделя за неделей.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="how" id="how">
            <div class="wrapper">
                <h2>Как это работает</h2>
                <div class="how_items">
                    <div class="how_item">
                        <div class="how_number">
                            <span>1</span>
                        </div>
                        <div class="how_name">Зарегистрируйся</div>
                        <div class="how_desc">Создай аккаунт за 30 секунд — понадобится только email.</div>
                    </div>
                    <div class="how_item">
                        <div class="how_number">
                            <span>2</span>
                        </div>
                        <div class="how_name">Отмечай тренировки и приёмы пищи</div>
                        <div class="how_desc">Заноси данные в течение дня — это займёт пару минут.</div>
                    </div>
                    <div class="how_item">
                        <div class="how_number">
                            <span>3</span>
                        </div>
                        <div class="how_name">Смотри прогресс на графиках</div>
                        <div class="how_desc">Наблюдай, как меняются показатели, и корректируй план.</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="why" id="why">
            <div class="wrapper">
                <h2>Зачем два приложения, если можно одно?</h2>
                <div class="why_compare">
                    <div class="why_prev">
                        <p>Сейчас</p>
                        <ul>
                            <li>FatSecret / Yazio — отдельно питание</li>
                            <li>Strong — отдельно тренировки</li>
                            <li>Прогресс — в голове</li>
                        </ul>
                    </div>
                    <div class="why_with">
                        <p>С FitnessApp</p>
                        <ul>
                            <li>Питание и тренировки — в одном месте</li>
                            <li>Прогресс — на понятных графиках</li>
                            <li>Ничего не теряется и не забывается</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="members" id="members">
            <div class="wrapper">
                <h2>1240</h2>
                <h3>ЧЕЛОВЕК УЖЕ В СПИСКЕ ОЖИДАНИЯ</h3>
                <p>«Мы делаем FitnessApp, потому что сами устали переключаться между двумя приложениями, чтобы просто понять, работает ли наш план.»</p>
            </div>
        </section>

        <section class="connect" id="connect">
            <div class="wrapper">
                <h2>Хочешь одним из первых попробовать FitnessApp?</h2>
                <form class="lead-form" data-source="Секция Connect" action="#" method="post">
                    <input type="email" name="email" placeholder="Ваш email" required>
                    <button type="submit" class="green-button">
                        <span>Оставить заявку</span>
                    </button>
                    <div class="lead-form-status"></div>
                </form>
            </div>
        </section>

        <section class="faq" id="faq">
            <div class="wrapper">
                <h2>Частые вопросы</h2>
                <div class="faq_items">
                    <div class="faq_item" id="faq-item-1">
                        <div class="faq_text">
                            <h4 class="faq_title">Когда запуск?</h4>
                            <p class="faq_desc">В ближайшее время</p>
                        </div>
                        <div class="faq_button faq_button-close">
                            <span>+</span>
                        </div>
                    </div>

                    <div class="faq_item" id="faq-item-2">
                        <div class="faq_text">
                            <h4 class="faq_title">Это бесплатно?</h4>
                            <p class="faq_desc">Да, базовые функции — дневник питания и журнал тренировок — останутся бесплатными и после запуска.</p>
                        </div>
                        <div class="faq_button faq_button-close">
                            <span>+</span>
                        </div>
                    </div>

                    <div class="faq_item" id="faq-item-3">
                        <div class="faq_text">
                            <h4 class="faq_title">На каких платформах будет работать?</h4>
                            <p class="faq_desc">Мы разрабатываем веб-приложение поэтому вы сможете воспользоваться нашим сервисом в любом браузере</p>
                        </div>
                        <div class="faq_button faq_button-close">
                            <span>+</span>
                        </div>
                    </div>

                    <div class="faq_item" id="faq-item-4">
                        <div class="faq_text">
                            <h4 class="faq_title">Что с моими данными до запуска?</h4>
                            <p class="faq_desc">Ваша почта сохраняется в нашу базу данных. На нее будут приходить письма с новостями о проекте.</p>
                        </div>
                        <div class="faq_button faq_button-close">
                            <span>+</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                $content = trim(get_the_content());
                if (!empty($content)) :
                    ?>
                    <section class="front-page-content" id="custom-content">
                        <div class="wrapper">
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </section>
                    <?php
                endif;
            endwhile;
        endif;
        ?>

    </main>

<?php
get_footer();
