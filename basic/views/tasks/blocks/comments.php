<h3>Комментарии</h3>
<?php
foreach ($comments as $comment) {
    echo '<div class="card" style="margin-top: 20px;">
    <div class="card-header">
    ' . $comment->manager_name . '
    </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">' . $comment->body . '</li>
        </ul>
    </div>';
}