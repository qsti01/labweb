document.addEventListener('DOMContentLoaded', function () {
    const faqItems = document.getElementsByClassName("faq_item");

    function faqChangeVisability(item) {
        const button = item.getElementsByClassName("faq_button")[0];
        const desc = item.getElementsByClassName("faq_desc")[0];
        if (!button || !desc) return;

        const span = button.querySelector("span");

        button.classList.toggle("faq_button-close");
        button.classList.toggle("faq_button-open");

        if (button.classList.contains("faq_button-open")) {
            desc.style.display = "block";
            if (span) span.innerText = "—";
        } else {
            desc.style.display = "none";
            if (span) span.innerText = "+";
        }
    }

    for (let faqItem of faqItems) {
        faqItem.addEventListener('click', function () {
            faqChangeVisability(faqItem);
        });
    }

    const burgerBtn = document.getElementById("burger-btn");
    const headerNav = document.getElementById("header-nav");

    if (burgerBtn && headerNav) {
        burgerBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            burgerBtn.classList.toggle("active");
            headerNav.classList.toggle("active");
        });

        headerNav.querySelectorAll("a").forEach(function (link) {
            link.addEventListener("click", function () {
                burgerBtn.classList.remove("active");
                headerNav.classList.remove("active");
            });
        });

        document.addEventListener("click", function (e) {
            if (!burgerBtn.contains(e.target) && !headerNav.contains(e.target)) {
                burgerBtn.classList.remove("active");
                headerNav.classList.remove("active");
            }
        });
    }

    const leadForms = document.querySelectorAll('.lead-form');
    leadForms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const emailInput = form.querySelector('input[type="email"]');
            const submitBtn = form.querySelector('button[type="submit"]');
            const submitSpan = submitBtn ? submitBtn.querySelector('span') : null;
            const statusDiv = form.querySelector('.lead-form-status');
            const source = form.getAttribute('data-source') || 'landing';

            if (!emailInput || !emailInput.value) return;

            const originalBtnText = submitSpan ? submitSpan.innerText : '';
            if (submitSpan) submitSpan.innerText = 'Отправка...';
            if (submitBtn) submitBtn.disabled = true;
            if (statusDiv) {
                statusDiv.style.display = 'none';
                statusDiv.className = 'lead-form-status';
                statusDiv.innerText = '';
            }

            const formData = new FormData();
            formData.append('action', 'fitnessapp_submit_lead');
            formData.append('email', emailInput.value);
            formData.append('source', source);

            if (typeof fitnessapp_ajax !== 'undefined' && fitnessapp_ajax.nonce) {
                formData.append('nonce', fitnessapp_ajax.nonce);
            }

            const ajaxUrl = (typeof fitnessapp_ajax !== 'undefined' && fitnessapp_ajax.url) 
                ? fitnessapp_ajax.url 
                : '/wp-admin/admin-ajax.php';

            fetch(ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (data.success) {
                    if (statusDiv) {
                        statusDiv.innerText = data.data.message || 'Спасибо за заявку!';
                        statusDiv.classList.add('status-success');
                        statusDiv.style.display = 'block';
                    }
                    if (submitSpan) submitSpan.innerText = 'Успешно!';
                    emailInput.value = '';
                } else {
                    if (statusDiv) {
                        statusDiv.innerText = data.data.message || 'Ошибка отправки';
                        statusDiv.classList.add('status-error');
                        statusDiv.style.display = 'block';
                    }
                    if (submitSpan) submitSpan.innerText = originalBtnText;
                }
            })
            .catch(function (error) {
                if (statusDiv) {
                    statusDiv.innerText = 'Ошибка соединения';
                    statusDiv.classList.add('status-error');
                    statusDiv.style.display = 'block';
                }
                if (submitSpan) submitSpan.innerText = originalBtnText;
            })
            .finally(function () {
                if (submitBtn) submitBtn.disabled = false;
                setTimeout(function () {
                    if (submitSpan && submitSpan.innerText === 'Успешно!') {
                        submitSpan.innerText = originalBtnText;
                    }
                }, 3000);
            });
        });
    });
});
