
<html lang="en">
    <head>
        <meta charset="utf-8">
        <?= $this->headTitle('Laminas MVC Skeleton')->setSeparator(' - ')->setAutoEscape(false) ?>

        <?= $this->headMeta()
            ->appendName('viewport', 'width=device-width, initial-scale=1.0')
            ->appendHttpEquiv('X-UA-Compatible', 'IE=edge')
        ?>

        <!-- Le styles -->
        <?= $this->headLink([
                                'rel' => 'shortcut icon',
                                'type' => 'image/vnd.microsoft.icon',
                                'href' => $this->basePath() . '/img/favicon.ico'
                            ])
            ->prependStylesheet($this->basePath('css/style.css'))
            ->prependStylesheet($this->basePath('css/bootstrap.min.css'))
?>

        <!-- Scripts -->
        <?= $this->headScript() ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark mb-4" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="<?= $this->url('home') ?>">
                        <img src="<?= $this->basePath('img/laminas-logo.svg') ?>" alt="Laminas">MVC Skeleton
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= $this->url('home') ?>">
                                Home <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <?= $this->content ?>
            <hr>
            <footer>
                <p>
                    &copy; <?= date('Y') ?>
                    <a href="https://getlaminas.org/">Laminas Project</a> a Series of LF Projects, LLC.
                </p>
            </footer>
        </div>
        <?= $this->inlineScript()
            ->prependFile($this->basePath('js/bootstrap.min.js'))
            ->prependFile($this->basePath('js/jquery-3.5.1.min.js')) ?>
    </body>
</html>
