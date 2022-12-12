function direct() {

    function setEvents() {
        document.querySelector('.direct_textarea').addEventListener('keydown', textareaHandler)
    }
    setEvents()

    function textareaHandler(e) {
        const textarea = this;

        if (e.code == 'Enter') {
            const form = document.querySelector('.direct_form')
            const data = new FormData(form)
            const searchString = new URLSearchParams(window.location.search);

            for (const [key, value] of searchString) {
                data.append(key, value)
            }

            fetch('direct', {
                method: 'POST',
                body: data
            }).then((response) => {
                return response.text();
            }).then((data) => {
                const htmlObject = document.createElement('div')
                htmlObject.innerHTML = data
                const message_list = htmlObject.querySelector('.message_list')

                document.querySelector('.message_list-wrapper').innerHTML = ''
                document.querySelector('.message_list-wrapper').append(message_list)
                setEvents()
            });

            setTimeout(function () {
                textarea.value = ''
            }, 1);
        }

        setTimeout(function () {
            if (textarea.scrollHeight > 100 || textarea.scrollHeight < 41) {
                textarea.scrollTop = textarea.scrollHeight
                return
            }

            textarea.style.cssText = 'height:auto; padding:0';
            textarea.style.cssText = 'height:' + textarea.scrollHeight + 'px';
        }, 1);
    }

    setInterval(
        function () {
            const url = window.location.pathname + window.location.search
            fetch(url).then((response) => {
                return response.text();
            }).then((data) => {
                const htmlObject = document.createElement('div')
                htmlObject.innerHTML = data
                const message_list = htmlObject.querySelector('.message_list')

                document.querySelector('.message_list-wrapper').innerHTML = ''
                document.querySelector('.message_list-wrapper').append(message_list)
                setEvents()
            });
        }, 1000
    )
}

window.onload = function () {
    direct()
    // showMessage()
}