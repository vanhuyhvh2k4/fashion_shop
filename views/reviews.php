<?php
require_once '../controllers/ReviewController.php';

$controller = new ReviewController();
$reviews = $controller->getAllReviews();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đánh giá</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background: #007BFF; color: white; }
        .approved { color: green; font-weight: bold; }
        .hidden { color: red; font-weight: bold; }
        .action-btn { cursor: pointer; padding: 5px 10px; border: none; border-radius: 5px; }
        .approve { background: #28a745; color: white; }
        .approve:hover { background: #218838; }
        .delete { background: #dc3545; color: white; }
        .delete:hover { background: #c82333; }
    </style>
</head>
<body>

<h2><i class="fa-solid fa-star"></i> Quản lý đánh giá sản phẩm</h2>

<?php if (!empty($reviews)) : ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Sản phẩm</th>
                <th>Nội dung</th>
                <th>Rating</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review) : ?>
                <tr>
                    <td><?= $review['id'] ?></td>
                    <td><?= htmlspecialchars($review['user_id']) ?></td> 
                    <td><?= htmlspecialchars($review['product_id']) ?></td> 
                    <td><?= htmlspecialchars($review['comment']) ?></td> 

                    <td><?= $review['rating'] ?> <i class="fa-solid fa-star" style="color: gold;"></i></td>
                    <td class="<?= $review['status'] === 'approved' ? 'approved' : 'hidden' ?>">
                        <?= $review['status'] === 'approved' ? 'Đã duyệt' : 'Ẩn' ?>
                    </td>
                    <td>
                        <?php if ($review['status'] !== 'approved') : ?>
                            <form method="POST" action="../controllers/ReviewController.php">
                                <input type="hidden" name="action" value="approve">
                                <input type="hidden" name="review_id" value="<?= $review['id'] ?>">
                                <button type="submit" class="action-btn approve">
                                    <i class="fa-solid fa-check"></i> Duyệt
                                </button>
                            </form>
                        <?php endif; ?>
                        <form method="POST" action="../controllers/ReviewController.php" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đánh giá này?');">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="review_id" value="<?= $review['id'] ?>">
                            <button type="submit" class="action-btn delete">
                                <i class="fa-solid fa-trash"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Chưa có đánh giá nào.</p>
<?php endif; ?>

</body>
</html>
