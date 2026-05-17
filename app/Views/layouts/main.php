<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-2xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/entries" class="text-xl font-bold text-gray-900 hover:text-gray-700">
                Catatku 📓
            </a>
            <div class="flex items-center gap-4">
                <?php if (session()->get('user_id')): ?>
                    <span class="text-sm text-gray-500"><?= esc(session()->get('user_name')) ?></span>
                    <form method="POST" action="/logout">
                        <?= csrf_field() ?>
                        <button type="submit" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">
                            Logout
                        </button>
                    </form>
                <?php else: ?>
                    <a href="/login" class="text-sm text-gray-600 hover:text-gray-900">Log In</a>
                    <a href="/register" class="text-sm bg-gray-900 text-white px-3 py-1.5 rounded-lg hover:bg-gray-700 transition-colors">
                        Register
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Page content -->
    <main class="max-w-2xl mx-auto px-4 py-8">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 text-sm rounded-xl">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

</body>
</html>