<x-app-layout>
    <script>
        window.dataChart = @json([$tahun_terbit])
    </script>
    <div class="card">
        <div class="card-body">
            <canvas id="chart-buku"></canvas>
        </div>
    </div>
    @vite(['resources/js/dashboard.js'])
</x-app-layout>
