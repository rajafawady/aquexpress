<x-layout active='stats'>

    <section>

        <div class="container">
            <h1 class="text-center my-3">Monthly Statistics</h1>
    
            <div class="p-3">
                <form method="GET" action="/supplier/stats">
                    <div class="form-group" >
                        <label for="month">Select Month</label>
                        <input class="form-control" type="month" id="month" name="month" value="{{$selectedMonth}}">
                    </div>
                    <div class="row justify-content-end">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                    
                </form>
            </div>
    
            <canvas id="ordersChart" width="400" height="200"></canvas>

        </div>

    </section>


</x-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('ordersChart').getContext('2d');

    // Extract unique dates from the salesData keys
    var uniqueDates = {!! json_encode(range(1, 31)) !!};

    // Initialize an array with zero sales for each day
    var salesData = {!! json_encode($salesData->toArray()) !!};

    var ordersChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: uniqueDates,
            datasets: [{
                label: 'Completed Orders',
                data: uniqueDates.map(function (date) {
                    return salesData[date] || 0;
                }),
                borderColor: '#352f44',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'category',
                    labels: uniqueDates,
                    title: {
                        display: true,
                        text: 'Dates'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Completed Orders'
                    }
                }
            }
        }
    });
</script>



