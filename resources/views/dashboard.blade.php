@extends('layouts.app')

@section('content')
<style>
    body { background-color: #223871; color: white; }
    .dashboard-container { display: flex; flex-wrap: wrap; gap: 20px; }
    .map-container { height: 400px; }
    .notification-table th, .notification-table td { color: white; }
   

    /* General container styling */
    .chart-container, .map-container, .video-container, .item { 
        background: #4c6196; 
        padding: 10px; 
        border-radius: 10px; 
        color: white;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    /* Hover Effects */
    .chart-container:hover, .map-container:hover, .video-container:hover, .item:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
    }

    /* Alert Box for Dynamic Notifications */
    .alert-box {
        display: none;
        position: fixed;
        top: 20px;
        right: 20px;
        background: #ff4d4d;
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        font-weight: bold;
        animation: fadeInOut 5s ease-in-out;
        z-index: 1000;
    }

    @keyframes fadeInOut {
        0% { opacity: 0; transform: translateY(-10px); }
        10% { opacity: 1; transform: translateY(0); }
        90% { opacity: 1; }
        100% { opacity: 0; transform: translateY(-10px); }
    }
</style>

<div class="container mt-4">
    <!-- <h1 class="text-center">Real-Time Crowd Monitoring</h1> -->

    <!-- First Row: Pie Chart, Gauge Chart, Live Video -->
    <div class="row">
        <div class="col-md-3 col-sm-12 chart-container item">
            <h4>Area-Wise Crowd Distribution</h4>
            <canvas id="peopleDistribution"></canvas>
        </div>
        <div class="col-md-3 col-sm-12 chart-container item">
            <h4>Real-Time People Count</h4>
            <canvas id="alertGauge"></canvas>
            <div id="alertGaugeData" class="text-center mt-2"></div>
        </div>
        <div class="col-md-6 col-sm-12 video-container item">
            <h4>Video Stream</h4>
            <video id="myVideo" width="640" height="360" controls>
            <source src="{{ asset('videos/video.mp4') }}" type="video/mp4">
        </video>

        <button onclick="playVideo()">Play</button>
        <button onclick="pauseVideo()">Pause</button>

        <script>
            function playVideo() {
                document.getElementById('myVideo').play();
            }

            function pauseVideo() {
                document.getElementById('myVideo').pause();
            }
        </script>
        </div>
    </div>

    <!-- Second Row: Weekly Trend Chart, Heatmap -->
    <div class="row mt-4">
        <div class="col-md-6 col-sm-12 chart-container item">
            <canvas id="weeklyTrend"></canvas>
        </div>
        <div class="col-md-6 col-sm-12 map-container item" id="heatmap"></div>
    </div>
</div>

<script>
    const maxPeople = 50; // Default capacity
    let totalCapacity = 0;

    // Custom plugin to show the current value in the gauge chart
    const centerTextPlugin = {
        id: 'centerText',
        beforeDraw(chart) {
            const { width, height } = chart;
            const ctx = chart.ctx;
            ctx.save();
            ctx.font = "50px Arial";
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            const currentValue = chart.data.datasets[0].data[0];
            ctx.fillStyle = '#ffff00';
            ctx.fillText(currentValue, width / 2, height / 1.3);
        }
    };

    // Initialize Charts
    var ctxPie = document.getElementById('peopleDistribution').getContext('2d');
    var peopleDistributionChart = new Chart(ctxPie, {
        type: 'doughnut',
        data: { labels: [], datasets: [{ data: [], backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#FF33A8', '#FF8C33'] }] },
        options: { responsive: true, plugins: { legend: { display: true,  position: 'left', labels: {color: 'white', font: {size: 14 } } } }}
    });

    var ctxGauge = document.getElementById('alertGauge').getContext('2d');
    var alertGaugeChart = new Chart(ctxGauge, {
        type: 'doughnut',
        data: { labels: ['People Count', 'Remaining Capacity'], datasets: [{ data: [0, maxPeople], backgroundColor: ['#ffff00', '#E0E0E0'], borderWidth: 0 }] },
        options: { responsive: true, cutout: '60%', rotation: -90, circumference: 180, plugins: { legend: { display: false }, tooltip: { enabled: false } } },
        plugins: [centerTextPlugin]
    });

    var map = L.map('heatmap').setView([25.276987, 51.519287], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    var heatLayer = L.heatLayer([], { radius: 25 }).addTo(map);

    // Fetch all data in one call
    function fetchAllData() {
        fetch('/api/crowd-summary')
            .then(response => response.json())
            .then(data => {
                updatePieChart(data);
                updateGaugeChart(data);
                updateHeatmap(data);
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function updatePieChart(data) {
        let labels = [], counts = [];
        data.forEach(location => {
            if (location.data && location.data.length > 0) {
                labels.push(location.location);
                counts.push(location.data[0].count);
            }
        });
        peopleDistributionChart.data.labels = labels;
        peopleDistributionChart.data.datasets[0].data = counts;
        peopleDistributionChart.update();
    }

    function updateGaugeChart(data) {
        let totalPeople = 0;
        totalCapacity = 0;

        data.forEach(location => {
            if (location.data && location.data.length > 0) {
                totalPeople += location.data[0].count;
                totalCapacity += location.capacity; // Assuming API includes capacity
            }
        });

        let remainingCapacity = totalCapacity - totalPeople;
        if (remainingCapacity < 0) remainingCapacity = 0;
        alertGaugeChart.data.datasets[0].data = [totalPeople, remainingCapacity];
        alertGaugeChart.update();
        document.getElementById("alertGaugeData").innerHTML = `Total People: ${totalPeople}`;
    }

    function updateHeatmap(data) {
        let heatData = [];
        let maxCount = 0;

        data.forEach(location => {
            if (location.latitude && location.longitude && location.data.length > 0) {
                let count = location.data[0].count;
                heatData.push([location.latitude, location.longitude, count]);
                if (count > maxCount) maxCount = count;
            }
        });

        let newRadius = maxCount > 100 ? 30 : 20; // Adjust heatmap radius dynamically
        heatLayer.setOptions({ radius: newRadius });
        heatLayer.setLatLngs(heatData);
    }

    setInterval(fetchAllData, 1000);
    fetchAllData();
</script>

@endsection
