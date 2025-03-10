<h2>Chi tiết đơn hàng <?= $order['id'] ?></h2>
<p>User ID: <?= $order['user_id'] ?></p>
<p>Tổng giá: <?= $order['total_price'] ?></p>
<p>Trạng thái: <?= $order['status'] ?></p>
<form method="POST" action="index.php?action=update_status&id=<?= $order['id'] ?>">
    <select name="status">
        <option value="Pending">Pending</option>
        <option value="Processing">Processing</option>
        <option value="Completed">Completed</option>
        <option value="Cancelled">Cancelled</option>
    </select>
    <button type="submit">Cập nhật</button>
</form>
<a href="index.php?action=list_orders">Quay lại</a>