<div class="grid-container">
    <?php
    $i = 0;
    if (isset($person_id)) {
        while (file_exists($path . "/images/" . $person_id . "/" . $i . ".jpg")) {
            ?>
            <div>
                <img src="/images/<?php echo $person_id ?>/<?php echo $i ?>.jpg" alt="Person photo">
            </div>
            <?php
            $i++;
        }
    }
    ?>
</div>