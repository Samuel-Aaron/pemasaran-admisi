<x-layout>
    <x-slot:title>
        {{ ucfirst(auth()->user()->role) }}
    </x-slot:title>
    <x-slot:navTitle>
        Dashboard
    </x-slot:navTitle>

    <x-slot:navlinks>
        <x-navlinks.admin />
    </x-slot:navlinks>

    <div class="stats bg-base-200 text-grey">
        <div class="stat">
            <div class="stat-title">Total Telefon</div>
            <div class="stat-value">{{ $telefons }}</div>
        </div>

        <div class="stat">
            <div class="stat-title">Total Eskalasi</div>
            <div class="stat-value">00</div>
        </div>
        <div class="stat">
            <div class="stat-title">Total Tiket</div>
            <div class="stat-value">00</div>
        </div>
    </div>
    @once
        @push('scripts')
            <script>
                import ApexCharts from 'apexcharts'

                var options = {
                    series: [44, 55, 41, 17, 15],
                    chart: {
                        type: 'donut',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            </script>
        @endpush
    @endonce
</x-layout>