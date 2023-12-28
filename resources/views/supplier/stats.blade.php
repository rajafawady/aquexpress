<x-layout>

    <section>

        <div class="container">
            <h1>Monthly Orders Stats</h1>
    
            <form method="GET" action="/supplier/stats">
                <label for="month">Select Month:</label>
                <input type="month" id="month" name="month" value="">
                <button type="submit">Submit</button>
            </form>
    
            <canvas id="ordersChart" width="400" height="200"></canvas>

        </div>

    </section>


</x-layout>


<script>
    var labelsData = {!! json_encode(
        $monthlyOrders->map(function ($order) {
            $date = new DateTime($order->time);
            return $date->format('d');
        })
    ) !!};

    var ordersData = {!! json_encode($monthlyOrders->pluck('quantity')) !!};

    console.log(labelsData);
    console.log(ordersData);

    var ctx = document.getElementById('ordersChart').getContext('2d');
    var ordersChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labelsData,
            datasets: [{
                label: 'Orders',
                data: ordersData,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
