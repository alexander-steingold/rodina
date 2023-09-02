<script>
    var totalPaymentByMonth = @json($chartData);

    var ordersOverview = {
        colors: ["#10B981", "#FF9800"],
        series: [
            {
                name: "{{ __('general.payment.income_by_months') }}",
                data: totalPaymentByMonth.map(item => item.total),
            },
        ],
        chart: {
            height: 150,
            type: "bar",
            parentHeightOffset: 0,
            toolbar: {
                show: false,
            },
        },
        dataLabels: {
            enabled: true,
            offsetX: 20,
            textAnchor: 'start',
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"],

        },
        plotOptions: {
            bar: {
                borderRadius: 0,
                barHeight: "100%",
                columnWidth: "20%",
            },
        },
        legend: {
            show: false,
        },
        xaxis: {
            categories: totalPaymentByMonth.map(item => item.month),
            labels: {
                hideOverlappingLabels: false,
            },

            axisBorder: {
                show: true,
            },
            axisTicks: {
                show: false,
            },
            tooltip: {
                enabled: false,
            },
        },
        grid: {
            padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: 0,
            },
        },
        yaxis: {
            show: false,
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
            },
        },
        responsive: [
            {
                breakpoint: 850,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: "55%",
                        },
                    },
                },
            },
        ],
    };
    // var chart = new ApexCharts(document.querySelector("#chart"), ordersOverview);
    // chart.render();
</script>
<x-app-partials.card class="mt-4">
    <div class="text-center mt-2">
        {{ __('general.payment.income_by_month') }}
        <div class="text-2xl font-medium text-slate-700 mt-2">
            {{ date('Y') }}
        </div>
    </div>
    <div class="ax-transparent-gridline ">
        <div x-init="$nextTick(() => {
                                        $el._x_chart = new ApexCharts($el, ordersOverview);
                                        $el._x_chart.render()
                                    });"></div>
    </div>
</x-app-partials.card>
