    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <!-- <a class="navbar-brand" href="/member">TENNIS</a> -->
            <span class="navbar-brand">TENNIS</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="/pages/index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/contact">Contact</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="/member">Members</a>
                    </li>
                </ul>
                <?= $this->include('layout/search'); ?>
            </div>
        </div>
    </nav>