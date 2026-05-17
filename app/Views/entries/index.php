<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>My Entries — Catatku<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-semibold text-gray-900">My Entries</h2>
        <a href="/entries/create" class="bg-gray-900 text-white text-sm px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
            + Write New Entry
        </a>
    </div>

    <div class="space-y-4">
        <?php if (empty($entries)): ?>
            <div class="text-center py-16">
                <p class="text-5xl mb-4">📓</p>
                <p class="font-medium text-gray-600">No entries yet</p>
                <p class="text-sm text-gray-400 mt-1">Start writing your first entry!</p>
                <a href="/entries/create" class="inline-block mt-4 text-sm text-blue-600 hover:underline">Write now →</a>
            </div>
        <?php else: ?>
            <?php foreach ($entries as $entry): ?>
                <?= view('partials/entry_card', ['entry' => $entry]) ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

<?= $this->endSection() ?>