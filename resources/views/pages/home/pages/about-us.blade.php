<section class="wrapper">
    @livewire('home.header')

    <div class="contact__wrapper">
        <div class="contact__wrapper-content">
            <div class="section__title">
                <span>من نحن</span>
            </div>

            <div class="d-flex flex-column gap-4">
                <p>مرحبًا بكم في مدونتنا، المكان الذي تجدون فيه كل ما هو جديد ومثير في عالم المعرفة والثقافة. نحن فريق
                    من الكتاب المبدعين والمتخصصين في مجالات متنوعة، نعمل على تقديم محتوى مميز يثري الفكر ويحفز الإبداع.
                    نسعى دائمًا لأن نكون مصدرًا موثوقًا للمعلومات والتوجيهات التي تساعد قراءنا على التطور والنمو في
                    حياتهم الشخصية والمهنية.</p>


                <div class="d-flex flex-column align-items-center ">
                    <img src="{{ asset('assets/img/others/avatar.jpg') }}" class="avatar w-25 h-25" alt="Team Member">
                    <span class="fs-5 fw-bold">عبادة دراغمة</span>
                    <span class="material-symbols-outlined text-muted mt-3">format_quote</span>
                    <span class="text-center">عضو الفريق هو كاتب مبدع ومتخصص في البرمجة. يتمتع بخبرة واسعة في تطوير
                        مواقع الويب ويساهم بمقالاته
                        المميزة التي تقدم معلومات قيمة ومفيدة للقراء. لديه شغف كبير بالكتابة والبحث ويسعى دائمًا لتقديم
                        الأفضل.</span>
                </div>

                <div class="d-flex align-items-center gap-2 fw-bold">
                    <span class="material-symbols-outlined">menu_book</span>
                    <span>رؤيتنا ورسالتنا</span>
                </div>

                <span>نسعى من خلال مدونتنا إلى إثراء المحتوى العربي وتقديم مواضيع هادفة ومفيدة لجميع القراء. رسالتنا هي
                    نشر
                    المعرفة والثقافة في مختلف المجالات.
                </span>

                <div class="d-flex flex-column align-items-center justify-content-center border-top pt-2">
                    <span class="">جميع الحقوق محفوظة &copy; {{ Date('Y') }}</span>
                    <span>{{ config('app.name') }}</span>
                </div>
            </div>
        </div>
    </div>

    @livewire('home.footer')
</section>
