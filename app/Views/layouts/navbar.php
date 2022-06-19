<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">CI4</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == '/') ? 'active' : ''; ?>" aria-current="page" href="/">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'about') ? 'active' : ''; ?>" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'contact') ? 'active' : ''; ?>" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <?php if (!logged_in()) : ?>
                        <a class="btn btn-primary" href="/login">Login</a>
                    <?php else: ?>
                        <a class="btn btn-primary" href="/logout">Logout</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>