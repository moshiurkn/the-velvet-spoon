<h2 class="h5 no-margin-bottom">Dashboard</h2>
</div>
</div>
<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-user-1"></i></div><strong>All Users</strong>
            </div>
            <div class="number dashtext-1">{{ $total_user }}</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
              class="progress-bar progress-bar-template dashbg-1"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-contract"></i></div><strong>All Foods</strong>
            </div>
            <div class="number dashtext-2">{{ $total_food }}</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              class="progress-bar progress-bar-template dashbg-2"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Total Orders</strong>
            </div>
            <div class="number dashtext-3">{{ $total_order }}</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"
              class="progress-bar progress-bar-template dashbg-3"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Total Delivered</strong>
            </div>
            <div class="number dashtext-4">{{ $total_deliverd }}</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"
              class="progress-bar progress-bar-template dashbg-4"></div>
          </div>
        </div>
      </div>

      <!-- Total Revenue Block -->
      <div class="col-md-12 col-sm-12 mb-4">
        <div class="statistic-block block"
          style="background: linear-gradient(135deg, #1d2127 0%, #2a3038 100%); border-left: 4px solid #28a745;">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="fa fa-dollar" style="color: #28a745; font-size: 24px;"></i></div><strong
                style="font-size: 1.2rem;">Total Revenue</strong>
            </div>
            <div class="number" style="color: #28a745; font-size: 2rem; font-weight: bold;">${{
              number_format($total_revenue, 2) }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts Section -->
    <div class="row mt-4">
      <!-- Orders By Status Pie Chart -->
      <div class="col-lg-5 col-md-12 mb-4">
        <div class="block">
          <div class="title"><strong>Orders By Status</strong></div>
          <canvas id="orderStatusChart"></canvas>
        </div>
      </div>

      <!-- Popular Foods Bar Chart -->
      <div class="col-lg-7 col-md-12 mb-4">
        <div class="block">
          <div class="title"><strong>Top 5 Popular Foods (Delivered)</strong></div>
          <canvas id="popularFoodChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="footer__block block no-margin-bottom">
    <div class="container-fluid text-center">
      <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank"
          href="https://templateshub.net">Templates Hub</a>.</p>
    </div>
  </div>
</footer>

<!-- Chart.js Instantiation Scripts -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Parse the PHP aggregated data into JavaScript objects
    const rawOrderStatuses = @json($order_statuses);
    const rawPopularFoods = @json($popular_foods);

    // Color palette corresponding to the dark theme
    const themeColors = ['#e95f71', '#8b2de2', '#d9a927', '#28a745', '#17a2b8'];

    // 1. Order Status Pie Chart
    if (Object.keys(rawOrderStatuses).length > 0) {
      const statusCtx = document.getElementById('orderStatusChart').getContext('2d');
      new Chart(statusCtx, {
        type: 'doughnut',
        data: {
          labels: Object.keys(rawOrderStatuses),
          datasets: [{
            data: Object.values(rawOrderStatuses),
            backgroundColor: themeColors,
            borderWidth: 0
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'bottom',
              labels: { color: '#8a8d93' }
            }
          }
        }
      });
    } else {
      document.getElementById('orderStatusChart').parentElement.innerHTML += "<p class='text-center mt-4 text-muted'>No orders yet</p>";
    }

    // 2. Popular Foods Bar Chart
    if (Object.keys(rawPopularFoods).length > 0) {
      const foodCtx = document.getElementById('popularFoodChart').getContext('2d');
      new Chart(foodCtx, {
        type: 'bar',
        data: {
          labels: Object.keys(rawPopularFoods),
          datasets: [{
            label: 'Times Ordered',
            data: Object.values(rawPopularFoods),
            backgroundColor: '#e95f71', // Velvet red theme
            borderRadius: 4
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
              ticks: { color: '#8a8d93', stepSize: 1 },
              grid: { color: '#333b47' }
            },
            x: {
              ticks: { color: '#8a8d93' },
              grid: { display: false }
            }
          },
          plugins: {
            legend: { display: false }
          }
        }
      });
    } else {
      document.getElementById('popularFoodChart').parentElement.innerHTML += "<p class='text-center mt-4 text-muted'>No delivered foods yet</p>";
    }
  });
</script>