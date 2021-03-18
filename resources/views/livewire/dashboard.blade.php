
<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8 flex-row pt-10">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">Dashboard</h2>
        </div>
        <div class="grid justify-items-center grid-cols-2">
            <div class="rounded-full bg-white w-24 h-24 flex flex-wrap content-center border-2 border-gray-500 shadow-2xl">
                <span class="w-full text-center text-2xl font-bold">{{$usuarios['total_usuarios']}}</span>
            </div>
            <div class="rounded-full bg-white w-24 h-24 flex flex-wrap content-center border-2 border-gray-500 shadow-2xl">
                <span class="w-full text-center text-2xl font-bold">{{$solicitudes['total_solicitudes']}}</span>
            </div>
            <span class="text-xl font-bold mb-5">Usuarios totales</span>
            <span class="text-xl font-bold mb-5">Solicitudes totales</span>
            <div class="w-5/6 mb-5">
                <canvas id="myChart" class=" border-2 border-gray-500 hover:shadow-2xl bg-white rounded-md" width="50" height="50"></canvas>
            </div>
            <div class="w-5/6 mb-5">
                <canvas id="myChart2" class=" border-2 border-gray-500 hover:shadow-2xl bg-white rounded-md" width="50" height="50"></canvas>
            </div>
            <a href="{{route('gestion.trabajador')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Ver usuarios
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     style="fill:rgb(255,255,255);transform:;-ms-filter:">
                    <path d="M5.536,21.886C5.682,21.962,5.841,22,6,22c0.2,0,0.398-0.06,0.569-0.178l13-9C19.839,12.635,20,12.328,20,12 s-0.161-0.635-0.431-0.822l-13-9C6.264,1.967,5.865,1.942,5.536,2.114C5.206,2.287,5,2.628,5,3v18 C5,21.372,5.206,21.713,5.536,21.886z">
                    </path></svg>
            </a>
            <a href="{{route('gestion.solicitud')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Ver solicitudes
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     style="fill:rgb(255,255,255);transform:;-ms-filter:">
                    <path d="M5.536,21.886C5.682,21.962,5.841,22,6,22c0.2,0,0.398-0.06,0.569-0.178l13-9C19.839,12.635,20,12.328,20,12 s-0.161-0.635-0.431-0.822l-13-9C6.264,1.967,5.865,1.942,5.536,2.114C5.206,2.287,5,2.628,5,3v18 C5,21.372,5.206,21.713,5.536,21.886z">
                    </path></svg>
            </a>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:<?php echo json_encode($usuarios['fechas'])?>,
                datasets: [{
                    label: 'Usuarios',
                    data: <?php echo json_encode($usuarios['cantidades'])?>,
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
                    borderWidth: 5
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctxx = document.getElementById('myChart2').getContext('2d');
        var myChartt = new Chart(ctxx, {
            type: 'pie',
            data: {
                labels:<?php echo json_encode($solicitudes['estados'])?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($solicitudes['cantidades'])?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</div>
</div>
