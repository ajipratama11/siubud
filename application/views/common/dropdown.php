<div class="dropdown dropdown-link">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        Option
    </button>
    <div class="dropdown-menu">
        <?php
        foreach ($link as $key => $value) {
            $class = is_array($value) ? $value[0] : "";
            $url = is_array($value) ? $value[1] : $value;
            echo "<a href='$url' class='dropdown-item $class'>$key</a>";
        }
        ?>
    </div>
</div>