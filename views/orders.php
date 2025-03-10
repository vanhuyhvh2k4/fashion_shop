<?php
require_once '../controllers/OrderController.php'; 

$orderController = new OrderController();
$orders = $orderController->getAllOrders(); 

if (!$orders) {
    echo "<p>Không có đơn hàng nào.</p>";
} else {
?>
<style>
    body {
    font-family: Arial, sans-serif;
}

h2 {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

table {
    width: 80%;
    margin: auto;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

th {
    background-color: #3498db;
    color: white;
    padding: 12px;
    text-align: left;
    font-weight: bold;
    text-transform: uppercase;
}

td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

td:last-child {
    text-align: center;
}

.status {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 100px; 
    height: 30px; 
    border-radius: 5px;
    font-weight: bold;
    padding: 5px 10px;
    text-align: center;
}

.status.completed {
    background-color: #28a745;
    color: white;
}

.status.pending {
    background-color: #f1c40f;
    color: white;
}

.status.processing {
    background-color: orange;
    color: white;
}

</style>
    <h2>📦 Quản lý đơn hàng</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) { ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['user_id']; ?></td>
                <td><?php echo number_format($order['total_price'], 0, ',', '.'); ?> VND</td>
                <td>
                    <span class="status <?= strtolower($order['status']); ?>">
                        <?php echo $order['status']; ?>
                    </span>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php 
} 
?>
