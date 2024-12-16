<?php
$_SERVER["admin"] = true;
include_once "../includes/css_js.inc.php";
require('./includes/db.inc.php');

$levels = getGeoLevels();
$filter = (int) @$_GET['filter'];

if (array_key_exists($filter, $levels)) {
    $items = getGeoCaches($filter);
} else {
    $items = getGeoCaches();
}

$message = NULL;
session_start();
if (isset($_SESSION['successMessage'])) {
    $message = $_SESSION['successMessage'];
    unset($_SESSION['successMessage']);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Geocaches CRUD - Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="../dist/<?= $cssPath ?>" />
    <script type="module" src="../dist/<?= $jsPath ?>"></script>
</head>

<body>


    <div class="container">
        <main>
            <h2>Geocaches</h2>

            <?php if ($message): ?>
                <div id="#custom-message"
                    class="p-3 text-success-emphasis bg-success-subtle border border-success-subtle rounded-3 mt-3">
                    <?= $message; ?>
                </div>
            <?php endif; ?>


            <div class="mt-3 mb-3 text-end">
                <a href="add.php">
                    <button type="button" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Add new
                        geocache</button>
                </a>
            </div>

            <div class="table-responsive small">
                <table class="table table-hover table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Level</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($items as $item): ?>

                            <?php

                            switch ($item['level_id']) {
                                case 1:
                                    $pillClass = 'bg-success';
                                    break;
                                case 2:
                                    $pillClass = 'bg-danger';
                                    break;
                                case 3:
                                    $pillClass = 'bg-dark';
                                    break;
                                case 4:
                                    $pillClass = 'bg-warning';
                                    break;
                                default:
                                    $pillClass = 'bg-secondary';
                                    break;
                            }

                            ?>


                            <tr>
                                <td><?= $item['id']; ?></td>
                                <td><?= $item['name']; ?></td>
                                <td>
                                    <a href="?filter=<?= $item['level_id']; ?>">
                                        <span class="badge rounded-pill <?= $pillClass ?>">
                                            <?= $item['level_name'] ? $item['level_name'] : '- unknown -'; ?>
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <a href="detail.php?id=<?= $item['id']; ?>">
                                        <button type="button" class="btn btn-outline-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                            </svg> View</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="master.php">
                                        <button type="button" class="btn btn-outline-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg> Delete</button>
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>


                    </tbody>
                </table>

                <nav aria-label="Overview navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </main>

    </div>


</body>

</html>