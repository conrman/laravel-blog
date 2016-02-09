@if (isset($page_title))
    @section ('hero')
        <section class="app-hero jumbotron">
            <div class="container">
                <div class="row">
                    @section ('hero_text')
                        <h1 class="app-hero__title">
                            {{ $page_title }}
                        </h1>
                    @show
                </div>
            </div>
        </section>
    @show
@endif