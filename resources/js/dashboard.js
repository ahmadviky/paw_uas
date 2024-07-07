import Chart from "chart.js/auto";

const dataChart = window.dataChart;
new Chart(
    document.getElementById('chart-buku'),
    {
        type: 'bar',
        data: {
            labels: dataChart[0].map(data => data.label),
            datasets: [
                {
                    label: 'Tahun Terbit Buku',
                    data: dataChart[0].map(data => data.count),
                    hoverOffsets: 24,
                    borderWidth: 0
                }
            ]
        }
    }
);