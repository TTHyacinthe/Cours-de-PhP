<?php
require_once __DIR__ . '/../../include/db.php';

$q = trim($_GET['q'] ?? '');

if (strlen($q) < 2) {
    exit;
}

$stmt = $db->prepare("
    SELECT id, nom, prenom
    FROM participants
    WHERE nom LIKE :q OR prenom LIKE :q
    ORDER BY nom
    LIMIT 10
");
$stmt->execute([':q' => "%$q%"]);
$results = $stmt->fetchAll();

if (!$results) {
    echo '<p class="text-sm opacity-60">Aucun résultat</p>';
    exit;
}
?>

<ul class="menu bg-base-200 rounded-box">
<?php foreach ($results as $p): ?>
    <li>
        <a
            hx-get="load_participant.php?id=<?= $p['id'] ?>"
            hx-target="#participant-form"
            hx-swap="outerHTML"
        >
            <?= htmlspecialchars($p['prenom'] . ' ' . $p['nom']) ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>
