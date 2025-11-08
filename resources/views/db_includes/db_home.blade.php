
<style>

.dashboard-container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 0 20px;
}

.dashboard-title {
    text-align: center;
    color: #007bff;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 40px;
}

/* Card Layout */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 25px;
}

.card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
    transition: 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.card-header {
    padding: 16px 20px;
    font-weight: 600;
    color: #fff;
    border-radius: 18px 18px 0 0;
}

.card-header.primary { background: linear-gradient(135deg, #007bff, #00b4ff); }
.card-header.success { background: linear-gradient(135deg, #28a745, #5bdc83); }
.card-header.info { background: linear-gradient(135deg, #17a2b8, #6dd5fa); }

.card-body {
    padding: 20px;
}

/* Table */
.table {
    width: 100%;
    border-collapse: collapse;
    font-size: 15px;
}

.table th, .table td {
    padding: 10px;
    text-align: center;
}

.table thead {
    background: #f2f4f8;
    font-weight: 600;
}

.table tbody tr:nth-child(even) {
    background: #fafafa;
}

/* Latest Blogs List */
.blog-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.blog-list li {
    padding: 12px 10px;
    border-bottom: 1px solid #f1f1f1;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.blog-list li:last-child {
    border-bottom: none;
}

.blog-title {
    font-weight: 600;
    color: #333;
}

.blog-cat {
    color: #888;
    font-size: 13px;
}

/* Chart Container */
.chart-container {
    position: relative;
    height: 350px;
}

/* Subtle Hover Effect */
.blog-list li:hover, .table tbody tr:hover {
    background: #eef6ff;
    transition: 0.2s ease-in-out;
}
</style>

<div class="dashboard-container">
    <h2 class="dashboard-title blog_ttl">Dashboard Analytics</h2>

    <div class="grid">

        <!-- Top 5 Blogs -->
        <div class="card">
            <div class="card-header primary">Top 5 Most Viewed Blogs</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Views</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topBlogs as $blog)
                            <tr>
                                <td style="text-align:left;">{{ Str::limit($blog->blog_title, 35) }}</td>
                                <td><strong style="color:#007bff;">{{ $blog->views }}</strong></td>
                                <td>{{ $blog->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Latest 5 Blogs -->
        <div class="card">
            <div class="card-header success">Latest 5 Blogs</div>
            <div class="card-body">
                <ul class="blog-list">
                    @foreach ($latestBlogs as $blog)
                        <li>
                            <div>
                                <span class="blog-title">{{ Str::limit($blog->blog_title, 40) }}</span>
                                <span class="blog-cat">({{ $blog->blog_cat }})</span>
                            </div>
                            <small style="color:#777;">{{ $blog->created_at->format('d M Y') }}</small>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Chart -->
        <div class="card" style="grid-column: span 2;">
            <div class="card-header info">Blogs Created Per Month</div>
            <div class="card-body chart-container">
                <canvas id="blogChart"></canvas>
            </div>
        </div>

    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('blogChart');
const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 250);
gradient.addColorStop(0, 'rgba(0, 194, 255, 0.6)');
gradient.addColorStop(1, 'rgba(0, 194, 255, 0.05)');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($chartLabels),
        datasets: [{
            label: 'Blogs Created',
            data: @json($chartData),
            borderWidth: 3,
            borderColor: '#00b4ff',
            backgroundColor: gradient,
            tension: 0.4,
            fill: true,
            pointRadius: 5,
            pointHoverRadius: 8,
            pointBackgroundColor: '#00b4ff'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: '#111',
                titleColor: '#fff',
                bodyColor: '#fff',
                cornerRadius: 8,
                padding: 10
            }
        },
        scales: {
            x: { grid: { display: false }, ticks: { color: '#555' } },
            y: { beginAtZero: true, ticks: { color: '#555' }, grid: { color: 'rgba(0,0,0,0.05)' } }
        }
    }
});
</script>
