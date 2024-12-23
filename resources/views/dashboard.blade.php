<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Analytics Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('logo.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.umd.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .modal-header.bg-success {
        background-color: #007bff !important;  
        }

        .modal-header .modal-title {
        color: white;  
        }

        
        #sidebar {
            width: 250px;
            background-color: #343a40;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
            transition: transform 0.3s ease-in-out;
        }

        #sidebar h5 {
            color: #fff;
            text-align: center;
            padding: 15px;
            background-color: green;
            margin: 0;
        }

        #sidebar a {
            color: #d1d1d1;
            padding: 12px 20px;
            text-decoration: none;
            display: block;
            font-size: 16px;
        }

        #sidebar a:hover {
            background-color: #007bff;
            color: white;
        }

        
        #content {
            margin-left: 250px;
            padding: 30px;
            transition: margin-left 0.3s ease;
        }

        
        .navbar {
            background-color: #007bff;
            padding: 10px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .navbar .form-control {
            border-radius: 20px;
        }

        .dropdown-menu {
            border-radius: 8px;
        }

        
        .dropdown-item {
            font-size: 16px;
            padding: 10px 20px;
        }

        .dropdown-item:hover {
            background-color: #007bff;
            color: white;
        }

       
        .chart-container {
            margin-top: 30px;
        }

        .chart-container canvas {
            border-radius: 10px;
        }

        
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

       
        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(-250px);
            }

            #sidebar.active {
                transform: translateX(0);
            }

            #content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
<!-- pie -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['REGION', 'CUSTOMER COUNT'],
                {!! $dataChart !!}
            ]);

            var options = {
                title: 'Customer Count Every Region'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
</script>
<!-- bar -->
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["REGION", "SHIPMODE COUNT", { role: "style" } ],
        ["SOUTH", 8.94, "#b87333"],
        ["CENTRAL", 10.49, "silver"],
        ["EAST", 19.30, "gold"],
        ["WEST", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Ship mode every region",
        width: 410,
        height: 205,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
</head>
</head>
<body>
    <!-- Sidebar -->
    <div id="sidebar">
        <h5>Dashboard</h5>
        <a href="#" id="aboutLink">About</a>
        <a href="#charts">Charts</a>
        <a href="#data">Data</a>
        <a href="#data">Settings</a>
        
    </div>

    <!-- Content Area -->
    <div id="content">
        
        <div class="text-center p-4 bg-light rounded shadow d-flex justify-content-between align-items-center">
            <h1 class="fw-bold custom-title mb-0">DA4B_GROUP6</h1>
            <div class="dropdown">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Members
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">NOEMI UY</a></li>
                    <li><a class="dropdown-item" href="#">ANGELINE D. VALLEJOS</a></li>
                    <li><a class="dropdown-item" href="#">REVELYN M. LICAYAN</a></li>
                    <hr>
                    <div class="container">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger form-control">LOGOUT</button>
                        </form>
                    </div>
                </ul>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar custom-navbar shadow mt-1">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand text-light fw-bold d-flex align-items-center" href="#">
                    Exploring Sales Trends and Consumer Insights from Supermarket Data
                </a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <!-- Filter Dropdowns -->
        <div class="d-flex align-items-center justify-content-start mt-3 gap-2" id="filterContainer">
            <div class="dropdown">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Category supply
                </button>
                <ul class="dropdown-menu" id="categoryDropdown"></ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ship Mode
                </button>
                <ul class="dropdown-menu" id="shipModeDropdown"></ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Region
                </button>
                <ul class="dropdown-menu" id="regionDropdown"></ul>
            </div>
        </div>

        <!-- Chart -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-12 chart-container">
                    <div class="line-chart-container border rounded p-3 shadow mx-auto">
                     <div id="piechart" style="width: 900px; height: 500px;"></div>
                    </div>
                </div>
                <div class="col-md-6 chart-container">
                    <div class="border rounded p-3 shadow">
                    <div id="barchart_values" style="width: auto; height: auto;"></div>
                    </div>
                </div>
                <div class="col-md-6 chart-container">
                    <div class="border rounded p-3 shadow">
                        <canvas id="myFourthChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Modal -->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="aboutModalLabel">About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This dataset provides a detailed information of a superstore’s operations, encompassing transactional data, customer segmentation, and return trends. It has been structured into three sheets—Orders, People, and Returns—offering a holistic view of retail dynamics. The inspiration behind this dataset lies in its potential to unlock actionable business insights, from sales analysis and customer behavior trends to return rate predictions and product performance evaluation.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

        
    <script>
        function logout() {
            alert('Are you sure you want to logout?');
        }
    </script>

    <script>

        // Dropdown Data
        const categories = ['Office Supplies', 'Technology', 'Furniture'];
        const categoryDropdown = document.getElementById('categoryDropdown');

        categories.forEach(category => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.classList.add('dropdown-item');
            a.href = "#";
            a.textContent = category;
            a.addEventListener('click', () => filterByCategory(category));
            li.appendChild(a);
            categoryDropdown.appendChild(li);
        });

        function filterByCategory(selectedCategory) {
    alert(`Filtering data for category: ${selectedCategory}`);
}

        const shipModes = ['First Class', 'Second Class', 'Standard Class', 'Same Day'];
        const shipModeDropdown = document.getElementById('shipModeDropdown');

        shipModes.forEach((mode) => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.classList.add('dropdown-item');
            a.href = "#";
            a.textContent = mode;
            a.addEventListener('click', () => filterByShipMode(mode));
            li.appendChild(a);
            shipModeDropdown.appendChild(li);
        });

        function filterByShipMode(selectedMode) {
    alert(`Filtering data for ship mode: ${selectedMode}`);
}


        const regions = ['South', 'East', 'West', 'Central'];
        const regionDropdown = document.getElementById('regionDropdown');

        regions.forEach((region) => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.classList.add('dropdown-item');
            a.href = "#";
            a.textContent = region;
            a.addEventListener('click', () => filterByRegion(region));
            li.appendChild(a);
            regionDropdown.appendChild(li);
        });

        function filterByRegion(selectedRegion) {
    alert(`Filtering data for the region: ${selectedRegion}`);
}

        // Show modal
        document.querySelector('#aboutLink').addEventListener('click', () => {
            const aboutModal = new bootstrap.Modal(document.getElementById('aboutModal'));
            aboutModal.show();
        });

        // Charts
        const ctx1 = document.getElementById('myChart');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Central', 'East', 'South', 'West'],
                datasets: [{
                    label: 'Regions',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1,
                    backgroundColor: ['red', 'blue', 'brown', 'green', 'purple', 'orange']
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'black'
                        }
                    },
                    x: {
                        ticks: {
                            color: 'black'
                        }
                    }
                }
            }
        });
        const ctx4 = document.getElementById('myFourthChart');
        new Chart(ctx4, {
            type: 'bar',
            data: {
                labels: ['First Class', 'Standard Class', 'Second Class'],
                datasets: [{
                    label: 'Ship mode',
                    data: [30, 40, 30],
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffce56']
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                plugins: {
                    legend: {
                        labels: {
                            color: 'black'
                        },
                        position: 'top',
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            color: 'black'
                        }
                    },
                    y: {
                        ticks: {
                            color: 'black'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>