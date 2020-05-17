document.addEventListener('DOMContentLoaded', () => {
    new WOW().init();

    const formPostCreate = document.querySelector('.js-form-create-post');
    // const cardsContainer = document.querySelector('.cards');
    let dataIsLoading = false;

    const serialize = function(formEle) {
        const fields = [].slice.call(formEle.elements, 0);

        return fields
            .map(function(ele) {
                const name = ele.name;
                const type = ele.type;

                // We ignore
                // - field that doesn't have a name
                // - disabled field
                // - `file` input
                // - unselected checkbox/radio
                if (!name ||
                    ele.disabled ||
                    type === 'file' ||
                    (/(checkbox|radio)/.test(type) && !ele.checked))
                {
                    return '';
                }

                // Multiple select
                if (type === 'select-multiple') {
                    return ele.options
                        .map(function(opt) {
                            return opt.selected
                                ? `${encodeURIComponent(name)}=${encodeURIComponent(opt.value)}`
                                : '';
                        })
                        .filter(function(item) {
                            return item;
                        })
                        .join('&');
                }

                return `${encodeURIComponent(name)}=${encodeURIComponent(ele.value)}`;
            })
            .filter(function(item) {
                return item;
            })
            .join('&');
    };

    const submit = function(formEle) {
        return new Promise(function(resolve, reject) {
            const params = serialize(formEle);
            dataIsLoading = true;

            // Create new Ajax request
            const req = new XMLHttpRequest();
            req.open('POST', formEle.action, true);
            req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

            // Handle the events
            req.addEventListener('load', function() {
                if (req.status >= 200 && req.status < 400) {
                    resolve(req.responseText);
                }
            });

            req.addEventListener('error', function() {
                reject();
            });

            req.send(params);
        });
    };

    if (formPostCreate) {
        formPostCreate.addEventListener('submit', function (e) {
            e.preventDefault();
            if (dataIsLoading) return;
            submit(formPostCreate).then(function(response) {
                dataIsLoading = false;
                const data = JSON.parse(response);
                if (data.success) {
                    window.location.reload();
                }
            });
        });
    }

    const formPostDelete = [...document.querySelectorAll('.js-form-delete-post')];
    if (formPostDelete) {
        formPostDelete.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                if (dataIsLoading) return;
                submit(form).then(function(response) {
                    dataIsLoading = false;
                    const data = JSON.parse(response);
                    if (data.success) {
                        window.location.reload();
                    }
                });
            });
        });
    }




    /*const form = document.querySelector('.js-form-create-post');
    const cardsContainer = document.querySelector('.cards');
    let dataIsLoading = false;

    const serialize = function(formEle) {
        const fields = [].slice.call(formEle.elements, 0);

        return fields
            .map(function(ele) {
                const name = ele.name;
                const type = ele.type;

                // We ignore
                // - field that doesn't have a name
                // - disabled field
                // - `file` input
                // - unselected checkbox/radio
                if (!name ||
                    ele.disabled ||
                    type === 'file' ||
                    (/(checkbox|radio)/.test(type) && !ele.checked))
                {
                    return '';
                }

                // Multiple select
                if (type === 'select-multiple') {
                    return ele.options
                        .map(function(opt) {
                            return opt.selected
                                ? `${encodeURIComponent(name)}=${encodeURIComponent(opt.value)}`
                                : '';
                        })
                        .filter(function(item) {
                            return item;
                        })
                        .join('&');
                }

                return `${encodeURIComponent(name)}=${encodeURIComponent(ele.value)}`;
            })
            .filter(function(item) {
                return item;
            })
            .join('&');
    };

    const submit = function(formEle) {
        return new Promise(function(resolve, reject) {
            const params = serialize(formEle);
            dataIsLoading = true;

            // Create new Ajax request
            const req = new XMLHttpRequest();
            req.open('POST', formEle.action, true);
            req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

            // Handle the events
            req.addEventListener('load', function() {
                if (req.status >= 200 && req.status < 400) {
                    resolve(req.responseText);
                }
            });

            req.addEventListener('error', function() {
                reject();
            });

            req.send(params);
        });
    };

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (dataIsLoading) return;
            submit(form).then(function(response) {
                // return;
                const data = JSON.parse(response);
                const card = [...new DOMParser().parseFromString(data.markup, 'text/html').body.children][0];
                cardsContainer.appendChild(card);
                dataIsLoading = false;
            });
        });
    }*/
});
