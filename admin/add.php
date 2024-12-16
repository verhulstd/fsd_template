<?php
$_SERVER["admin"] = true;
include_once "../includes/css_js.inc.php";
require('./includes/db.inc.php');

$levels = getGeoLevels();

$name = "";
$description = "";
$hint = "";
$level = 1;
$latitude = 0;
$longitude = 0;
$errors = [];

if (isset($_POST['formSubmit'])) {

    // validation for name
    if (!isset($_POST['inputName'])) {
        $errors[] = "Name is required";
    } else {
        $name = $_POST['inputName'];

        // check if name is no longer than 255 characters
        if (strlen($name) == 0) {
            $errors[] = "Name is required";
        }

        // check if name is alfanumeric
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
            $errors[] = "Name must be alphanumeric";
        }

        // check if name is no longer than 255 characters
        if (strlen($name) > 255) {
            $errors[] = "Name must be no longer than 255 characters";
        }
    }

    // validation for description (optional)
    if (isset($_POST['inputDescription'])) {
        $description = $_POST['inputDescription'];
    }

    // validation for hint (optional)
    if (isset($_POST['inputHint'])) {
        $hint = $_POST['inputHint'];

        // check if hint is alfanumeric
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $hint)) {
            $errors[] = "Name must be alphanumeric";
        }

        // check if name is no longer than 255 characters
        if (strlen($hint) > 255) {
            $errors[] = "Hint must be no longer than 255 characters";
        }
    }


    // validation for level
    if (!isset($_POST['inputLevel'])) {
        $errors[] = "Level is required";
    } else {
        if (!isset($levels[$_POST['inputLevel']])) {
            $errors[] = "Level is not valid";
        } else {
            $level = $_POST['inputLevel'];
        }
    }


    // validation for latitude
    if (!isset($_POST['inputLatitude'])) {
        $errors[] = "Latitude is required";
    } else {
        $latitude = (float) (str_replace(',', '.', $_POST['inputLatitude']));
        // check if latitude is a valid absolute or floating value between 0 and 90
        if ($latitude < -90 || $latitude > 90) {
            $errors[] = "Latitude value is not valid, should be between -90 and 90";
        }
    }


    // validation for longitude
    if (!isset($_POST['inputLongitude'])) {
        $errors[] = "Longitude is required";
    } else {
        $longitude = (float) (str_replace(',', '.', $_POST['inputLongitude']));
        // check if latitude is a valid absolute or floating value between 0 and 90
        if ($longitude < -180 || $longitude > 180) {
            $errors[] = "Longitude value is not valid, should be between -180 and 180";
        }
    }

    if (!count($errors)) {
        // insert into db

        $success = insertGeocache(
            $name,
            $description,
            $hint,
            $level,
            $latitude,
            $longitude
        );

        if (!$success) {
            $errors[] = "Geocache could not be added, something went wrong...";
        } else {
            // add success message to session and redirect to homepage
            session_start();
            $_SESSION['successMessage'] = "Geocache <strong>$name</strong> added successfully.";
            header("Location: master.php");
            exit;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Geocaches ADD</title>
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
            <h2>Add new geocache</h2>
            <hr />

            <?php if (count($errors)) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                    <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form method="post" action="add.php">

                <div class="form-group mt-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Name: *</label>
                    <div>
                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name"
                            value="<?= $name; ?>">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Description:</label>
                    <div>
                        <textarea name="inputDescription" id="inputDescription"
                            style="width: 100%"><?= $description; ?></textarea>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="inputHint" class="col-sm-2 col-form-label">Hint:</label>
                    <div>
                        <input type="text" class="form-control" id="inputHint" name="inputHint" placeholder="Hint"
                            value="<?= $hint; ?>">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="inputLevel" class="col-sm-2 col-form-label">Level: *</label>
                    <div>
                        <?php foreach ($levels as $levelId => $levelName) : ?>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inputLevel"
                                id="inputLevel<?= $levelId; ?>" value="<?= $levelId; ?>"
                                <?= ($levelId == $level) ? 'checked' : ''; ?> <label class="form-check-label"
                                for="inputLevel<?= $levelId; ?>"><?= $levelName; ?></label>
                        </div>

                        <?php endforeach; ?>

                    </div>

                </div>

                <div class="form-group mt-3">
                    <label for="inputLatitude" class="col-sm-2 col-form-label">latitude: *</label>
                    <div>
                        <input type="text" class="form-control" id="inputLatitude" name="inputLatitude"
                            placeholder="Latitude" value="<?= $latitude; ?>">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="inputLongitude" class="col-sm-2 col-form-label">Longitude: *</label>
                    <div>
                        <input type="text" class="form-control" id="inputLongitude" name="inputLongitude"
                            placeholder="Longitude" value="<?= $longitude; ?>">
                    </div>
                </div>

                <div class="form-group mt-5">
                    <div>
                        <button type="submit" class="btn btn-primary" name="formSubmit"
                            style="width: 100%">Save</button>
                    </div>
                </div>
            </form>

        </main>

    </div>


</body>

</html>