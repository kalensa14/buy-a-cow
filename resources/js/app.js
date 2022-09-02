import './bootstrap';
import './chart';
import {AjaxModule, Tabulator, FilterModule} from 'tabulator-tables';
import Alpine from 'alpinejs';

Tabulator.registerModule([AjaxModule, FilterModule]);

window.Alpine = Alpine;

window.initDownloader = function () {
    return {
        inProgress: false,
        downloadFile(url) {
            const self = this;

            self.inProgress = true;

            fetch(url)
                .then(response => response.blob())
                .then(blob => {
                    const a = document.createElement('a');

                    a.href = window.URL.createObjectURL(blob);
                    a.download = 'dummy.exe';
                    document.body.append(a);
                    a.click();
                    a.remove();
                    self.inProgress = false;
                });
        }
    };
}

window.initTables = function () {
    return {
        reports(elementId, dataUrl) {
            new Tabulator(elementId, {
                ajaxURL: dataUrl,
                height: "311px",
                layout: "fitColumns",
                placeholder: "No Data Set",
                columns: [
                    {title: 'Date', field: 'date',},
                    {title: 'Action', field: 'action',},
                    {title: 'Actions count', field: 'value',},
                ]
            });
        },
    }
}

window.initStatistic = function () {
    return {
        makeTable(elementId, filterElementId, dataUrl) {
            const table = new Tabulator('#'+elementId, {
                ajaxURL: dataUrl,
                height: "311px",
                layout: "fitColumns",
                placeholder: "No Data Set",
                columns: [
                    {title: 'Date', field: 'date',},
                    {title: 'Username', field: 'user',},
                    {title: 'Action', field: 'action',},
                    {title: 'Details', field: 'extra',},
                ]
            });

            document.getElementById(filterElementId)
                .querySelectorAll('input,select')
                .forEach(el => {
                    el.addEventListener('change', event => {
                        let el = event.target,
                            filter = el.name,
                            value = el.value;

                        table.setFilter(filter, 'like', value);
                    });
                });

        },
    }
}

Alpine.start();
