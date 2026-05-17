<div class="bg-white rounded-xl border border-gray-200 p-5 hover:border-gray-300 transition-colors">
    <div class="flex items-start justify-between gap-3 mb-3">
        <a href="/entries/<?= esc($entry->id) ?>" class="font-semibold text-gray-900 hover:text-gray-600 leading-snug">
            <?= esc($entry->title) ?>
        </a>
        <span class="text-xs text-gray-400 whitespace-nowrap mt-0.5">
            <?= date('d M Y', strtotime($entry->created_at)) ?>
        </span>
    </div>
    <p class="text-sm text-gray-500 line-clamp-2 mb-4"><?= esc($entry->content) ?></p>
    <div class="flex items-center gap-3 pt-3 border-t border-gray-100">
        <a href="/entries/<?= esc($entry->id) ?>" class="text-xs text-blue-600 hover:text-blue-800">Read</a>
        <a href="/entries/<?= esc($entry->id) ?>/edit" class="text-xs text-gray-500 hover:text-gray-800">Edit</a>
        <form method="POST" action="/entries/<?= esc($entry->id) ?>/delete" onsubmit="return confirm('Delete this entry?')" class="ml-auto">
            <?= csrf_field() ?>
            <button type="submit" class="text-xs text-red-400 hover:text-red-600">Delete</button>
        </form>
    </div>
</div>