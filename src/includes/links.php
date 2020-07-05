<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php /** @var $page */?>
        <?php /** @var $totalPages */ ?>
        <?php if ($page < 2): ?>
            <li class="page-item disabled">
                <a class="page-link" href="" aria-label="Previous" aria-disabled="true">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php else: ?>
            <li class="page-item">
                <a class="page-link" href="<?= '/index.php?page=' . ($page - 1); ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php if ($page == $i): ?>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="<?= 'index.php?page=' . $i; ?>">
                        <?= $i; ?>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?= '/index.php?page=' . $i; ?>"><?= $i; ?></a>
                </li>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if ($page == $totalPages): ?>
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next" aria-disabled="true">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php else: ?>
            <li class="page-item">
                <a class="page-link" href="<?= '/index.php?page=' . ($page + 1); ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
