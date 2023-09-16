<!-- Header Start -->
<header class="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg p-0">

                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="ion-android-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse mx-auto" id="navbarsExample09">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item mr-auto">
                                <a class="nav-link mr-auto" title="home" href="/" wire:navigate.hover>Home</a>
                            </li>
                            <li class="nav-item mr-auto">
                                <a class="nav-link" title="contact" href="{{route('front.create.contact')}}"
                                   wire:navigate.hover>Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header><!-- header close -->
