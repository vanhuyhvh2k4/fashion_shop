<?php
require_once __DIR__ . '/../config/database.php'; 

$conn = Database::getConnection(); 

$sql = "SELECT SUM(total_price) AS total_revenue FROM orders";
$result = $conn->query($sql);
$data = $result->fetch(PDO::FETCH_ASSOC);
$totalRevenue = $data['total_revenue'] ?? 0;

echo "Tổng doanh thu: " . number_format($totalRevenue, 0, ',', '.') . " VND";
?>

<h2>📊 Thống kê doanh thu</h2>
<p><strong>Tổng doanh thu:</strong> <?= number_format($totalRevenue, 0, ',', '.') ?> VND</p>

<?php
$monthlyRevenue = $conn->query("
    SELECT MONTH(created_at) AS month, SUM(total_price) AS revenue
    FROM orders
    WHERE status='Completed'
    GROUP BY MONTH(created_at)
    ORDER BY month ASC
");

$months = [];
$revenues = [];

while ($row = $monthlyRevenue->fetch(PDO::FETCH_ASSOC)) {  
    $months[] = "Tháng " . $row['month'];
    $revenues[] = $row['revenue'];
}
?>

<h3>📅 Doanh thu theo tháng</h3>
<table class="table">
    <tr>
        <th>Tháng</th>
        <th>Doanh thu (VND)</th>
    </tr>
    <?php foreach ($months as $index => $month) { ?>
        <tr>
            <td><?= $month ?></td>
            <td><?= number_format($revenues[$index], 0, ',', '.') ?></td>
        </tr>
    <?php } ?>
</table>

<h3>📈 Biểu đồ Doanh Thu</h3>
<canvas id="revenueChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: <?= json_encode($months) ?>,
            datasets: [{
                label: 'Doanh thu (VND)',
                data: <?= json_encode($revenues) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
