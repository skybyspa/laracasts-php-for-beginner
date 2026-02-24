<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">
        <p class="mb-6">
            <a class="text-blue-200 underline" href="/websites/demo/notes">Go Back</a>
        </p>
        <p class="text-white"> <?= htmlspecialchars($note['body']) ?></p>

        <footer class="mt-6">
            <a href="/websites/demo/note/edit?id=<?= $note['id'] ?>" class="text-sm/6 font-semibold text-white">Edit</a>
        </footer>
    </div>
</main>

<?php require base_path('views/partials/footer.php');