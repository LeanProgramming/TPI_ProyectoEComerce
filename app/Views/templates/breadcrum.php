<!-- Breadcrum -->
<?php
$url = '';
if (sizeof($rutas) > 1) {
    echo '
            <nav class="ms-5" aria-label="breadcrumb">
            <ol class="breadcrumb">   
        ';
    for ($i = 0; $i < sizeof($rutas); $i++) {
        if(isset($link[$i])) {
            $url .= $link[$i];
        }
        if ($i == sizeof($rutas) - 1) {
            echo '
                <li class="breadcrumb-item">' . $rutas[$i] . '</li>
            ';
        } else {
            echo '
            <li class="breadcrumb-item"><a href="' . base_url($url) . '">' . $rutas[$i] . '</a></li>
            ';
        }
        if ($i < sizeof($rutas) - 1) {
            echo '<p class="mx-2"> > </p> ';
        }
    }

    echo '
            </ol>
            </nav>
        ';
}
?>