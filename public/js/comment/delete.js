'use strict';

const deleteComments = document.querySelectorAll('.deleteComment');

for (const deleteComment of deleteComments) {

    deleteComment.addEventListener('click', evt => {

        /* Server URL ( Controller's action ) for deleting the comment */
        let url = deleteComment.dataset.route;

        /* Sending a request to delete a comment */
        fetch(url)
            .then(resp => resp.text())
            .then(ok => {
                if(ok === '1') deleteComment.parentElement.remove();
            });

    })

}

