<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($entry->title) ?> — Catatku<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="mb-6">
        <a href="/entries" class="text-sm text-gray-400 hover:text-gray-700">← Back to list</a>
    </div>

    <article class="bg-white rounded-xl border border-gray-200 p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-2"><?= esc($entry->title) ?></h1>
            <p class="text-sm text-gray-400">
                Written on <?= date('d F Y', strtotime($entry->created_at)) ?>
                <?php if ($entry->updated_at !== $entry->created_at): ?>
                    · Updated <?= date('d F Y', strtotime($entry->updated_at)) ?>
                <?php endif; ?>
            </p>
        </div>
        <div class="prose prose-gray max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
            <?= esc($entry->content) ?>
        </div>
    </article>

    <div class="flex items-center gap-3 mt-4">
        <a href="/entries/<?= esc($entry->id) ?>/edit" class="text-sm bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">Edit Entry</a>
        <form method="POST" action="/entries/<?= esc($entry->id) ?>/delete" onsubmit="return confirm('Delete this entry?')">
            <?= csrf_field() ?>
            <button type="submit" class="text-sm text-red-500 hover:text-red-700 transition-colors">Delete</button>
        </form>
    </div>

<?= $this->endSection() ?>