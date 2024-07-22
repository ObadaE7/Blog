<section class="wrapper">
    @livewire('home.header')

    <div class="contact__wrapper">
        <div class="contact__wrapper-content">
            <div class="section__title">
                <span>سياسة الخصوصية</span>
            </div>

            <div class="d-flex flex-column gap-2">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                مقدمة
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                نحن ملتزمون بحماية خصوصية مستخدمينا. توضح هذه السياسة كيفية جمع، استخدام، وحماية
                                معلوماتك الشخصية عند استخدامك لموقعنا.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collectData" aria-expanded="false" aria-controls="collectData">
                                جمع المعلومات
                            </button>
                        </h2>
                        <div id="collectData" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                نقوم بجمع المعلومات التي تقدمها لنا مباشرة عندما تقوم بملء نماذج الاتصال أو الاشتراك في
                                النشرات الإخبارية. يمكن أن تشمل هذه المعلومات اسمك، عنوان بريدك الإلكتروني، وأي معلومات
                                أخرى تختار تقديمها.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#usingData" aria-expanded="false" aria-controls="usingData">
                                استخدام المعلومات
                            </button>
                        </h2>
                        <div id="usingData" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                ستخدم المعلومات التي نجمعها لتقديم وتحسين خدماتنا، للتواصل معك، ولإرسال التحديثات
                                والعروض الترويجية. لن نبيع أو نؤجر معلوماتك الشخصية لأي طرف ثالث دون موافقتك الصريحة.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#protectedData" aria-expanded="false" aria-controls="protectedData">
                                حماية المعلومات
                            </button>
                        </h2>
                        <div id="protectedData" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                نحن نتخذ التدابير الأمنية المناسبة لحماية معلوماتك الشخصية من الوصول غير المصرح به،
                                التغيير، الكشف، أو التدمير. ومع ذلك، نود أن نذكرك بأن أي بيانات يتم نقلها عبر الإنترنت
                                لا يمكن أن تكون آمنة بنسبة 100٪.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#policyChange" aria-expanded="false" aria-controls="policyChange">
                                تغييرات على السياسة
                            </button>
                        </h2>
                        <div id="policyChange" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>نحتفظ بالحق في تعديل سياسة الخصوصية هذه في أي وقت. سيتم نشر أي تغييرات على هذه
                                    الصفحة، وسنقوم بتحديث
                                    تاريخ التعديل أدناه. ننصحك بمراجعة هذه الصفحة بانتظام للبقاء على اطلاع بأي تغييرات.
                                </p>
                                <p>آخر تحديث: 10 يوليو 2024</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#contactUs" aria-expanded="false" aria-controls="contactUs">
                                اتصل بنا
                            </button>
                        </h2>
                        <div id="contactUs" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>إذا كان لديك أي أسئلة أو استفسارات حول سياسة الخصوصية هذه، يرجى
                                    <a href="{{ route('contact') }}">الاتصال بنا</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-center justify-content-center border-top pt-2">
                    <span class="">جميع الحقوق محفوظة &copy; {{ Date('Y') }}</span>
                    <span>{{ config('app.name') }}</span>
                </div>
            </div>
        </div>
    </div>

    @livewire('home.footer')
</section>
