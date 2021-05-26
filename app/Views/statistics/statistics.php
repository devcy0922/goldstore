<div id="main" class='layout-navbar'>
    <header class='mb-3'>
        <nav class="navbar navbar-expand navbar-light ">
            <div class="container-fluid">
                <a href="#" class="burger-btn d-block">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>
    </header>
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>통계</h3>
                        <p class="text-subtitle text-muted">수집한 데이터에 대한 통계입니다.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">통계</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">키워드별 누적 검출현황</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" width="700" height="400"></canvas>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                                <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
                                <script>
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ['출장', '마사지', '안마', '조건', '만남', '성매매'],
                                            datasets: [{
                                                label: '유해광고',
                                                data: [12, 19, 3, 5, 2, 3],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            // responsive: false,
                                            maintainAspectRatio: false,
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">누적 신고통계</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart2" width="400" height="400"></canvas>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                                <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
                                <script>
                                    var ctx = document.getElementById('myChart2').getContext('2d');
                                    var myChart2 = new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['미신고', '신고완료'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            // responsive: false,
                                            maintainAspectRatio: false,
                                            plugins: {
                                                legend: {
                                                    position: 'top',
                                                },
                                                title: {
                                                    display: true,
                                                    text: '왜 안 나 와'
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">워드클라우드</h5>
                            </div>
                            <div class="card-body">
                                임시<br>
                                <img src="http://placehold.it/350x350?text=wordcloud" />
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">일일 검출현황</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart3" width="700" height="400"></canvas>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                                <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
                                <script>
                                    var ctx = document.getElementById('myChart3').getContext('2d');
                                    var myChart3 = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ['21', '22', '23', '24', '25', '26', '27'],
                                            datasets: [{
                                                label: '유해광고',
                                                data: [12, 19, 9, 3, 7, 5, 13],
                                                borderColor: 'rgba(255, 99, 132, 0.2)',
                                                backgroundColor: 'rgba(255, 99, 132, 0.9)',
                                                fill: false,
                                            }]
                                        },
                                        options: {
                                            maintainAspectRatio: false,
                                            responsive: true,
                                            plugins: {
                                                title: {
                                                    display: true,
                                                    text: 'asdfasdf'
                                                }
                                            },
                                            scales: {
                                                x: {
                                                    display: true,
                                                },
                                                y: {
                                                    display: true,
                                                    type: 'logarithmic',
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; TheGoldStore</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="http://ahmadsaugi.com">testtest</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>