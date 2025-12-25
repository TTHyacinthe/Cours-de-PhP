<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Thèmes DaisyUI disponibles
 */
$availableThemes = [
    'light'      => 'Light',
    'dark'       => 'Dark',
    'corporate'  => 'Corporate',
    'business'   => 'Business',
    'cupcake'    => 'Cupcake',
    'emerald'    => 'Emerald',
    'synthwave'  => 'Synthwave',
    'dracula'    => 'Dracula',
    'luxury'     => 'Luxury',
    'forest'     => 'Forest'
];

// Changement de thème
if (isset($_GET['theme']) && array_key_exists($_GET['theme'], $availableThemes)) {
    $_SESSION['theme'] = $_GET['theme'];
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

$currentTheme = $_SESSION['theme'] ?? 'corporate';
?>
<!DOCTYPE html>
<html lang="fr" data-theme="<?= htmlspecialchars($currentTheme) ?>">
<head>
    <meta charset="UTF-8">
    <title>Chrono App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind + DaisyUI -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet">
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
</head>
<?php if (!empty($_SESSION['flash'])): ?>
    <?php
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']); 
    ?>
    <div id="flash-message"
         class="alert <?= $flash['type'] === 'success' ? 'alert-success' : 'alert-error' ?>
                shadow-lg mb-6 transition-opacity duration-500">
        <?= htmlspecialchars($flash['message']) ?>
    </div>

    <script>
        setTimeout(() => {
            const el = document.getElementById('flash-message');
            if (el) {
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 5000);
            }
        }, 5000);
    </script>
<?php endif; ?>




<body class="min-h-screen bg-base-200 text-base-content">

<div class="navbar bg-base-100 shadow-md px-6">
    <div class="flex-1">
        <a href = "/"
            class="text-x1 font-bold flex items-center gap-2 hoover:text-primary transition">
                🏁 Chrono App
        </a>
    </div>

    <div class="flex gap-3 items-center">
        <a href="/categories/list.php" class="btn btn-ghost btn-sm">
            Catégories
        </a>

        <a href="/participants/list.php" class="btn btn-ghost btn-sm">
            Participants
        </a>

        <a href="/participants/add.php" class="btn btn-primary btn-sm">
            ➕ Inscription
        </a>

        <!-- Sélecteur de thème -->
        <form method="get">
            <select name="theme"
                    class="select select-bordered select-sm"
                    onchange="this.form.submit()">
                <?php foreach ($availableThemes as $key => $label): ?>
                    <option value="<?= $key ?>" <?= $key === $currentTheme ? 'selected' : '' ?>>
                        <?= $label ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>

    </div>
</div>

<!-- CONTENU -->
<main class="container mx-auto p-6">
