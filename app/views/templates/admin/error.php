<div class="text-center">
    <div class="error mx-auto" data-text="<?= $data['http_status']?>"><?= $data['http_status']?></div>
    <p class="lead text-gray-800 mb-5">Page Not Found</p>
    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
    <a href="<?= url('/dashboard')?>">&larr; Back to Dashboard</a>
</div>