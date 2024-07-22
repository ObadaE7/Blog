<section class="wrapper">
    @livewire('home.header')
    <main class="wrapper__main">
        @include('pages.home.hero')
        @livewire('home.section-one')
        @livewire('home.section-two')
        @livewire('home.section-three')
    </main>
    @livewire('home.footer')
</section>
