<div class="card">
    <div class="card-header">
        <span data-feather="user"></span>&nbsp;&nbsp;
        Информация о клиенте
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><?= $client->first ?> <?= $client->last ?></li>
        <li class="list-group-item"><?= $client->email ?></li>
    </ul>
</div>
