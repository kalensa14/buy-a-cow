import './bootstrap';
import './chart';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.initDownloader = function () {
    return {
        inProgress: false,
        downloadFile(url) {
            const self = this;

            self.inProgress = true;

            fetch (url)
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

Alpine.start();
