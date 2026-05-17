<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Write Entry — Catatku<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="mb-6">
        <a href="/entries" class="text-sm text-gray-400 hover:text-gray-700">← Back to list</a>
    </div>

    <h2 class="text-lg font-semibold text-gray-900 mb-4">Write New Entry</h2>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <form method="POST" action="/entries">
            <?= csrf_field() ?>

            <!-- Title -->
            <div class="mb-5">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" id="title" name="title"
                    value="<?= old('title') ?>"
                    placeholder="Entry title..."
                    class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent <?= isset($errors['title']) ? 'border-red-400 bg-red-50' : 'border-gray-300' ?>"
                    autofocus>
                <?php if (isset($errors['title'])): ?>
                    <p class="text-xs text-red-500 mt-1"><?= esc($errors['title']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Content -->
            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea id="content" name="content" rows="12"
                    placeholder="Write your entry here..."
                    class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent resize-y <?= isset($errors['content']) ? 'border-red-400 bg-red-50' : 'border-gray-300' ?>"
                ><?= old('content') ?></textarea>
                <?php if (isset($errors['content'])): ?>
                    <p class="text-xs text-red-500 mt-1"><?= esc($errors['content']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-between">
                <a href="/entries" class="text-sm text-gray-500 hover:text-gray-900">Cancel</a>
                <button type="submit" class="bg-gray-900 text-white text-sm px-5 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                    Save Entry
                </button>
            </div>
        </form>
    </div>

<?= $this->endSection() ?>