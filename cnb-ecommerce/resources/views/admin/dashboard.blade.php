@extends('layouts.dashboard')

@section('content')
<!-- <div class="container my-5"> -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="border-radius: 15px;">
                <div class="card-header" style="border-radius: 15px 15px 0 0;">
                    <h4>
                        <strong>Dashboard</strong>
                    </h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{ Auth::guard('admin')->user()->name }}
                    <div class="col-12 px-lg-4 px-md-4 px-2 mb-4">
                        <div class="form-row p-lg-4 p-md-2 p-2 mx-0 " style="background-color: #fff;">
                            <div class="col-4">
                                <select id="sales_year_select" class="form-control">
                                    @php
                                        $i_yr = date('Y');
                                    @endphp
                                    @for ($i = $i_yr; $i >= 2022; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-4">
                                <select id="sales_month_select" class="form-control">
                                    @foreach ($a_month_list as $k_mth => $v_mth)
                                        <option value="{{ $k_mth + 1 }}" {{ ($i_mth == $k_mth +1 ) ? 'selected' : '' }} >{{ $v_mth }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <select id="cboShopSearch" class="form-control">
                                    <option value="">-- รวมทุกร้านค้า --</option>
                                    @foreach ($o_shop as $k_shop => $v_shop)
                                        <option value="{{ $v_shop->id }}">{{ $v_shop->shop_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <br>
                                Overall sales
                                <div>
                                    <canvas id="cvOverallSales" style="max-height: 320px;"></canvas>
                                </div><hr>
                                Transfers on previous and next period
                                <div>
                                    <canvas id="cvToTransfer" style="max-height: 320px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
    $(async () => {
        let data = {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: '',
                data: [],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        let data2 = {
            labels: ['Previous month', 'Next month'],
            datasets: [{
                label: '',
                data: [],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        let config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            },
        };

        let config2 = {
            type: 'bar',
            data: data2,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            },
        };

        const ctOverallSales = new Chart(
            document.getElementById('cvOverallSales'),
            config
        );
        const cvToTransfer = new Chart(
            document.getElementById('cvToTransfer'),
            config2
        );

        async function handleFetchSalesChart() {
            try {
                const selectedYear = $('#sales_year_select').val();
                const selectedMonth = $('#sales_month_select').val();
                const selectedShop = $('#cboShopSearch').val();
                $.ajax({
                    url: `/dashboard/stat/sales`,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        year: selectedYear,
                        month: selectedMonth,
                        shop: selectedShop
                    },
                    success: (response) => {
                        for (const key in response.data) {
                            if (response.data.hasOwnProperty(key)) {
                                ctOverallSales.data.datasets[0].data[key - 1] = response.data[key];
                            }
                        }

                        ctOverallSales.update();
                    },
                    error: () => {
                        ctOverallSales.data.datasets[0].data = [];
                        ctOverallSales.update();
                    }
                });
            } catch (e) {
                console.error(e);
            }
        }

        async function handleFetchTransferChart() {
            try {
                const selectedYear = $('#sales_year_select').val();
                const selectedMonth = $('#sales_month_select').val();
                $.ajax({
                    url: `/dashboard/stat/withdraw`,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        year: selectedYear,
                        month: selectedMonth
                    },
                    success: (response) => {
                        for (const key in response.data) {
                            if (response.data.hasOwnProperty(key)) {
                                cvToTransfer.data.datasets[0].data[key - 1] = response.data[key];
                            }
                        }

                        cvToTransfer.update();
                    },
                    error: () => {
                        cvToTransfer.data.datasets[0].data = [];
                        cvToTransfer.update();
                    }
                });
            } catch (e) {
                console.error(e);
            }
        }

        $('body').on('change', '#sales_month_select,#sales_year_select,#cboShopSearch', async () => {
            await handleFetchSalesChart();
            await handleFetchTransferChart();
        });

        // $('body').on('change', '#sales_year_select', async () => {
        //     await handleFetchSalesChart();
        //     await handleFetchTransferChart();
        // });

        await handleFetchSalesChart();
        await handleFetchTransferChart();
    });
</script>