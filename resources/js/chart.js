import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

window.initCharts = function () {
    return {
        async userActivityChart(ctx, dataUrl) {
            await (fetch (dataUrl).then(result => result.json()).then(data => {
                const datasets = [], labels = [], dsIndex = []

                data.forEach(row => {
                    let i = 0, k = 0;

                    if ((i = labels.indexOf(row.date)) === -1) {
                        i = labels.push(row.date) - 1;
                    }

                    if ((k = dsIndex.indexOf(row.action)) === -1) {
                        k = dsIndex.push(row.action) - 1;
                        datasets.push({
                            type: 'line',
                            label: row.action,
                            data: []
                        });
                    }

                    datasets[k].data[i] = row.value;
                });

                const config = {
                    data: {
                        datasets: datasets,
                        labels: labels
                    },
                };

                const chart = new Chart(document.getElementById(ctx), config);
            }))
        }
    };
}
